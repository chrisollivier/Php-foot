<?php

class club extends Dbh {

    public function getClubData(): bool|array {
        $stmt = $this->connect()->query("SELECT * FROM club");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClub($id_club) : bool|array {
        $stmt = $this->connect()->prepare("SELECT * FROM club where id_club = ?");

        if (!$stmt->execute(array($id_club))) {
            $stmt = null;
            header("location: ../../frontend/php/index.php");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
