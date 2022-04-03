<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="https://www.ligue1.fr/-/media/Themes/LFP/Ligue1/Ligue1/icons/icon-192-192.png" type="image/ico">

    <title>Article - FootBall ligue</title>
    <style>
        .collapsible-1 {
            background-color: #cffd00;
            color: #09193E;
            cursor: pointer;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            z-index: 0;
        }

        .collapsible-2 {
            background-color: #cffd00;
            color: #09193E;
            cursor: pointer;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            z-index: 0;
        }

        .collapsible-1, .collapsible-2:hover {
            background-color: #CDFB0A;
        }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
            align-content: normal;
        }
    </style>
</head>

<body>
<?php include('../templates/NavBar.php') ?>
<?php include('../../backend/classes/dbh.classes.php') ?>
<?php include('../../backend/classes/article.classes.php') ?>
<?php include('../../backend/classes/commentaire/commentaire.classes.php') ?>
<main>
    <header class="main-header">
        <h1>Article</h1>
    </header>
    <section class="container content-section">
        <div>
            <?php $articles = new article();
            $commentaires = new commentaire();
            foreach ($articles->getArticleData() as $article) { ?>
                <div class="display">
                    <h3><?= $article['name_art'] ?></h3>
                    <div><?= $article['code_art'] ?></div>
                        <a href="article.php?id_art=<?= $article['id_art'] ?>#popup-commantaire">
                            <button class="collapsible-2" type="button">Add commantaire</button>
                        </a>
                        <button type="button" class="collapsible-1">Voire commantaire</button>

                        <div class="content" id="displayCancel">
                            <?php foreach ($commentaires->getCommentaireData($article['id_art']) as $commentaire) { ?>
                                <h5><?= $commentaire['name_com'] ?></h5>
                                <p><?= $commentaire['text_com'] ?></p>
                            <?php } ?>
                        </div>
                </div>
            <?php } ?>
        </div>
    </section>
</main>
<?php include('../templates/footer.php') ?>
<?php include_once('../templates/commantaire.php') ?>
</body>
<script>
    let coll = document.getElementsByClassName("collapsible-1");

    for (let i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            let content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>
</html>