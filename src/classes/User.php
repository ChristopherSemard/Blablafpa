<?php
require_once('../src/pdo/pdo.php');


class User{
    private $id;
    private $afpaId;
    private $email;
    private $firstname;
    private $lastname;

    public function getEmail(){
        return $this->id;
    }
}
