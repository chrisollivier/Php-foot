<?php

if (isset($_POST['submit'])){

    //Grabbing the data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];

    //Instantiate SignupCtrl class
    include "../classes/dbh.classes.php";
    include "../classes/signup/signup.classes.php";
    include "../classes/signup/signupCtrl.classes.php";
    $signup = new SignupCtrl($firstname,$lastname,$password,$mail);

    //Running error handlers and user signup
    $signup->signupUser();

    //Redirecting
    header("location: ../../frontend/php/index.php#popup-two");

}

