<?php

if (isset($_POST['submit'])){

    //Grabbing the data
    $userIp = $_SERVER['REMOTE_ADDR'];
    $currentTime = $_SERVER['REQUEST_TIME'];

    $password = $_POST['password'];
    $mail = $_POST['mail'];


    //Instantiate loginCtrl class
    include "../classes/dbh.classes.php";
    include "../classes/login/login.classes.php";
    include "../classes/login/loginCtrl.classes.php";
    $login =new loginCtrl($password,$mail,$userIp);

    //Running error handlers and user login
    $login->loginUser();

    //Redirecting
    header("location: ../login_success.php");


}