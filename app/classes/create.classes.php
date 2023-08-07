<?php

class Create extends Dbh {

    protected function setContact($fullname, $phonenumber, $email, $address, $gender, $group_id) {
        $stmt = $this->connect()->prepare('INSERT INTO contacts (fullname, contactPhone, contactEmail, contactAddress, contactGender, contactGroup) VALUES (?, ?, ?, ?, ?, ?);');


        if(!$stmt->execute(array($fullname, $phonenumber, $email, $address, $gender, $group_id))) {
            $stmt = null;
            header("location: ../../user/manageContact/create.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function getTable() {
        $stmt = $this->connect()->prepare ('SELECT idContacts, fullname, contactPhone, contactEmail, contactAddress, contactGender, contactGroup, name as contactGroupName FROM contacts LEFT JOIN `groups` ON contacts.contactGroup = `groups`.idGroups ORDER BY fullname ASC' );
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    
    public function searchTable($name) {
        $stmt = $this->connect()->prepare("SELECT `idContacts`, `fullname`, `contactPhone`, `contactEmail`, `contactAddress`, `contactGender`, `contactGroup`, `name` as contactGroupName FROM `contacts` LEFT JOIN `groups` ON contacts.contactGroup=`groups`.idGroups WHERE `fullname` LIKE '%$name%' OR `contactEmail` LIKE '%$name%' OR `contactPhone` LIKE '%$name%' ORDER BY fullname ASC");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function contactbyGroup($idGroup) {


        $stmt = $this->connect()->prepare("SELECT `idContacts`, `fullname`, `contactPhone`, `contactEmail`, `contactAddress`, `contactGender`, `contactGroup`,  `name` as contactGroupName FROM `contacts` LEFT JOIN `groups` ON contacts.contactGroup = `groups`.idGroups WHERE `contactGroup` = ?  ORDER BY fullname ASC");

        $stmt->execute(array($idGroup));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function contactbyDate($date) {
        $formatedDate = date('Y-m-d', strtotime($date));
        $stmt = $this->connect()->prepare("SELECT `idContacts`, `fullname`, `contactPhone`, `contactEmail`, `contactAddress`, `contactGender`, `contactGroup`,  `name` as contactGroupName FROM `contacts` LEFT JOIN `groups` ON contacts.contactGroup = `groups`.idGroups WHERE DATE_FORMAT(created_at,'%Y-%m-%d') = ?  ORDER BY fullname ASC");
        $stmt->execute(array($date));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function filterAlphabets() {
        $stmt = $this->connect()->prepare("SELECT DISTINCT LEFT(`fullname`, 1) AS alphabets FROM contacts;");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function contactAlphabet($alpha) {
        $stmt = $this->connect()->prepare("SELECT `idContacts`, `fullname`, `contactPhone`, `contactEmail`, `contactAddress`, `contactGender`, `contactGroup`,  `name` as contactGroupName FROM `contacts` LEFT JOIN `groups` ON contacts.contactGroup = `groups`.idGroups WHERE LEFT(`fullname`, 1) = ?  ORDER BY fullname ASC");
        $stmt->execute(array($alpha));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getSingle($idContact) {
        $stmt = $this->connect()->prepare ('SELECT fullname, contactPhone, contactEmail, contactAddress, contactGender, contactGroup FROM contacts WHERE idContacts = ?');
        $stmt->execute(array($idContact));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    public function updateSingle($idContact,$fullname,$phonenumber,$email,$address,$gender,$group_id) {
        $stmt = $this->connect()->prepare ('UPDATE contacts SET fullname=?, contactPhone=?, contactEmail=?, contactAddress=?, contactGender=?, contactGroup=? WHERE idContacts = ?');
        return $stmt->execute(array($fullname,$phonenumber,$email,$address,$gender,$group_id,$idContact));
    }


    public function deleteSingle($idContact) {
        $stmt = $this->connect()->prepare ('DELETE FROM contacts WHERE idContacts = ?');
        return $stmt->execute(array($idContact));
    }

}