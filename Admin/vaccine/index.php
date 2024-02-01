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
    <link rel="stylesheet" href="../../add_vaccine.css">
    <title>Add Vaccine</title>
</head>
<body>

<?php
include '../../header.php';
if(isset($_SESSION['status'])){
    ?>
    <div>
        <p style="padding:1rem;font-size: 23px; background-color: yellow;" class=""><?php echo $_SESSION['status']; ?> ?</p>
    </div>
    <?php
    unset($_SESSION['status']);
}
?>


            <div style="width: 100vw;height: 100vh;display: flex;flex-direction: column;justify-content: center;align-items: center;" class="">
                <form action="../adminprocessor.php" method="Post">
                    <div class="">
                    <h1>Add Vaccine</h1>
                    <label><b>Vaccine Name</b></label></br>
                    <input type="text" name="vaccine" value="">
                        <br><br>
                    <input type="submit" name="addvaccine" value="Add Vaccine"/>
                </div>
                </form>
            </div>


</body>
</html>