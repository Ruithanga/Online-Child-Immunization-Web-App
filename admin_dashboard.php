<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Vaccination System Dashboard</title>
    <link rel="stylesheet" href="Admin_dashboard.css">
</head>
<body>
    <div class="topnav">
<!--        <label>--><?php //echo $_SESSION['Username'];?><!--</label>-->
        
        <a href="Home.html">Logout</a>
    </div>
    <div class="container">
        <center>
            <a href= "Admin/Child/index.php"><div class="btn"><img src="images/avatar.jpg" />
                <br>Add Child Details</div></a>
            <a href= "Admin/Child/view_details.php"><div class="btn"><img src="images/avatar.jpg" />
                <br>View Child Details</div></a>
            <a href= "Admin/vaccine/index.php"><div class="btn"><img src="images/avatar.jpg" />
                <br>Add Vaccine</div></a>
            <a href= "Admin/Child/index.php"><div class="btn"><img src="images/avatar.jpg" />
                <br>Allocate Vaccine</div></a>
        </center>
    </div>     
</body>
</html>
