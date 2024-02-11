<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
</head>
<body>
    <div class="registration-container">
        <img src="images/syrige2.jpg" alt="Profile Image">
        <h2>Registration For E-vaccination</h2>
        
        <form id="registerForm" action="authprocess.php" method="post" onsubmit="return validateForm()">
            <label for="userType">I am a:</label>
            <select id="userType" name="userType" required>
                <option value="" disabled selected>Select User Type</option>
                <option value="health_Care_Provider">Healthcare Provider</option>
                <option value="parent_Guardian">Parent/Guardian</option>
            </select>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="parent/guardian_email">Email Address:</label>
            <input type="email" name="email" required>
            
            <label for="phone_number">Phone Number:</label>
            <input type="tel" name="phone_number" pattern="[0-9]{10}" placeholder="Enter 10-digit phone number" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="c_password" required>

            <div class="form-links">
                <p>Have an account? <a style="float: right;" href="login.php">Login</a></p>
            </div>

            <button type="submit" name="register">Register</button>
        </form>
    </div>

    <script src="register.js"></script>
</body>
</html>
