<?php
session_start();
if (isset($_POST['submit'])) {

    //Grabbing the data
    $id = $_SESSION['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    if (!isset($_FILES['file1'])) {
        $file = null;
    } else {
        $file = $_FILES['file1'];
    }

    if (!isset($_POST['sex'])) {
        $sex = null;
    } else {
        $sex = $_POST['sex'];
    }

    if (!isset($_POST['fav'])) {
        $idClub = null;
    } else {
        $idClub = $_POST['fav'];
    }

    //$idClubNews = array();


    //todo add the rest

    //Instantiate updateCtrl class
    include "../classes/dbh.classes.php";
    include "../classes/update/update.classes.php";
    include "../classes/update/updateCtrl.classes.php";
    $update = new updateCtrl($id, $firstname, $lastname, $sex, $idClub, $file);

    //Running error handlers and user signup
    $update->updateTheUser();

    if (isset($_FILES['file1'])) {
        $update->uploadImg($file['name'],$file['tmp_name']);
    }
    for($i=0;$i>10;$i++){
        if (isset($_POST['news'.$i])) {
            $update->upNews($_POST['news'.$i]);
        }
    }



    //Redirecting
    header("location: ../../frontend/php/account.php");

}
