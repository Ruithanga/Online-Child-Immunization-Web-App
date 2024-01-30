<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Child Details</title>
    <link rel="stylesheet" href="../../add_child.css">
</head>
<body>
<?php include '../../header.php'; ?>
   <div class="add_child container">

    <h2>Add Child Details</h2>
       <?php
       if(isset($_SESSION['status'])){
           ?>
           <div>
               <p style="background-color: yellow;" class=""><?php echo $_SESSION['status']; ?> ?</p>
           </div>
           <?php
           unset($_SESSION['status']);
       }
       ?>
    <form action="../adminprocessor.php" method="post">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" required>
        
        <label for="age">Age:</label>
        <input type="number" name="age" placeholder="Months/Years" required>
        
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
        
        <label for="parent/guardian_email">Email Address:</label>
        <input type="email" name="email" required>
        
        <label for="phone_number">Phone Number:</label>
        <input type="tel" name="phone_number" pattern="[0-9]{10}" placeholder="Enter 10-digit phone number" required>
        
        <button type="submit" name="add_child_details">Add Child</button>
    </form>
   </div>
</body>
</html>
