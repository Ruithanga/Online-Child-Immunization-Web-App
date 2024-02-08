<?php
session_start();
include '../../connection.php';
if(!isset($_SESSION['user_id'])){
    header("location:/../../login.php");
}

$username = $_SESSION['username'] ;
$user_id = $_SESSION['user_id'] ;
$vaccine_id = $_GET['id'] ;
$vaccine_name = $_GET['name'] ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link rel="stylesheet" href="../../add_vaccine.css">-->
    <title>More of <?php echo$vaccine_name ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
</head>
<body>

<?php
include '../../header.php';
if(isset($_SESSION['status'])){
    ?>
    <div>
        <p style="padding:1rem;font-size: 23px; background-color: yellow;" class=""><?php echo $_SESSION['status']; ?> !</p>
    </div>
    <?php
    unset($_SESSION['status']);
}
?>
<?php
if(isset($_SESSION['status'])){
    ?>
    <div>
        <p style="font-size: 23px; background-color: #2ecc71;padding: 1rem; text-transform: uppercase;" class="text-white bg-danger btn-danger p-2"><?php echo $_SESSION['status']; ?> !</p>
    </div>
    <?php
    unset($_SESSION['status']);
}
?>
<div class="container">
    <div class="table-responsive">
        <table class="table  border table-bordered table-striped">
            <thead>
            <tr>
                <th colspan="7" class="bg-secondary">
                    <div style="display: flex;justify-content: space-between;"  class=" d-flex align-items-center justify-content-between">
                        <div class="p-2 bg-secondary">Periods for <span style="color: yellow; text-transform: uppercase;"><?php echo $vaccine_name ?></span> Vaccines</div>
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #007BFF; float: end;" class="btn btn-primary">Add Period</button>
                    </div>
                </th>
            </tr>
            <tr>
                <td>#</td>
                <td>Vaccine Name </td>
                <td>Acronym</td>
                <td>Description</td>
                <td >Period In days</td>
                <td>Operations</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $childs= "SELECT * FROM c_schedules join c_vaccines on c_schedules.vaccine_id=c_vaccines.id where c_vaccines.id=$vaccine_id";
            $childsrun = mysqli_query($conn, $childs);
            $childsrun_num = mysqli_num_rows($childsrun);
            $i = 1;
            if($childsrun_num > 0) {
                while ($childsdata = mysqli_fetch_assoc($childsrun)) {
                    ?>
                    <tr>
                        <th><?php echo $i++ ?></th>
                        <th><?php echo $childsdata['vaccine'] ?></th>
                        <th><?php echo $childsdata['acronym'] ?></th>
                        <th><?php echo $childsdata['description'] ?></th>
                        <th><?php echo $childsdata['period'] ?></th>
                        <td><a href="schedules.php" class="btn btn-primary">View Schedules</a></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6" class="text-center"><h class="text-uppercase px-4 py-1 bg-info text-center">There is no scheduled frequency, please add frequency !</h></td>
                </tr>
                <?php
            }
            ?>
            </tbody>

            </tbody>

        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Schedule Immmunization</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../adminprocessor.php" method="Post">
                        <div class="form-group">
                            <label>Enter Period </label>
                            <input type="text" class="form-control" name="period" value="">
                            <input type="text" class="form-control" hidden name="vaccine_id" value="<?php echo $vaccine_id?>">
                            <input type="text" class="form-control" hidden name="vaccine_name" value="<?php echo $vaccine_name?>">
                        </div>

                        <input type="submit" class="btn float-end mt-3 btn-primary" name="schedule_period" value="Add"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .main-input{
        display:none;
        position: absolute;
        top: 4rem;
        left: 5rem
    }
    .form{

        border: 1px solid;
        width:30rem;
        height:40rem;
        display: flex;justify-content: center;
        align-items: center;
    }
</style>
</body>
</html>