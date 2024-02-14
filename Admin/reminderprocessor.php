<?php
session_start();
include '../connection.php';


$vaccine_id = $_GET['vaccine_id'] ;
$period = $_GET['period'] ;
$early_period=$period-7;
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
        <p>Upcoming Reminders</p>

        <table class="table  border table-bordered table-striped">
            <thead>

            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Mothers Name</th>
                <th>Fathers name</th>
                <th>Phone number</th>
                <th>Age In Days</th>
                <th>Operation</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $today = new DateTime('now');
            $todayFormatted = $today->format('Y-m-d');
            $sql = "SELECT * FROM c_child_details 
                    WHERE DATEDIFF('$todayFormatted', `dob`) <= $period 
                    AND DATEDIFF('$todayFormatted', `dob`) >= $early_period 
                    AND c_child_details.id NOT IN (
                        SELECT child_id FROM c_notifications
                        JOIN c_child_details ON c_child_details.id = c_notifications.child_id where c_notifications.child_id = c_child_details.id
                        and c_notifications.vaccine_id = $vaccine_id and c_notifications.period = $period
                    )";
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
            <td><?php echo $childsdata['mothers_name'] ?></td>
            <td><?php echo $childsdata['fathers_name'] ?></td>
            <td><?php echo $childsdata['phone'] ?></td>
            <td><?php echo $age_in_days; ?> days</td>
            <td>
                <a href="sendreminder.php?child_id=<?php echo $childsdata['id'] ?>&phone=<?php echo $childsdata['phone'] ?>&period=<?php echo $period ?>&vaccine_id=<?php echo $vaccine_id ?>" class="btn btn-primary">Send Reminder</a>
            </td>

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