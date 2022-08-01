<?php

function displayFormLogin(){

    session_start();
        
    require('../templates/login.php');
    
}

function submitLogin(){
    session_start();
require_once('../src/pdo/pdo.php');
var_dump($_POST);
if(isset($_POST['afpaId'])&& isset($_POST['password']))
{
    $idAfpa = htmlspecialchars($_POST['afpaId']);
    $password = htmlspecialchars($_POST['password']);

// var_dump($_POST['password']);
    $check = $bdd->prepare('SELECT afpa_id, email, password FROM users WHERE afpa_id = ?');
    $check->execute(array($idAfpa));
    $data = $check-> fetch();
    $row = $check->rowCount();

    if ($row == 1) 
    {

        if(filter_var($idAfpa, FILTER_VALIDATE_INT))
        {
            $password=  $password;

            if($data['password'] === $password)
            {
                $_SESSION['LOGGED_USER'] = $data['afpa_id'];
                header('Location: index.php');

            }else header('Location: ../index.php?action=login');
        }else header('Location: index.php?action=login');
    }else header('Location: index.php?action=login');
}else header ('location: index.php?action=login'); 
}
