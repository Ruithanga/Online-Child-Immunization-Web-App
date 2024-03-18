<?php
session_start();
include '../connection.php';
$email= $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vaccination System Dashboard</title>
    <link rel="stylesheet" href="/../../Admin_dashboard.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>

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
<div class="bg d-flex justify-content-center align-items-center mt-4 pt-4">

    <table class="table table-bordered w-75 ms-4 pt-2table-bordered table-striped">
        <thead class="border">
        <tr>
            <th colspan="11" class="">
                <h3 class="text-center">
                     Vaccines For children immunization
                </h3>
            </th>
        </tr>
        <tr>
            <td>#</td>
            <td>Vaccine</td>
            <td>Acronym</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php
        $childs= "SELECT * FROM c_vaccines";
        $childsrun = mysqli_query($conn, $childs);

        while ($childsdata = mysqli_fetch_assoc($childsrun)) {
            ?>
            <tr>
                <th><?php echo $childsdata['id'] ?></th>
                <th><?php echo $childsdata['vaccine'] ?></th>
                <th><?php echo $childsdata['acronym'] ?></th>
                <th><a href="vaccine_reminder.php?vaccine_id=<?php echo $childsdata['id'] ?>&&parent_email=<?php echo $email ?>" class="btn btn-primary">View reminders</a> </th>

            </tr>
            <?php
        }
        ?>
        </tbody>
        </tbody>

    </table></div>
</body>
</html>