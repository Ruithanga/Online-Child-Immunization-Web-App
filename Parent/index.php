<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vaccination System Dashboard</title>
    <link rel="stylesheet" href="/../../Admin_dashboard.css">
    <link rel="stylesheet" href="/../css/style.css">
</head>
<body>
<?php include '../header.php';?>
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
    <label><?php echo $_SESSION['username'];?></label>

    <a href="/auth/logout.php">Logout</a>
</div>
<div class="bg">
    <center>
        <a href= "add_child_details.php"><div class="btn"><img src="/images/avatar.jpg" />
                <br>Add Child Details</div></a>
        <a href= "view_child_details.php"><div class="btn"><img src="/images/avatar.jpg" />
                <br>View Child Details</div></a>
        <a href= "reminder.php.php"><div class="btn"><img src="/images/avatar.jpg" />
                <br>My Vaccine Reminder</div></a>
    </center>
</div>
</body>
</html>