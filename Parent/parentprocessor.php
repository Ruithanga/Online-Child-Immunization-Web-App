<?php
session_start();
include '../connection.php';

//if(!isset($_SESSION['user_id'])){
//    header("location:/../../index.php");
//}

$user_id = $_SESSION['user_id'];
if(isset($_POST["add_child_details"])) {
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $today = new DateTime('today');
    $dobDate = new DateTime($dob);

    $interval = $today->diff($dobDate);
    $months = ($interval->y * 12) + $interval->m;

    $email = $_POST['email'];
    $height = $_POST['height'];
    $mother_name = $_POST['mother_name'];
    $father_name = $_POST['father_name'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $cleaned_phone_number = ltrim($phone_number, '0');
//    $email = $_POST['email'];
    $code='+254';
    $phone=$code.$cleaned_phone_number;

    if ( $dob == "" || $height == "" || $weight == "" || $phone_number == "") {
        session_start();
        $_SESSION['status'] = 'All inputs are required';
        header("location:index.php");
    }
    else {
        $save = "insert into c_child_details(full_name,mothers_name,fathers_name,age,dob,gender,height,weight,phone,email) values('$full_name','$mother_name','$father_name','$months','$dob','$gender','$height','$weight','$cleaned_phone_number','$email')";
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