<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE POST_NATAL CARE</title>
    <link rel="stylesheet" href="Home.css">
</head>
<body>
<?php include'header.php'; ?>
    <header>
        <div class="wrapper">
            <ul class="nav-area">
                <li><a href="#">Home</a></li>
                <li><a href="#" onclick="redirectToLogin()">Log in</a></li>
                <li><a href="#" onclick="redirectToRegister()">Register</a></li>
            </ul>
        </div>
        <div class="welcome-message">
            <h1>Welcome to Our Child Immunization System</h1>
            <p>Ensuring the Health and Well-being of Every Child</p>
        </div>
    </header>

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
