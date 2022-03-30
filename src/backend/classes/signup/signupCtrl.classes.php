<?php

class SignupCtrl extends Signup {

    private $firstname;
    private $lastname;
    private $password;
    private $mail;
    private $date;


    public function __construct($firstname,$lastname,$password,$mail) {
       $this->firstname = $firstname;
       $this->lastname = $lastname;
       $this->password = $password;
       $this->mail = $mail;
       $this->date = date(DateTimeInterface::ATOM,null);
    }

    public function signupUser() {
        if ($this->emptyInput() == false ){
            header("location: ../frontend/php/index.php#popup-one?error=emptyInput");
            exit();
        }
        if ($this->invalidFirstName() == false ){
            header("location: ../frontend/php/index.php#popup-one?error=invalidFirstName");
            exit();
        }
        if ($this->invalidLastName() == false ){
            header("location: ../frontend/php/index.php#popup-one?error=invalidLastName");
            exit();
        }
        if ($this->invalidEmail() == false ){
            header("location: ../frontend/php/index.php#popup-one?error=invalidEmail");
            exit();
        }
        if ($this->existingEmail() == false){
            header("location: ../frontend/php/index.php#popup-one");
            exit();
        }

        $this->setUser($this->firstname,$this->lastname,$this->password,$this->mail,$this->date);

    }

    private function emptyInput() {
        $res = null;
        if (empty($this->firstname) || empty($this->lastname) || empty($this->password) || empty($this->mail)){
            $res = false;
        }else{
            $res =true;
        }
        return $res;
    }

    private function invalidFirstName(){
        $res = null;
        if (!preg_match("/^[a-zA-Z0-9]*$/",$this->firstname)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;
    }

    private function invalidLastName(){
        $res = null;
        if (!preg_match("/^[a-zA-Z0-9]*$/",$this->lastname)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;
    }
    private function invalidEmail(){
        $res = null;
        if (!filter_var($this->mail,FILTER_VALIDATE_EMAIL)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;
    }

    private function existingEmail(){
        $res = null;
        if (!$this->checkUser($this->mail)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;
    }

}