<?php
session_start();
include '../connection.php';
$vaccine_id = $_GET['vaccine_id'];
$email = $_GET['parent_email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widp=device-widp, initial-scale=1.0">
    <title>E-Vaccination System Dashboard</title>
    <script src="/js/main.js"></script>

    <link rel="stylesheet" href="../css/style.css">
</head>
<style>
        nav{
            font-size: 20px;
            background:#1A5276;
            color: white;
        }

        ul li a{
            padding: 10px 10px 10px 10px;
            color: white;
            text-decoration: none;
        }
        ul a:hover{
            background: blue;
        }

    </style>
<body>

    <nav class="navbar text-white top-nav navbar-expand-lg">
        <div class="container-fluid d-flex flex-row justify-content-between">
            <a class="navbar-brand text-white" href="/">Child Immunization </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav list-unstyled">
                <li><a href="/cis">Home</a></li>
                <li><a href="/about_us.php">About Us</a></li>
                <?php

                if(isset($_SESSION['user_id'])){
                   if(isset($_SESSION['user'])=='admin'){
                    echo '<li><a href="Parent/index.php">Dashboard</a></li>';                     
                   }
                   else{
                    echo '<li><a href="Admin/index.php">Dashboard</a></li>';                       
                   }
                       echo '<li><a href="profile.php">Profile</a></li>';
                       echo '<li><a href="../logout.php">Logout</a></li>';

                }
                else {
                    echo '<li><a href="login.php">Login</a></li>';
                    echo '<li><a href="register.php">Register</a></li>';
                }
                ?>

            </ul>
        </div>
    </div>
</nav>

<div class="topnav">
    <?php
    if(isset($_SESSION['status'])){
        ?>
        <div>
            <p class="text-white bg-danger btn-danger p-2"><?php echo $_SESSION['status']; ?> ?</p>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>
</div>
<div class="">
    <h2>My Upcoming and Passed reminder</h2>
    <?php
    $dob= "SELECT * FROM c_child_details where email = '$email' ";
    $dobrun = mysqli_query($conn, $dob);
    $child_details = mysqli_fetch_all($dobrun, MYSQLI_ASSOC);

    //the password was correct
    foreach ($child_details as $child_detail) {
        $child_dob = $child_detail['dob'];
    }
    $childs= "SELECT * FROM c_schedules where vaccine_id = $vaccine_id";
    $childsrun = mysqli_query($conn, $childs);

    while ($childsdata = mysqli_fetch_assoc($childsrun)) {
        ?>
        <div>
            <li><?php
                // Assuming $child_dob is in 'YYYY-MM-DD' format
                $vaccination_date = date('Y-m-d', strtotime($child_dob . ' + ' . $childsdata['period'] . ' days'));
                echo $vaccination_date;
                if($vaccination_date > date('Y-m-d')) { // Compare with today's date
                    echo ' Upcoming';
                }
                else {
                   echo  ' Passed';
                }
                ?>
            </li>
        </div>
        <?php
    }
    ?>

</body>
</html>