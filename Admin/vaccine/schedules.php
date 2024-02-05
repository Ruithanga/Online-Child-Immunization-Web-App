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
<!--    <link rel="stylesheet" href="../../add_vaccine.css">-->
    <title>Add Vaccine</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
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
<div class="container">
    <div class="table-responsive">
        <table class="table  border table-bordered table-striped">
            <thead>
            <tr>
                <th colspan="7" class="">
                    <div   class="text-center text-uppercase">
                       All Schedules
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #007BFF; float: end;" class="btn btn-primary">Add Period</button>

                    </div>
                </th>
            </tr>
            <tr>
                <td>#</td>
                <td>Vaccine Name </td>
                <td>Acronym</td>
                <td>Description</td>
                <td>Period</td>
                <td colspan="2">Operations</td>

            </tr>
            </thead>
            <tbody>
            <?php
            $childs = "SELECT * FROM c_schedules JOIN c_vaccines ON c_schedules.vaccine_id = c_vaccines.id";
            $childsrun = mysqli_query($conn, $childs);

            // Initialize an empty associative array to group data by vaccine
            $groupedData = array();

            while ($childsdata = mysqli_fetch_assoc($childsrun)) {
                $vaccine = $childsdata['vaccine'];

                // Check if the vaccine key exists in the grouped data array
                if (!isset($groupedData[$vaccine])) {
                    // If not, create an array for the vaccine key
                    $groupedData[$vaccine] = array();
                }

                // Add the current data to the corresponding vaccine key
                $groupedData[$vaccine][] = $childsdata;
            }

            // Loop through the grouped data and display it
            foreach ($groupedData as $vaccine => $data) {
                // Output the vaccine as a header or any other relevant information

                // Loop through the data related to the current vaccine
                foreach ($data as $item) {
                    ?>
                    <tr>
                        <th><?php echo $item['id'] ?></th>
                        <th><?php echo $item['vaccine'] ?></th>
                        <th><?php echo $item['acronym'] ?></th>
                        <th><?php echo $item['description'] ?></th>
                        <th><?php echo $item['period'] ?></th>
                        <td><a href="more_info.php?id=<?php echo $item['id']; ?>" class="btn btn-secondary">More info</a></td>
                        <td><a href="../reminders.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Reminders</a></td>
                    </tr>
                    <?php
                }
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Period for Single vaccines</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../adminprocessor.php" method="Post">
                     <div class="form-group">
                         <label>Vaccine Name </label>
                         <select name="vaccine_id" class="form-control">
                             <?php
                             $childs = "SELECT * FROM c_vaccines";
                             $childsrun = mysqli_query($conn, $childs);
                             while ($childsdata = mysqli_fetch_assoc($childsrun)) {
                                 ?>
                             <option value="<?php echo $childsdata['id']?>"><?php echo $childsdata['vaccine']?></option>
                             <?php
                                }
                             ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label>Period in Days </label>
                         <input type="nuber" class="form-control" name="period" value="">
                     </div>

                        <input type="submit" class="btn float-end mt-3 btn-primary" name="schedule_period" value="Shedule"/>
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