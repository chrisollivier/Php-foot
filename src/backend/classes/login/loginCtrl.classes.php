<?php

class loginCtrl extends login{

    private $password;
    private $mail;
    private $ip;


    public function __construct($password,$mail,$ip) {
        $this->password =$password;
        $this->mail = $mail;
        $this->ip = $ip;
    }
    public function loginUser() {
        if ($this->emptyInput() == false ){
            header("location: ../frontend/php/index.php#popup-two?error=emptyInput");
            exit();
        }

        $this->getUser($this->password,$this->mail,$this->ip);

    }

    private function emptyInput(): bool {
        if (empty($this->password) || empty($this->mail)){
            $res = false;
        }else{
            $res =true;
        }
        return $res;
    }
}
