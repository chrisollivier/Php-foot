<?php
//if (!isset($_SESSION['id_uti'])){
//    header('location: ./index.php');
//}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style-shop.css">
    <link rel="icon" href="https://www.ligue1.fr/-/media/Themes/LFP/Ligue1/Ligue1/icons/icon-192-192.png" type="image/ico">
    <title>Account - FootBall ligue</title>
</head>

<body>
<?php include('../templates/NavBar.php') ?>
<?php include_once '../templates/club_desc.php' ?>
<?php include_once('../../backend/classes/dbh.classes.php') ?>
<?php include_once('../../backend/classes/club.classes.php') ?>

<main>
        <div class="grid-container">
            <?php $clubs = new club() ?>
            <?php foreach ($clubs->getClubData() as $data) { ?>
            <a href="?id_club=<?= $data['id_club'] ?>#popup-commantaire">
                <div class="product-container">
                    <div class="image-container">
                        <img src="<?= $data['image_club']; ?>" alt="">
                    </div>
                    <div class="product-descripton">
                        <div class="product-colorNsize">
                            <p>Nom du Club : <?= $data['nom_club']; ?></p>
                        </div>
                        <div class="product-price">
                            <p>Ligue : <?= $data['ligue_club']; ?></p>
                        </div>
                        <div class="product-price">

                        </div>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
</main>
<?php include('../templates/footer.php') ?>
</body>

</html>