<?php
include 'connection.php';
if(isset($_POST["register"])) {


    $userType = $_POST['userType'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $cleaned_phone_number = ltrim($phone_number, '0');
    $password = md5($_POST['password']);
    $c_password = md5($_POST['c_password']);
    $time=time();
    $otp=rand(999,10000);
    $code='+254';
    $phone=$code.$cleaned_phone_number;

    if ($userType == "" || $username == "" || $email == "" || $phone_number == "" || $password == "") {
        session_start();
        $_SESSION['status'] = 'All inputs are required';
        header("location:register.php");
    }
    else {
        $sql2 = "select username from c_users where email='$email'";
        $result2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($result2);
        if ($count2 > 0) {
            session_start();
            $_SESSION['status'] = 'Email already exist use a new email';
            header("location:auth/register.php");
        }
        else {
            if ($password !== $c_password){
                session_start();
                $_SESSION['status'] = 'Ensure Your Password matches';
                header("location:register.php");
            }
            else {
                $save = "insert into c_users(email,username,userType,phone,password) values('$email','$username','$userType','$phone','$password')";
                $res = mysqli_query($conn, $save);
                if ($res) {
                        session_start();
                        $_SESSION['status'] = 'Registered Successfully login now to your acccount';
                        header("location:login.php");
                    }

                else {
                    session_start();
                    $_SESSION['status'] = 'Something went wrong';
                    header("location:auth/register.php");
                }
            }

        }
    }

}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "select username from c_users where email='$email' && password='$password'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    if ($count == 1) {
        $find = "select * from c_users where email='$email'";
        $retrieve = mysqli_query($conn, $find);
        $users = mysqli_fetch_all($retrieve, MYSQLI_ASSOC);

        //the password was correct
        foreach ($users as $user) {
            $userType = $user['userType'];
            $user_id = $user['id'];
            $username = $user['username'];
        }

        if($userType == 'health_Care_Provider'){
            session_start();
            $_SESSION['user'] = 'admin';
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['status'] = "Welcome back $username;";
            header("location:/Admin/index.php");
        }
        else{
            session_start();
            $_SESSION['user'] = 'user';
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['status'] = "Welcome back $username;";
            header("location:/Parent/index.php");
        }


    }

    else {
        session_start();
        $_SESSION['status'] = "The credentials does not match";
        header("Location:login.php");
    }
}

//if (isset($_POST['inquire'])) {
//    $name = $_POST['name'];
//    $email = $_POST['email'];
//    $phone = $_POST['phone'];
//    $message = $_POST['message'];
//    $save = "insert into inquiries(name,email,phone,message) values('$name','$email','$phone','$message')";
//    $res = mysqli_query($conn, $save);
//    if($res) {
//        session_start();
//        $_SESSION['status'] = 'Message sent Successfully will contact you soon';
//        header("location:index.php");
//    }
//    else{
//        session_start();
//        $_SESSION['status'] = 'Error sending the message try again later';
//        header("location:index.php");
//    }
//}
//if(isset($_POST["picture"])) {
//    $image= $_FILES['profileimage']['name'];
//
//    $imagetmp = $_FILES['profileimage']['tmp_name'];
//
//    if(empty($image)){
//        move_uploaded_file($imagetmp,"profiles/". $image);
//        die();
//    }
//    else{
//        move_uploaded_file($imagetmp,"profiles/". $image);
//        header("location:user/index.php");
//        die();
//    }
//
//
//}
//
//if(isset($_POST['verify'])){
//    session_start();
//    $email=$_SESSION['email'];
//    $otp=$_POST['otp'];
//    $sql2 = "select first_name from users where email='$email' and otp=$otp";
//    $result2 = mysqli_query($conn, $sql2);
//    $count2 = mysqli_num_rows($result2);
//    if ($count2 == 1) {
//        $update = "update users set verified = 'YES' where email = '$email'";
//        $update_run = mysqli_query($conn, $update);
//        if ($update_run) {
//            session_start();
//            $_SESSION['status'] = 'Your account have been verified';
//            header("location:/auth/login.php");
//        }
//    } else {
//        session_start();
//        $_SESSION['status'] = 'You have entered the wrong otp try again with the correct OTP';
//        header("location:auth/verify.php");
//    }
//}