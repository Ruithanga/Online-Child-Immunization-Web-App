<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vaccination System Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet"href ="dashboard.css">
    <script src="../js/main.js"></script>
</head>
<body>
<div class="">
    
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
                <li><a href="../about_us.php">About Us</a></li>
                <?php

                if(isset($_SESSION['user_id'])){
                   if(isset($_SESSION['user'])=='admin'){
                       echo '<li><a href="index.php">Dashboard</a></li>';
                   }
                   else{
                       echo '<li><a href="Parent/index.php">Dashboard</a></li>';
                   }
                       echo '<li><a href="profile.php">Profile</a></li>';
                       echo '<li><a href="logout.php">Logout</a></li>';

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

</div>

<div class="">
    <?php
    if(isset($_SESSION['status'])){
        ?>
        <div>
            <p style="font-size: 23px; background-color: #2ecc71;padding: 1rem; text-transform: uppercase;" class="text-white bg-danger btn-danger p-2"><?php echo $_SESSION['status']; ?> ?</p>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>

</div>
<<<<<<< HEAD
<div class="contend_mid d-flex flex-column ">
=======
        <div class="contend_mid d-flex flex-column ">
>>>>>>> 3b46e238a6065b10537c235dbb94acc5b6771cfd
        <div class="my-3 d-flex justify-content-center">
            <div class="m-3">
                <a href= "Child/index.php">
                    <div class="link  text-center">
<<<<<<< HEAD
                        <img src="../images/avatar.jpg" />
=======
                        <img src="/images/avatar.jpg" />
>>>>>>> 3b46e238a6065b10537c235dbb94acc5b6771cfd
                        <br>Child Details</div>
                </a>
            </div>
            <div class="m-3">
                <a href= "vaccine/index.php">
<<<<<<< HEAD
                    <div class="link  text-center"><img src="../images/avatar.jpg" />
=======
                    <div class="link  text-center"><img src="/images/avatar.jpg" />
>>>>>>> 3b46e238a6065b10537c235dbb94acc5b6771cfd
                        <br>Add Vaccine</div>
                </a>
            </div>
        </div>
           <div class="my-3 mx-3 d-flex justify-content-center">
               <a href= "vaccine/schedules.php">
<<<<<<< HEAD
                   <div class="link text-center"><img src="../images/avatar.jpg" />
=======
                   <div class="link text-center"><img src="/images/avatar.jpg" />
>>>>>>> 3b46e238a6065b10537c235dbb94acc5b6771cfd
                       <br>Schedules
                   </div>
               </a>
           </div>
        </div>
<<<<<<< HEAD
=======
<style>

    /*body {*/
    /*    font-family: 'Arial', sans-serif;*/
    /*    background-size: cover;*/
    /*    position: relative;*/
    /*    background-color: #f4f4f4;*/
    /*    background-image: url('../images/syrige2.jpg');*/
    /*}*/
    .link {

        box-shadow: 6px 6px;
        color: white;
        background: #1A5276;
        padding: 35px;
        font-size: 23px;
        border-radius: 20px;
        width: 200px;
        height: 200px;
    }

    .link img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-bottom: 10px;
    }
</style>
>>>>>>> 3b46e238a6065b10537c235dbb94acc5b6771cfd
</body>
</html>
