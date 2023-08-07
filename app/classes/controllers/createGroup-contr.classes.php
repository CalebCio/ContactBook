<?php

class CreateGroupContr extends CreateGroup {
   private $name;


   public function __construct($name) {
        $this->name = $name;
   }

   public function contactGroup() {
        if($this->emptyInput() == false) {
            //echo empty input!;
            header("location: ../../user/manageGroup/create.php?error=emptyinput");
            exit();
        }

        $this->setGroup($this->name);
    }

   private function emptyInput() {
        $result;
        if(empty($this->name)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
   }
}