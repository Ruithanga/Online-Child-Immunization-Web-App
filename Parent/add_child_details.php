<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:/../../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Child Details</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
   background-image: url(../images/syrige4.jpg);
    
}

h2 {
    color: #333;
}

form {
    max-width: 400px;
    margin: 20px auto;
    background-color: #A9CCE3;;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

input,
select,
button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

input[type="date"] {
    padding: 10px 5px;
}

button {
    background-color: #1084c3;
    color: #fff;
    border: none;
    padding: 12px;
    cursor: pointer;
}

button:hover {
    background-color: #1e4aba;
}

    .main {
        width:20rem;
    }
</style>
    <?php include '../header.php' ?>
<div class="container mb-4  d-flex justify-content-center align-items-center">
    <div class="main">

        <h2>Add Child Details</h2>
        <?php
        if(isset($_SESSION['status'])){
            ?>
            <div>
                <p style="background-color: white; color: white;" class=""><?php echo $_SESSION['status']; ?> ?</p>
            </div>
            <?php
            unset($_SESSION['status']);
        }
        ?>
        <form action="parentprocessor.php" method="post">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control"  name="full_name" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control"  name="dob" required>
            </div>
            <div class="form-group">
                <label for="height">Height:</label>
                <input type="number" class="form-control"  name="height" placeholder="Inches/Centimeters" required>
            </div>

            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="number" class="form-control"  name="weight" placeholder="Pounds/Kilograms" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select  class="form-control"  name="gender" required>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
            </div>
            <div class="form-group">
                <label for="full_name">Mother's Name:</label>
                <input type="text" class="form-control"  name="mother_name" required>
            </div>
            <div class="form-group">
                <label for="full_name">Father's Name:</label>
                <input type="text" class="form-control"  name="father_name" required>
            </div>

            <div class="form-group">
                <label for="parent/guardian_email">Email Address:</label>
                <input type="email" class="form-control"  name="email" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" class="form-control"  name="phone_number" pattern="[0-9]{10}" placeholder="Enter 10-digit phone number" required>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary"  name="add_child_details">Add Child</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
