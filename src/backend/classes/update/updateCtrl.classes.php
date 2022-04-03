<?php

class updateCtrl extends update
{

    private $id;
    private $firstname;
    private $lastname;
    private $sex;
    private $idClub;

    public function __construct($id, $firstname, $lastname, $sex, $idClub)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->sex = $sex;
        $this->id = $id;
        $this->idClub = $idClub;


    }

    public function updateTheUser() {

        if ($this->emptyInput() == false) {
            header("location: ../../frontend/php/index.php?error=emptyInput");
            exit();
        }

        if ($this->invalidFirstName() == false) {
            header("location: ../../frontend/php/index.php?error=invalidFirstName");
            exit();
        }

        if ($this->invalidLastName() == false) {
            header("location: ../../frontend/php/index.php?error=invalidLastName");
            exit();
        }

        $this->updateUser($this->firstname, $this->lastname, $this->sex, $this->idClub, $this->id);

    }

    public function uploadImg($fileName,$fileTmpName) {
        if (!empty($fileName)) {
            $destination = 'uploads/' . $this->id . $fileName;
            $extension = pathinfo($destination . $fileName, PATHINFO_EXTENSION);

            if (!in_array($extension, array('jpg', 'png', 'jpeg', 'gif', 'pdf'))) {
                header("location: ../../frontend/php/index.php?error=noFileFind");
                header("location: ../../frontend/php/index.php?error=invalidFileExtension");
            } else {
                if (move_uploaded_file($fileTmpName, 'C:\\xampp\\htdocs\\projectFoot\\src\\uploads\\'.$this->id.$fileName)) {
                    $this->updateUserImg($destination, $this->id);
                }
                header("location: ../../frontend/php/account.php");
            }
            exit();
        }
    }

    public function upNews($idClubNews) {
        $this->updataNews($idClubNews,$this->id);
    }

    private function emptyInput(): bool {
        if (empty($this->firstname) || empty($this->lastname)) {
            $res = false;
        } else {
            $res = true;
        }
        return $res;
    }

    private function invalidFirstName(): bool {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->firstname)) {
            $res = false;
        } else {
            $res = true;
        }
        return $res;
    }

    private function invalidLastName(): bool {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->lastname)) {
            $res = false;
        } else {
            $res = true;
        }
        return $res;
    }

}
