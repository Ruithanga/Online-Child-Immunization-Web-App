<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vaccination System</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>E-Vaccination System</h2>
        <img src="images/syrige.jpg" alt="Profile Image">

        <form id="loginForm" action="authprocess.php" method="post" onsubmit="return validateForm()">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <div class="form-links">
                <a href="#">Don't have an account</a> | <a href="register.php">Register</a>
            </div>

            <button type="submit" name="login">Login</button>
        </form>
    </div>

    <script src="login.js"></script>
</body>
</html>
