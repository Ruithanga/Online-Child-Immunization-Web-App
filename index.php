<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE POST_NATAL CARE</title>

    <link rel="stylesheet" href="Home.css">

    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
</head>
<body>
<div class="">
    <?php include'header.php'; ?>
</div>
<div class="wrapper">

    <div class="welcome-message">
        <h1>Welcome to Our Child Immunization System</h1>
        <p>Ensuring the Health and Well-being of Every Child</p>
    </div>

    <div class="image">
        <img src="images/baby.png" alt="Vaccination Image">
    </div>

    <div class="heading">
        <h1>ONE TIME VACCINATION MATTERS</h1>
    </div>

    <div class="paragraph">
        <p>For better protection, vaccination needs to occur</p>
        <p>on time or as close as possible to the due date.</p>
    </div>
</div>

<script>
    function redirectToLogin() {
        window.location.href = "login.php";
    }

    function redirectToRegister() {
        window.location.href = "register.php";
    }
</script>

</body>
</html>
