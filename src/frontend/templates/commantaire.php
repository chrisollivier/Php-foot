<?php if (isset($_GET['id_art']))$idArt = $_GET['id_art'];?>
<div id="popup-commantaire" class="overlay">
    <div class="popup">
        <div class="form-container sign-up-container">
            <a class="close" href="#">&times;</a>
            <form class="account" id="monform" action="../../backend/include/commentaire.inc.php?id_art=<?=$idArt?>" method="post">
                <h1>Commantaire</h1>
                <div class="nameinput"><input id="commantaire-input-name" type="text" name="comName" required="required"/></div>
                <div class="nameinput"><textarea id="commantaire-input-name" name="comText" cols="100" rows="15" required="required"></textarea></div>
                <div class="button-container"><input type="submit" class="button" name="submit" value="ADD"></div>
            </form>
        </div>
    </div>
</div>