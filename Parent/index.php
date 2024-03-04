<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vaccination System Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="/../../css/style.css">
    <script src="/../../js/main.js"></script>

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

</div>
<div class="bg">
    <center>
        <a href= "add_child_details.php"><div class="btn"><img src="../images/avatar.jpg" />
                <br>Add Child Details</div></a>
        <a href= "view_child_details.php"><div class="btn"><img src="../images/avatar.jpg" />
                <br>View Child Details</div></a>
        <a href= "reminder.php.php"><div class="btn"><img src="../images/avatar.jpg" />
                <br>My Vaccine Reminder</div></a>
    </center>
</div>
<style>
body {
    font-family: 'Arial', sans-serif;
   /* background-size: cover;
    position: relative;*/
    /*background-color: #f4f4f4;*/
    background-image: url('../images/syrige\ 3.jpg');
}

.topnav {
    overflow: hidden;
    background-color:#A9cce3;

}

.topnav a, label{
    float: right;
    color: black;
    text-align: right;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a.hover{
    background-color: #1A5276;
    color: #A9CCE3;
}

.topnav a.active{
    background-color:#A9CCE3;
    color: white;
}
.container {
    opacity: 0.9;
    background-color: black;
    width: 1370px;
    height: 600px;
    margin: 30px 40px;
    padding: 30px;
}

.btn {
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

.btn img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-bottom: 10px;
}

</style>
</body>
</html>