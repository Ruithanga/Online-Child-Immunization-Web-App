<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">

    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="login-container">
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
        <h2>E-Vaccination System</h2>
        <img src="images/syrige.jpg" alt="Profile Image">

        <p>Don't have an account<a href="register.php"> Register Now</a></p>
        <form id="loginForm" action="authprocess.php" method="post" onsubmit="return validateForm()">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="login" class="my-2 w-100">Login</button>
            <div class="form-links">
                <p>Forget password <a href="forgetpassword.php">Click here to reset</a></p>
            </div>

        </form>
    </div>

    <script src="login.js"></script>
</body>
</html>
