<?php

class CreateGroup extends Dbh {

    protected function setGroup($name) {
        $stmt = $this->connect()->prepare('INSERT INTO `groups` (name) VALUES (?);');


        if(!$stmt->execute(array($name))) {
            $stmt = null;
            header("location: ../../user/manageGroup/create.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function getTable() {
        $stmt = $this->connect()->prepare('SELECT `idGroups`, `name` FROM `groups`');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    
    public function getCountGroup($idGroup=null) {
        if($idGroup===null){
            $stmt = $this->connect()->prepare("SELECT count(idContacts) as count  FROM `contacts` ");
        } else {
            $stmt = $this->connect()->prepare("SELECT count(idContacts) as count  FROM `contacts` WHERE contactGroup = $idGroup ");
        }
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results['count'];
    }
    
    
    public function getSingle($idGroup) {
        $stmt = $this->connect()->prepare ('SELECT name FROM `groups` WHERE idGroups = ?');
        $stmt->execute(array($idGroup));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    public function updateSingle($idGroup, $name) {
        $stmt = $this->connect()->prepare ('UPDATE `groups` SET name=? WHERE idGroups = ?');
        return $stmt->execute(array($name, $idGroup));
    }


    public function deleteSingle($idGroup) {
        //check to see if there are contacts associated with this group
        $check = $this->getCountGroup($idGroup);
        if ($check > 0) {
            return false;
        }
        $stmt = $this->connect()->prepare ('DELETE FROM `groups` WHERE idGroups = ?');
        return $stmt->execute(array($idGroup));
    }

}