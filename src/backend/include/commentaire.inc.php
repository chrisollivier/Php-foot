<?php
session_start();

if (isset($_POST['submit'])){

    //Grabbing the data
    $idArt = $_GET['id_art'];
    $idUti = $_SESSION['id'];
    $comName = htmlentities($_POST['comName']);
    $comText = htmlentities($_POST['comText']);

    //Instantiate SignupCtrl class
    include('../../backend/classes/dbh.classes.php');
    include('../../backend/classes/commentaire/commentaire.classes.php');
    include('../../backend/classes/commentaire/commentaireCtrl.classes.php');

    $commentaire = new commentaireCtrl($idArt,$comName, $comText);

    //Running error handlers and user signup

    $commentaire->addCommentaire();

    //Redirecting
    header("location: ../../frontend/php/article.php");

}