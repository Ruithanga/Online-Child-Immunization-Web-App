<?php
session_start();
include '../../connection.php';
if(!isset($_SESSION['user_id'])){
    header("location:/../../login.php");
}

$username = $_SESSION['username'] ;
$user_id = $_SESSION['user_id'] ;

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
<div class="table-responsive">
    <table class="table  border table-bordered table-striped">
        <thead>
        <tr>
            <th colspan="7" class="">
                <div style="display: flex;justify-content: space-between;"  class=" d-flex align-items-center justify-content-between">
                    Vaccines Schedules
                    <button onclick="showForm()" style="background-color: #007BFF; float: end;" class="btn btn-primary">Add Schedule</button>
                </div>
            </th>
        </tr>
        <tr>
            <td>#</td>
            <td>Vaccine Name </td>
            <td>Date of Administering</td>
            <td>Operations</td>

        </tr>
        </thead>
        <tbody>
        <?php
        $childs= "SELECT * FROM c_schedules";
        $childsrun = mysqli_query($conn, $childs);

        while ($childsdata = mysqli_fetch_assoc($childsrun)) {
            ?>
            <tr>
                <th><?php echo $childsdata['id'] ?></th>
                <th><?php echo $childsdata['vaccine'] ?></th>
                <th><?php echo $childsdata['date'] ?></th>
                <td><button class="btn btn-primary">Send Reminder</button></td>
                <td><button class="btn btn-primary">View </button></td>

            </tr>
            <?php
        }
        ?>
        </tbody>
        </tbody>

    </table>
</div>

<div class="main-input" id="form">
    <div class="form">

            <div class="">
                <h1>Schedule Immmunization  <button onclick="closeForm()" class="btn btn-primary">Close</button></h1>
                <form action="../adminprocessor.php" method="Post">
                    <label><b>Vaccine</b></label></br>
                <input type="text" name="vaccine" value="">
                <br><br>
                    <label><b>Date</b></label></br>
                <input type="date" name="date" value="">
                <br><br>
                <input type="submit" name="shedule_vaccine" value="Shedule"/>
                </form>
            </div>

    </div>
</div>
<script>
    const form = document.getElementById("form");
    function showForm(){
       form.style.display="block"

    }function closeForm(){
       form.style.display="none"

    }
</script>
<style>
    .main-input{
        display:none;
    }
    .form{
        border: 1px solid;
        width:30rem;
        display: flex;justify-content: center;
        align-items: center;
    }
</style>
</body>
</html>