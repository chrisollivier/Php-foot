<?php

if (isset($_POST['submit'])) {
//Grabbing the data
    $id = $_SESSION['id'];
    $firstname = null;
    $lastname = null;

    if (!isset($_FILES['file'])) {
        $file = null;
    } else {
        $file = $_FILES['file'];
    }
    $sex = null;
    $idClub = null;


    //Instantiate updateCtrl class
    include "../classes/dbh.classes.php";
    include "../classes/update/update.classes.php";
    include "../classes/update/updateCtrl.classes.php";
    $update = new updateCtrl($id, $firstname, $lastname, $sex, $idClub, $file);

    //Running error handlers and user signup
    $update->uploadImg();

    //Redirecting
    header("location: ../../frontend/php/account.php");
}
