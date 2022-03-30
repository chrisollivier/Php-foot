<?php

class commentaire extends Dbh {

    public function getCommentaireData($idArt): bool|array {
        $stmt = $this->connect()->query("SELECT * FROM commentaire WHERE id_art = $idArt");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function setCommentaire($idArt,$comName,$comText){
        $stmt = $this->connect()->prepare('INSERT INTO COMMENTAIRE (id_art,name_com,text_com) values (?,?,?)');

        if (!$stmt->execute(array($idArt,$comName,$comText))){
            $stmt = null;
            header("location: ../frontend/php/index.php#popup-one?error=stmtFailed");
            exit();
        }

        $stmt = null;
    }
}
