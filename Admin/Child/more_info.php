<?php
session_start();

include '../../connection.php';
if(!isset($_SESSION['user_id'])){
    header("location:/../../login.php");
}
$id = $_GET['id'];
$find = "select * from c_child_details where id='$id'";
$retrieve = mysqli_query($conn, $find);
$childsdetails = mysqli_fetch_all($retrieve, MYSQLI_ASSOC);

//the password was correct
foreach ($childsdetails as $childsdetail) {
    $fullname = $childsdetail['full_name'];
    $email = $childsdetail['email'];
    $phone = $childsdetail['phone'];
    $dobDate = $childsdetail['dob'];
    $height = $childsdetail['height'];
    $mother_name = $childsdetail['mothers_name'];
    $father_name = $childsdetail['fathers_name'];
    $weight = $childsdetail['weight'];
    $gender = $childsdetail['gender'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Child Details</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="../../add_child.css">
    <script src="/js/main.js"></script>
</head>
<body>
<?php include '../../header.php'; ?>

<div class="container">
    <div class="">
        <a href="index.php" class="btn mt-4 w-25 btn-primary">Go Back</a>
    </div>
    <?php
    if(isset($_SESSION['status'])){
        ?>
        <div>
            <p style="font-size: 23px; background-color: #d69847;padding: 1rem; text-transform: uppercase;" class="text-white  btn-danger p-2"><?php echo $_SESSION['status']; ?> !</p>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>

    <form action="../adminprocessor.php" method="post">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" value="<?php echo $fullname ?>" required>
        <input type="number" hidden name="id" value="<?php echo $id ?>"

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob"  value="<?php echo $dobDate ?>" required>

        <label for="height">Height:</label>
        <input type="number" name="height"  value="<?php echo $height ?>" placeholder="Inches/Centimeters" required>

        <label for="weight">Weight:</label>
        <input type="number" name="weight"  value="<?php echo $weight ?>"placeholder="Pounds/Kilograms" required>

        <label for="gender">Gender: <br> <?php echo $gender ?></label>
        <p>Update Gender</p>
        <select name="gender" required>
            <option value="female">Female</option>
            <option value="male">Male</option>
        </select>

        <label for="full_name">Mother's Name:</label>
        <input type="text"  value="<?php echo $mother_name ?>" name="mother_name" required>

        <label for="full_name">Father's Name:</label>
        <input type="text"  value="<?php echo $father_name ?>" name="father_name" required>

        <label for="parent/guardian_email">Email Address:</label>
        <input type="email" name="email"  value="<?php echo $email ?>" required>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" name="phone_number"  value="<?php echo $phone ?>" pattern="[0-9]{10}" placeholder="Enter 10-digit phone number" required>

        <div class="d-flex justify-content-between">
        <button type="submit" class="float-end mx-4" name="update_child_details">Update Details</button>
        </div>
    </form>


</div>


</body>
</html>
