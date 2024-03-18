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
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav class="navbar text-white top-nav navbar-expand-lg">
        <div class="container-fluid d-flex flex-row justify-content-between">
            <a class="navbar-brand text-white" href="/">Child Immunization </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav list-unstyled">
                <li><a href="/cis">Home</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <?php

                if(isset($_SESSION['user_id'])){
                   if(isset($_SESSION['user'])=='admin'){
                       echo '<li><a href="../Admin/index.php">Dashboard</a></li>';
                   }
                   else{
                       echo '<li><a href="Parent/index.php">Dashboard</a></li>';
                   }
                       echo '<li><a href="profile.php">Profile</a></li>';
                       echo '<li><a href="logout.php">Logout</a></li>';

                }
                else {
                    echo '<li><a href="login.php">Login</a></li>';
                    echo '<li><a href="register.php">Register</a></li>';
                }
                ?>

            </ul>
        </div>
    </div>
</nav>
    <style>
        nav{
            font-size: 20px;
            background:#1A5276;
            color: white;
        }

        ul li a{
            padding: 10px 10px 10px 10px;
            color: white;
            text-decoration: none;
        }
        ul a:hover{
            background: blue;
        }

    </style>


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
                <th>Date of vaccine</th>
                <th>Operation</th>

            </tr>
            </thead>
            <tbody>
            <?php

            $today = new DateTime('now');
            $todayFormatted = $today->format('Y-m-d');
            $sql = "SELECT * FROM c_child_details 
                    WHERE DATEDIFF('$todayFormatted', dob) <= $period 
                    AND DATEDIFF('$todayFormatted', dob) >= $early_period 
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
        $exact_day_of_vaccine = strtotime($childsdata['dob'] . ' + ' . $period . ' days');
        // Output table row
        $exact_day_formatted = date('Y-m-d', $exact_day_of_vaccine);
        ?>
        <tr>
            <td><?php echo $childsdata['id'] ?></td>
            <td><?php echo $childsdata['full_name'] ?></td>
            <td><?php echo $childsdata['mothers_name'] ?></td>
            <td><?php echo $childsdata['fathers_name'] ?></td>
            <td><?php echo $childsdata['phone'] ?></td>
            <td><?php echo $age_in_days; ?> days</td>
            <td><?php echo $exact_day_formatted; ?></td>
            <td>
                <a href="sendreminder.php?child_id=<?php echo $childsdata['id'] ?>&phone=<?php echo $childsdata['phone'] ?>&period=<?php echo $period ?>&vaccine_id=<?php echo $vaccine_id ?>&date=<?php echo $exact_day_formatted; ?>" class="btn btn-primary">Send Reminder</a>
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