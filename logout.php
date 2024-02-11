<?php

session_destroy();
session_start();
    $_SESSION['status'] = 'You have logout of the system';

header("location:/login.php");


