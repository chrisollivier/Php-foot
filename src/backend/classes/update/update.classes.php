<?php

class update extends Dbh {

    protected function updateUser($firstname,$lastname,$sex,$idClub,$id){
        $stmt = $this->connect()->prepare('UPDATE UTILISATEUR SET nom_uti = ?, prenom_uti = ?, sexe_uti = ?, id_club = ? WHERE id_uti = ?');

        if (!$stmt->execute(array($firstname,$lastname,$sex,$idClub,$id))){
            $stmt = null;
            header("location: ../../frontend/php/index.php#popup-one?error=stmtFailed");
            exit();
        }

        $stmt = null;
    }

    protected function updateUserImg($file,$id){
        $stmt = $this->connect()->prepare('UPDATE UTILISATEUR SET image_uti = ? WHERE id_uti = ?');

        if (!$stmt->execute(array($file,$id))){
            $stmt = null;
            header("location: ../../frontend/php/index.php#popup-one?error=stmtFailed");
            exit();
        }

        $stmt = null;
    }

    protected function updataNews($club,$id) {
        $stmt = $this->connect()->prepare('INSERT INTO s_abonner (id_uti,id_club) VALUES (?,?)');

        if (!$stmt->execute(array($id,$club))){
            $stmt = null;
            header("location: ../../frontend/php/index.php#popup-one?error=stmtFailed");
            exit();
        }

        $stmt = null;
    }


}
