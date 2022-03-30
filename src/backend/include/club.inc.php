<?php

//Instantiate SignupCtrl class
include "../classes/dbh.classes.php";
include "../classes/club.classes.php";
$club = new clubCtrl();

//Running error handlers and add all club
$numClub = $club->getNumClub();
$nameClub = $club->getClubName();
$ligueClub = $club->getClubligue();
$imageClub = $club->getClubImage();
for ($i = 0; $i < $club->getNumOfClubInDB(); $i++) {
    $club->getClub($i,$stmt = $this->connect()->prepare("SELECT * FROM club"));
    ?>
    <div class="product-container">
        <div class="image-container">
            <img src= <?= $imageClub[$i] ?> alt="">
        </div>
        <div class="product-descripton">
            <div class="product-colorNsize">
                <p>Mon du Club : <?php echo $nameClub[$i]; ?></p>
            </div>
            <div class="product-price">
                <p>Ligue : <?php echo $ligueClub[$i]; ?></p>
                <form action="">
                    <input type="radio" class="cart" name="follow" value="+">
                </form>
            </div>

        </div>
    </div>
    <?php
}
?>

