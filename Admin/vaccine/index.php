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
                    <div style="display: flex;justify-content: space-between;"  class=" d-flex align-items-center justify-content-between">
                        Vaccines
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #007BFF; float: end;" class="btn btn-primary">Add Vaccine</button>
                    </div>
                </th>
            </tr>
            <tr>
                <td>#</td>
                <td>Vaccine Name </td>
                <td>Acronym</td>
                <td>Description</td>
                <td colspan="2">Operations</td>

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
                    <th><?php echo $childsdata['description'] ?></th>
                    <td><a href="more_info.php?id=<?php echo $childsdata['id']; ?>&name=<?php echo urlencode($childsdata['description']); ?>" class="btn btn-primary">More ..</a></td>

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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Vaccine Records</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../adminprocessor.php" method="Post">
                        <div class="form-group">
                            <label>Acronym </label>
                            <input type="text" class="form-control" name="acronym" value="">
                        </div>

                        <label><b></b>Vaccine Name</label>

                        <input type="text" class="form-control" name="vaccine" value="">

                        <label><b></b>Description</label>

                        <input type="text" class="form-control" name="description" value="">

                        <label><b>Date</b></label></br>
                        <input type="date" class="form-control" name="date" value="">

                        <input type="submit" class="btn float-end mt-3 btn-primary" name="shedule_vaccine" value="Add"/>
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