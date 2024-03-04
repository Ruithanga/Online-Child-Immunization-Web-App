
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
</head>
<body>


<?php
    if(isset($_SESSION['status'])){
    ?>
<div>
    <h2><?php echo $_SESSION['status']; ?></h2>
</div>
<?php
unset($_SESSION['status']);
}
?>
<style>
    .test{
        background-color: #86b7fe;
        display: flex;
        justify-content: center;
        align-items: center;
        width:100vw;
        height: 100vh;
    }
</style>

<div class="test">
    <div style="height: 20rem;width: 30rem;" class="">
        <a style="position: absolute;top: 4rem;left: 2rem;" href="/" class="btn btn-primary mb-4">Go Home</a>
        <form action="resetpasswordprocessor.php" method="post">
            <h3 class="text-center text-decoration-none">Enter The Email You registered With </h3>
            <input type="email" style=" height: 2rem;width: 100%;" name="email" placeholder="Enter email"><br><br>
            <button type="submit" class="btn btn-secondary w-100" name="forgetpassword">Click To Reset Password</button>
        </form>
    </div>

</div>



</body>
</html>