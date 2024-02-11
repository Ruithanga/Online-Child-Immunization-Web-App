<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:/../../login.php");
}

$user_id = $_SESSION['user_id'] ;

include '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <title>Child's Details</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="">
<?php include '../header.php';?>
<div class="table-responsive">
    <table class="table   table-bordered table-striped">
        <thead class="border">
        <tr>
            <th colspan="11" class=""><div class=" d-flex align-items-center justify-content-between">
                    Childrens Immunization schedule <a href="report.php" class="btn btn-primary">Generate report</a>
                </div>
            </th>
        </tr>
        <tr>
            <td>#</td>
            <td>child Name</td>
            <td>Date of birth</td>
            <td>age</td>
            <td>Height</td>
            <td>Weight</td>
            <td>Gender</td>
            <td>Email Address</td>
            <td>Mothers Name</td>
            <td>Fathers Name</td>
            <td>Phone Number</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $childs= "SELECT * FROM c_child_details";
        $childsrun = mysqli_query($conn, $childs);

        while ($childsdata = mysqli_fetch_assoc($childsrun)) {
            ?>
            <tr>
                <th><?php echo $childsdata['id'] ?></th>
                <th><?php echo $childsdata['full_name'] ?></th>
                <th><?php echo $childsdata['dob'] ?></th>
                <th> <?php
                    $birthdate = new DateTime($childsdata['dob']);
                    $today = new DateTime();
                    $interval = $today->diff($birthdate);
                    $daysSinceBirth = $interval->format('%a');
                    echo $daysSinceBirth;
                    ?></th>
                <th><?php echo $childsdata['height'] ?></th>
                <th><?php echo $childsdata['weight'] ?></th>
                <th><?php echo $childsdata['gender'] ?></th>
                <th><?php echo $childsdata['email'] ?></th>
                <th><?php echo $childsdata['mothers_name'] ?></th>
                <th><?php echo $childsdata['fathers_name'] ?></th>
                <th><?php echo $childsdata['phone'] ?></th>

            </tr>
            <?php
        }
        ?>
        </tbody>
        </tbody>

    </table>
</div>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->

</body>
</html>