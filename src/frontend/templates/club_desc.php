<?php

include_once('../../backend/classes/dbh.classes.php');
include_once('../../backend/classes/club.classes.php');

$clubs = new club();
if (isset($_GET['id_club'])) {
    $id_club = $_GET['id_club'];
    foreach ($clubs->getClub($id_club) as $data);
    ?>
<div id="popup-commantaire" class="overlay">
    <div class="popup">
        <div class="form-container sign-up-container">
            <a class="close" href="#">&times;</a>
            <h1> <?=$data['nom_club'] ?> </h1>
            <h3>le president du club est <?= $data['president']?></h3><img src="<?= $data['image_club']; ?>" alt="">
            <h3>il réside à <?=$data['ville'] ?></h3>
            <p>histoire du club : <?= $data['histoire']?></p>
        </div>
    </div>
</div>
<?php } ?>