<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['user_id'])){
    header("location:../login.php");
}

$vaccine_id = $_GET['id'] ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vaccination System Dashboard</title>
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../header.php'; ?>

<div class="container">
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
        <p>Upcoming Reminders for message .....<? echo $vaccine_id; ?> </p>

        <table class="table  border table-bordered table-striped">
            <thead>

            <tr>
                <td>#</td>
                <td>Period of giving vaccine(days)</td>
                <td>Status</td>
                <td>Operation</td>

            </tr>
            </thead>
            <tbody>
            <?php
            $childs= "SELECT * FROM c_vaccines join c_schedules on c_vaccines.id=c_schedules.vaccine_id where c_vaccines.id=$vaccine_id";
            $childsrun = mysqli_query($conn, $childs);

            while ($childsdata = mysqli_fetch_assoc($childsrun)) {
                ?>
                <tr>
                    <th><?php echo $childsdata['id'] ?></th>
                    <th><?php echo $childsdata['period'] ?></th>
                    <th>not yet send</th>
                    <td>
                            <a href="reminderprocessor.php?period=<?php echo $childsdata['period'] ?>&&vaccine_id=<?php echo $childsdata['vaccine_id'] ?>"  class="btn btn-primary">Send Reminder</a>
                    </td>

                </tr>
                <?php
            }
            ?>
            </tbody>
            </tbody>

        </table>

    </div>
</div>



<style>

</style>
</body>
</html>
