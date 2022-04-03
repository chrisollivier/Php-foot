<?php

class commentaireCtrl extends commentaire{

    private $idArt;
    private $comName;
    private $comText;

    public function __construct($idArt, $comName, $comText) {
        $this->idArt = $idArt;
        $this->comName = $comName;
        $this->comText = $comText;
    }

    public function addCommentaire() {
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

        $this->setCommentaire($this->idArt,$this->comName,$this->comText);

    }

}