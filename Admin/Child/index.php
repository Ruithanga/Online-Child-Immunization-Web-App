<?php
session_start();

include '../../connection.php';
if(!isset($_SESSION['user_id'])){
    header("location:/../../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Child Details</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../add_child.css">
    <script src="../../js/main.js"></script>
</head>
<body>
<?php include '../../header.php'; ?>
   <div class="container">
       <?php
       if(isset($_SESSION['status'])){
           ?>
           <div>
               <p style="font-size: 23px; background-color: #d69847;padding: 1rem; text-transform: uppercase;" class="text-white  btn-danger p-2"><?php echo $_SESSION['status']; ?> !</p>
           </div>
           <?php
           unset($_SESSION['status']);
       }
       ?>
       <div class="table-responsive">
           <table class="table  border table-bordered table-striped">
               <thead>
               <tr>
                   <th colspan="6" class=""><div class=" d-flex align-items-center justify-content-between">
                           Childrens Immunization schedule
                           <span>
                                 <button href="report.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Child</button>
                           </span>
                       </div>
                   </th>
               </tr>
               <tr>
                   <td>#</td>
                   <td>child Name</td>
                   <td>Date of birth</td>
                   <td>Age in Days</td>
                   <td colspan="2">Operations</td>
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
                       <th>
                           <?php
                           $birthdate = new DateTime($childsdata['dob']);
                            $today = new DateTime();
                            $interval = $today->diff($birthdate);
                            $daysSinceBirth = $interval->format('%a');
                            echo $daysSinceBirth;
                           ?>
                       </th>
                       <th>
                           <a href="more_info.php?id=<?php echo $childsdata['id']; ?>&name=abu" onclick="editChildDetails(<?php echo $childsdata['id']; ?>)" class="btn btn-secondary">Edit</a>
                       </th>

                   </tr>
                   <?php
               }
               ?>
               </tbody>
               </tbody>

           </table>
       </div>

       <!-- add child Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <h1 class="modal-title fs-5" id="exampleModalLabel">Add Child Details</h1>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <form action="../adminprocessor.php" method="post">
                           <label for="full_name">Full Name:</label>
                           <input type="text" name="full_name" required>

                           <label for="dob">Date of Birth:</label>
                           <input type="date" name="dob" required>

                           <label for="height">Height:</label>
                           <input type="number" name="height" placeholder="Inches/Centimeters" required>

                           <label for="weight">Weight:</label>
                           <input type="number" name="weight" placeholder="Pounds/Kilograms" required>

                           <label for="gender">Gender:</label>
                           <select name="gender" required>
                               <option value="female">Female</option>
                               <option value="male">Male</option>
                           </select>
                           <label for="full_name">Mother's Name:</label>
                           <input type="text" name="mother_name" required>

                           <label for="full_name">Father's Name:</label>
                           <input type="text" name="father_name" required>

                           <label for="parent/guardian_email">Email Address:</label>
                           <input type="email" name="email" required>

                           <label for="phone_number">Phone Number:</label>
                           <input type="tel" name="phone_number" pattern="[0-9]{10}" placeholder="eg.0728548760" required>

                           <div class="d-flex justify-content-between">
                               <button type="submit" class="" data-bs-dismiss="modal" name="add_child_details">Close</button>
                               <button type="submit" class="float-end mx-4" name="add_child_details">Add Child</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>



   </div>

<script>
    function editChildDetails($childData) {
        const parsedData = $childData.value;
console.log(parsedData);
    }


</script>
</body>
</html>
