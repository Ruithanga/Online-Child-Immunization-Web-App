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
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<style>
    .main {
        width:20rem;
    }
</style>
    <?php include '../header.php'; ?>
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
