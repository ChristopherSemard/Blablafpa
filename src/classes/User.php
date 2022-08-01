<?php
require_once('../src/pdo/pdo.php');


class User
{
    private $idAfpa;
    private $firstName;
    private $lastName;
    private $email;
    private $password;

    public function __construct($idAfpa,$firstName,$lastName,$email,$password) {
		$this->idAfpa=$idAfpa;
		$this->firstName=$firstName;
        $this-> lastName=$lastName;
        $this-> email=$email;
	    $this-> password=$password;
	}
    public function getAfpaId()
    {
        return $this->idAfpa;
    }
    public function setAfpaId($idAfpa)
    {
        $this->idAfpa=$idAfpa;
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName($firstName)
    {
        $this->firstName=$firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLastName($lastName)
    {
        $this->lastName=$lastName;
    } 
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email=$email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password=$password;
    }
    


}
