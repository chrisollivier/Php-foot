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
<?php include('../../backend/classes/dbh.classes.php') ?>
<?php include('../../backend/classes/club.classes.php') ?>

<main>
    <form action="../../backend/include/update.inc.php" method="post" enctype="multipart/form-data">
        <div class="accountHeader">
            <h1>Account</h1>
            <h2>Welcome <?= $_SESSION['nom']; ?></h2>
            <h3>update your Account </h3>
        </div>
        <div>
            <div class="userInfo">
                <div class="inputInfo">
                    <div>
                        <label class="inputInfoLabel" for="<?= $_SESSION['nom']; ?>">Nom </label>
                        <input id="account-input-name" type="text" name="firstname" placeholder="First Name"
                               required="required" value='<?= $_SESSION['nom']; ?>'/>
                    </div>
                    <div>
                        <label for="<?= $_SESSION['prenom']; ?>">Prenom</label>
                        <input id="account-input-name" type="text" name="lastname" placeholder="Last Name"
                               required="required" value='<?= $_SESSION['prenom']; ?>'/>
                    </div>
                </div>
                <div class="sexInfo">
                    <p>Sexe</p>
                    <input type="radio" name="sex"
                           value="H" <?php if (isset($_SESSION['sex']) && $_SESSION['sex'] == 'H') { ?> checked <?php } ?> ><label
                            for="H">Homme</label><br>
                    <input type="radio" name="sex"
                           value="F" <?php if (isset($_SESSION['sex']) && $_SESSION['sex'] == 'F') { ?> checked <?php } ?>><label
                            for="F">Femme</label>
                </div>
                <div class="imageInfo">
                    <img class="userImg"
                         src="<?php if ($_SESSION['image'] == null) { ?> ../../Img/Default_Profile_img.jpg <?php } else {
                             echo'../../'. $_SESSION['image'];
                         } ?>" alt="">
                    <input type="file" name="file1" <?php if (isset($_SESSION['image'])){ ?>value="<?= $_SESSION['image'] ?>" <?php }?> >
                </div>
            </div>
        </div>
        <div class="grid-container">
            <?php $clubs = new club() ?>
            <?php foreach ($clubs->getClubData() as $data) { ?>
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
                            <div>
                                <label class="toggle">
                                    <input class="toggle__input" type="radio" name="fav" id="fav"
                                           value="<?= $data['id_club'] ?>" <?php if (isset($_SESSION['idClub']) && $_SESSION['idClub'] == $data['id_club']) { ?> checked <?php } ?>>
                                    <span class="toggle__label">Favori</span>
                                </label>
                            </div>
                            <div>
                                <label class="toggle">
                                    <input class="toggle__input" type="checkbox" name="<?='news'.$data['id_club']?>"
                                           value="<?= $data['id_club'] ?>" <?php if (isset($_SESSION['idClub']) && $_SESSION['idClub'] == $data['id_club']) { ?> checked <?php } ?>>
                                    <span class="toggle__label">News</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button type="submit" name="submit">Save</button>
    </form>
</main>
<?php include('../templates/footer.php') ?>
</body>

</html>