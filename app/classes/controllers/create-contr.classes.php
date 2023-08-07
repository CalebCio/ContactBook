<?php

class CreateContr extends Create {
   private $fullname;
   private $phonenumber;
   private $email;
   private $address;
   private $gender;
   private $group_id;


   public function __construct($fullname, $phonenumber, $email, $address, $gender, $group_id) {
        $this->fullname = $fullname;
        $this->phonenumber = $phonenumber;
        $this->email = $email;
        $this->address = $address;
        $this->gender = $gender;
        $this->group_id = $group_id;
   }

   public function contactUser() {
        if($this-> emptyInput() == false) {
            //echo empty input!;
            header("location: ../../user/manageContact/create.php?error=emptyinput");
            exit();
        }

        $this->setContact($this->fullname, $this->phonenumber, $this->email, $this->address, $this->gender, $this->group_id);
    }

   private function emptyInput() {
        $result;
        if(empty($this->fullname) || empty($this->phonenumber) || empty($this->email) || empty($this->address) || empty($this->gender) || empty($this->group_id)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
   }

}