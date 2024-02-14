<?php
session_start();

require '../connection.php';
include '../env.php';
$vaccine_id = $_GET['vaccine_id'] ;
$period = $_GET['period'] ;
$phone = $_GET['phone'] ;
$child_id = $_GET['child_id'] ;

    $curl = curl_init();
    $message ="We are reminding you that it is only one week remaining for your child immmunization. Get prepared for it do not forget to .Your childs health is your wealth. Regards childs Immunization system.";
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
        $sql="insert into c_notifications (child_id,vaccine_id,period) values('$child_id','$vaccine_id','$period')";
        $sqlrun=mysqli_query($conn,$sql);
        if($sqlrun){
            $_SESSION['status'] = "Notification sent successfully";
            header("location:vaccine/schedules.php");
        }
    }
    else{
        $_SESSION['status'] = "Something went wrong maybe network problem try again later";

        header("location:vaccine/schedules.php");
    }
