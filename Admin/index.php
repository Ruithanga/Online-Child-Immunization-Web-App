<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vaccination System Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
</head>
<body>

<?php include '../header.php'; ?>

<div class="">
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

</div>


        <a href= "Child/index.php"><div class="link">
                <img src="/images/avatar.jpg" />
                <br>Child Details</div>
        </a>

        <a href= "vaccine/index.php">
            <div class="link"><img src="/images/avatar.jpg" />
                <br>Add Vaccine</div>
        </a>
        <a href= "vaccine/schedules.php">
            <div class="link"><img src="/images/avatar.jpg" />
                <br>Schedules
            </div>
        </a>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-size: cover;
        position: relative;
        background-color: #f4f4f4;
        background-image: url('../images/syrige2.jpg');
    }
    .link {
        display: inline-block;
        box-shadow: 6px 6px;
        color: white;
        background: #1A5276;
        padding: 35px;
        text-align: center;
        vertical-align: middle;
        font-size: 23px;
        border-radius: 20px;
        width: 15%;
        height: 150px;
        margin: 10px;
    }

    .link img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-bottom: 10px;
    }
</style>
</body>
</html>
