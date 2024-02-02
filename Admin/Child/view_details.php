<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:/../../login.php");
}

$user_id = $_SESSION['user_id'] ;

include '../../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <title>Child's Details</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
</head>
<style>
    table,tr,td,th{border: solid;border-collapse: collapse;border-spacing:1px}
</style>
<body class="">
<?php include '../../header.php';?>
<div class="container">
    <!-- Button trigger modal -->


</div>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
    
</body>
</html>