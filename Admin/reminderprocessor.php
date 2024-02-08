<?php
session_start();
include '../connection.php';


$vaccine_id = $_GET['vaccine_id'] ;
$period = $_GET['period'] ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vaccination System Dashboard</title>
        <link rel="stylesheet" href="/css/style.css">
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
        <p>Upcoming Reminders for message </p>

        <table class="table  border table-bordered table-striped">
            <thead>

            <tr>
                <td>#</td>
                <td>Full Name</td>
                <td>dob</td>
                <td>age</td>

            </tr>
            </thead>
            <tbody>
            <?php
           $sql = "SELECT * FROM  c_child_details ";
    $result = mysqli_query($conn, $sql);

       if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($childsdata = mysqli_fetch_assoc($result)) {
        // Calculate age based on date of birth
        $dob = strtotime($childsdata['dob']);
        $age_in_days = floor((time() - $dob) / (60 * 60 * 24));
        // Output table row
        ?>
        <tr>
            <td><?php echo $childsdata['id'] ?></td>
            <td><?php echo $childsdata['full_name'] ?></td>
            <td><?php echo $childsdata['dob'] ?></td>
            <td><?php echo $age_in_days; ?> days</td>
            <td>not yet send</td>
            <td></td>
        </tr>
        <?php
    }
} else {
    // If there are no results
    echo "<tr><td colspan='6'>No records found</td></tr>";
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