<?php

class login extends Dbh{

    private function encryptPass($password): string
    {
        $salt = "MySalt";
        return crypt($password,$salt);
    }

    protected function getUser($password, $mail,$ip)
    {
        $stmt = $this->connect()->prepare("SELECT password_uti FROM utilisateur WHERE mail_uti = ?");

        if (!$stmt->execute(array($mail))) {
            $stmt = null;
            header("location: ../../frontend/php/index.php#popup-two?error=stmtFailed");
            exit();
        }

        if ($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../../frontend/php/index.php#popup-two?error=notfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = $this->passWordVerify($password,$pwdHashed[0]["password_uti"]);

        if ($checkPwd == false){
            $this->addlogs($mail,$ip,'false');
            $stmt = null;
            header("location: ../../frontend/php/index.php#popup-two?error=notfound");
            exit();
        } else {
            session_start();
            $this->addlogs($mail,$ip,'true');
            $this->getSessionInfo($mail);
        }

        $stmt = null;
    }
    private function passWordVerify($pwd,$hashedPwd): bool
    {
        if ($this->encryptPass($pwd) == $hashedPwd){
            $res = true;
        }else{
            $res =false;
        }
        return $res;
    }

    private function addlogs ($mail,$ip,$status){
        $stmt = $this->connect()->prepare('INSERT INTO LOGS (mail_uti,ip_log,status,date_log) values (?,?,?,now())');

        if (!$stmt->execute(array($mail,$ip,$status))){
            $stmt = null;
            header("location: ../../frontend/php/index.php#popup-one?error=stmtFailed");
            exit();
        }

        $stmt = null;
    }

    private function getSessionInfo($mail){

        $stmt = $this->connect()->prepare("SELECT * FROM utilisateur WHERE mail_uti = ?");

        if (!$stmt->execute(array($mail))) {
            $stmt = null;
            header("location: ../../frontend/php/index.php#popup-two");
            exit();
        }

        $allData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $allData[0]['id_uti'];
        $_SESSION['idClub'] = $allData[0]['id_club'];
        $_SESSION['nom'] = $allData[0]['nom_uti'];
        $_SESSION['prenom'] = $allData[0]['prenom_uti'];
        $_SESSION['mail'] = $allData[0]['mail_uti'];
        $_SESSION['sex'] = $allData[0]['sexe_uti'];
        $_SESSION['image'] = $allData[0]['image_uti'];
        $_SESSION['isAdmin'] = $allData[0]['isadmin_uti'];
    }
}