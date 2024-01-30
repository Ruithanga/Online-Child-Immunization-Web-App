<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vaccination System Dashboard</title>
    <link rel="stylesheet" href="Admin_dashboard.css">
</head>
<body>
<div class=""><?php include '../header.php'; ?></div>
<div class="">
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


</div>

<div class="">

        <a href= "Child/index.php"><div class="btn"><img src="images/avatar.jpg" />
                <br>Add Child Details</div></a>
        <a href= "Child/view_details.php"><div class="btn"><img src="images/avatar.jpg" />
                <br>View Child Details</div></a>
        <a href= "vaccine/index.php"><div class="btn"><img src="images/avatar.jpg" />
                <br>Add Vaccine</div></a>
        <a href= "vaccine/allocate_vaccine.php"><div class="btn"><img src="images/avatar.jpg" />
                <br>Allocate Vaccine</div></a>

</div>
</body>
</html>
