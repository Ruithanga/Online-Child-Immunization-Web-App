<?php

include '../connection.php';
session_start();
//if(!isset($_SESSION['user_id'])){
//    header("location:/../../index.php");
//}
$username = $_SESSION['username'] ;
$user_id = $_SESSION['user_id'] ;

if(isset($_POST["add_child_details"])) {
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $today = new DateTime('today');
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
        $save = "insert into c_child_details(full_name,mothers_name,fathers_name,dob,gender,height,weight,phone,email) values('$full_name','$mother_name','$father_name','$dob','$gender','$height','$weight','$cleaned_phone_number','$email')";
        $res = mysqli_query($conn, $save);
        if ($res) {
            session_start();
            $_SESSION['status'] = 'Child details added Successfully';
            header("location:Child/index.php");
        }

        else {
            session_start();
            $_SESSION['status'] = 'Something went wrong';
            header("location:Child/index.php");
        }

    }

}

if(isset($_POST["update_child_details"])) {
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $id = $_POST['id'];
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
        $save = "UPDATE c_child_details SET full_name='$full_name',mothers_name='$mother_name',fathers_name='$father_name',gender='$gender',height='$height',weight='$weight',phone='$phone_number' WHERE id = $id";
//        ,dob=$dob,gender=$gender,height=$height,weight=$weight,phone=$phone,email=$email
        $res = mysqli_query($conn, $save);
        if ($res) {
            session_start();
            $_SESSION['status'] = 'Child details added Successfully';
            header("location:Child/index.php");
        }

        else {
            session_start();
            $_SESSION['status'] = 'Something went wrong';
            header("location:Child/index.php");
        }

    }

}
if(isset($_POST["addvaccine"])) {
    $vaccine = $_POST['vaccine'];
    if ($vaccine == "") {
        session_start();
        $_SESSION['status'] = 'All inputs are required';
        header("location:index.php");
    }
    else {
        $save = "insert into c_vaccines(vaccine,user_id) values('$vaccine',$user_id)";
        $res = mysqli_query($conn, $save);
        if ($res) {
            session_start();
            $_SESSION['status'] = 'Vaccine  added Successfully';
            header("location:vaccine/index.php");
        }

        else {
            session_start();
            $_SESSION['status'] = 'Something went wrong';
            header("location:vaccine/index.php");
        }

    }

}
if(isset($_POST["shedule_vaccine"])) {
    $vaccine = $_POST['vaccine'];
    $acronym = $_POST['acronym'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    if ($vaccine == "") {
        session_start();
        $_SESSION['status'] = 'All inputs are required';
        header("location:index.php");
    }
    else {
        $save = "insert into c_vaccines(vaccine,acronym,description,date,user_id) values('$vaccine','$acronym','$description','$date',$user_id)";
        $res = mysqli_query($conn, $save);
        if ($res) {
            session_start();
            $_SESSION['status'] = 'Vaccine added successfully';
            header("location:vaccine/schedules.php");
        }

        else {
            session_start();
            $_SESSION['status'] = 'Something went wrong Try again later';
            header("location:vaccine/index.php");
        }

    }

}
if(isset($_POST["schedule_period"])) {
    $period= $_POST['period'];
    $vaccine_id = $_POST['vaccine_id'];
    if ($period == "") {
        session_start();
        $_SESSION['status'] = 'Period is required';
        header("location:index.php");
    }
    else {
        $save = "insert into c_schedules(period,vaccine_id,user_id) values('$period','$vaccine_id',$user_id)";
        $res = mysqli_query($conn, $save);
        if ($res) {
            session_start();
            $_SESSION['status'] = 'Period  scheduled successfully';
            header("location:vaccine/schedules.php");
        }

        else {
            session_start();
            $_SESSION['status'] = 'Something went wrong Try again later';
            header("location:vaccine/schedules.php");
        }

    }

}