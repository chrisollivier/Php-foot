<?php

class Signup extends Dbh{

    private function encryptePass($password): string
    {
        $salt = "MySalt";
        return crypt($password,$salt);
    }

    protected function setUser($firstname,$lastname,$password,$mail,$date){
        $stmt = $this->connect()->prepare('INSERT INTO UTILISATEUR (nom_uti,prenom_uti,mail_uti,password_uti,date_inscription) values (?,?,?,?,?)');
        $cryptPassWord = $this->encryptePass($password);

        if (!$stmt->execute(array($firstname,$lastname,$mail,$cryptPassWord,$date))){
            $stmt = null;
            header("location: ../frontend/php/index.php#popup-one?error=stmtFailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($mail){
        $stmt = $this->connect()->prepare('SELECT mail_uti FROM utilisateur WHERE mail_uti = ? ');

        if (!$stmt->execute(array($mail))){
            $stmt = null;
            header("location: ../frontend/php/index.php#popup-one?error=stmtFailed");
            exit();
        }

        if ($stmt->rowCount() > 0){
            $resCheck =false;
        }else{
            $resCheck =true;
        }

        return $resCheck;
    }

}