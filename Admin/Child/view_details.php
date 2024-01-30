<?php
include '../../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <title>Child's Details</title>
</head>
<style>
    table,tr,td,th{border: solid;border-collapse: collapse;border-spacing:1px}
</style>
<body class="bg-dark">
    <div class="table-responsive">
        <table class="table  border table-bordered table-striped">
            <thead>
            <tr>
                <th colspan="7" class=""><div class=" d-flex align-items-center justify-content-between">
                        Childrens Immunization schedule <a href="report.php" class="btn btn-primary">Generate report</a>
                    </div>
                </th>
            </tr>
            <tr>
                <td>child id</td>
                <td>child Name</td>
                <td>Date of birth</td>
                <td>Height</td>
                <td>Weight</td>
                <td>Gender</td>
                <td>Email Address</td>
                <td>Mother's Name</td>
                <td>Father's Name</td>
                <td>Phone No</td>
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
                    <th><?php echo $childsdata['age'] ?></th>
                    <th><?php echo $childsdata['dob'] ?></th>
                    <th><?php echo $childsdata['height'] ?></th>
                    <th><?php echo $childsdata['weight'] ?></th>
                    <th><?php echo $childsdata['phone'] ?></th>
                    <th><?php echo $childsdata['phone'] ?></th>
                    <th><?php echo $childsdata['phone'] ?></th>
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