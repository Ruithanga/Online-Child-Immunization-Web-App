<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../add_vaccine.css">
    <title>Add Vaccine</title>
</head>
<body>
    <Form method="Post"class="container"action="<?php" $_server['PHP_SELF'] ?>
        <div class="div">
            <a href="../../admin_dashboard.php"><img src="../../images/avatar.jpg" width="30" height="30"></a>

            <h1>Add Vaccine</h1>
            <label><b>Vaccine Name</b></label></br>
            
            <select name="vaccine" style="width: 200px; height: 30px;">
                <option value="none" selected disabled hidden>Select a vaccine</option>
                <option value="BCG">BCG</option>
                <option value="Hepatitis B Birth dose">Hepatitis B Birth dose</option>
                <option value="OPV Birth dose">OPV Birth dose</option>
                <option value="IPV  (inactivated  Polio  Vaccine)">IPV (inactivated Polio Vaccine)</option> 
                <option value="Pentavalent">Pentavalent</option>      
                <option value="RotaVirus Vaccine">RotaVirus Vaccine</option>
                <option value="DPT 1st  booster">DPT 1st  booster</option>    
                <option value="DPT2 2nd Booster">DPT 2nd Booster </option>
                <option value="Vitamin A">Vitamin A</option>      
                <option value="other">Other</option>
            </select>

                <input type="Submit" name="addvaccine" value="Add Vaccine"/> 

        </div>
    </Form>
</body>
</html>