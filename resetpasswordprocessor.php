<?php
include 'connection.php';
include 'env.php';

session_start();

if (isset($_POST['forgetpassword'])) {
    $email = $_POST['email'];
    $otp=rand();
    $checkemail="select * from c_users where email='$email'";
    $checkemail_run=mysqli_query($conn,$checkemail);
    $count=mysqli_num_rows($checkemail_run);
    if($count==1) {
        $users = mysqli_fetch_all($checkemail_run, MYSQLI_ASSOC);

        //the password was correct
        foreach ($users as $user) {
            $phone = $user['phone'];
            $username = $user['username'];
        }
        $curl = curl_init();
        $message='Hello dear, '.$username.' We have just receive a request for password reset. Use the OTP'.$otp.'  to reset your password';
        $data = array(
            'api_token' => $api_token,
            'from' => $from,
            'to' => $phone,
            'message' => $message
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => $CURLOPT_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($data),
        ));
        curl_close($curl);
        $response = curl_exec($curl);

        $data = json_decode($response, true);

        $status = $data['status'];

        if($status == 'success'){
            $otp="update c_users set otp='$otp' where email='$email'";
            $otp_run=mysqli_query($conn,$otp);
            if($otp_run){
                session_start();
                $_SESSION['status'] = "Open you email and to reset the password?";
                header("Location: resetpassword.php?email=$email");
                }
        }
        else{
            session_start();
            $_SESSION['status'] = "Something went wrong maybe network problem try again";

            header("location:forgetpassword.php");
        }
    }
    else{
        session_start();
        $_SESSION['status'] = "Email does not exist?";

        header("location:forgetpassword.php");
    }

}
if (isset($_POST['resetpassword'])) {
    $email=$_POST['email'];
    $otp=$_POST['otp'];

    $password =md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);

    if($password !== $confirmpassword) {
        session_start();
        $_SESSION['status'] = "Password do not match?";

        header("location:resetpassword.php");
    }
    else{
//        echo$email;
//        echo$otp;
//        echo "Password do not match";
//        die();
        $changepassword = "UPDATE c_users SET password='$password' WHERE email='$email' and otp='$otp'";
        $changepassword_run=mysqli_query($conn,$changepassword);

        if($changepassword_run){
            session_start();
            $_SESSION['status'] = "Password changed successfully";

            header("location:login.php");
        }
        else{
            session_start();
            $_SESSION['status'] = "Credentials does not match check try again to reset";
            header("location:resetpassword.php");
        }
    }

}
?>