<?php
session_start();
if(isset($_SESSION["mail"])) {

    echo '<h3>Login Success, Welcome - '.$_SESSION['id'].'</h3>';
    echo '<h3> - '.$_SESSION['idClub'].'</h3>';
    echo '<h3> - '. $_SESSION['nom'].'</h3>';
    echo '<h3> - '.$_SESSION['prenom'].'</h3>';
    echo '<h3> - '.$_SESSION['mail'].'</h3>';
    echo '<h3> - '.$_SESSION['sex'].'</h3>';
    echo '<h3> - '.$_SESSION['image'] .'</h3>';
    //echo '<meta http-equiv="Refresh" content="5.1;URL= ../frontend/php/account.php">';
    header("location: ../frontend/php/account.php");
} else {
    header("location: ../frontend/php/index.php#popup-two ");
}