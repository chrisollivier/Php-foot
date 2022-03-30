<?php

class article extends Dbh {

    public function getArticleData(): bool|array {
        $stmt = $this->connect()->query("SELECT * FROM article");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
