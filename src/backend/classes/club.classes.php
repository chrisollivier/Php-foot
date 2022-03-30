<?php

class club extends Dbh {

    public function getClubData(): bool|array {
        $stmt = $this->connect()->query("SELECT * FROM club");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
