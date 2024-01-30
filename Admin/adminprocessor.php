<?php

include '../connection.php';
session_start();
$username = $_SESSION['username'] ;
$user_id = $_SESSION['user_id'] ;

if(isset($_POST["add_child_details"])) {
    session_start();
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $phone_number = $_POST['phone_number'];
    $cleaned_phone_number = ltrim($phone_number, '0');
//    $email = $_POST['email'];
    $code='+254';
    $phone=$code.$cleaned_phone_number;

    if ($age == "" || $dob == "" || $height == "" || $weight == "" || $phone_number == "") {
        session_start();
        $_SESSION['status'] = 'All inputs are required';
        header("location:index.php");
    }
    else {
        $save = "insert into c_child_details(full_name,age,dob,height,weight,phone,user_id) values('$full_name','$age','$dob','$height','$weight',$cleaned_phone_number,$user_id)";
        $res = mysqli_query($conn, $save);
        if ($res) {
            session_start();
            $_SESSION['status'] = 'Child details added Successfully';
            header("location:index.php");
        }

        else {
            session_start();
            $_SESSION['status'] = 'Something went wrong';
            header("location:index.php");
        }

    }

}