<?php

function displayFormLogin(){

    session_start();
        
    require('../templates/login.php');
    
}

function submitLogin(){
    session_start();
    require_once('../src/pdo/pdo.php');
    if(isset($_POST['afpaId'])&& isset($_POST['password']))
    {
        $idAfpa = htmlspecialchars($_POST['afpaId']);
        $password = htmlspecialchars($_POST['password']);

        $check = $bdd->prepare('SELECT afpa_id, email, password FROM users WHERE afpa_id = ?');
        $check->execute(array($idAfpa));
        $data = $check-> fetch();
        $row = $check->rowCount();

        if ($row == 1) 
        {
            if(filter_var($idAfpa, FILTER_VALIDATE_INT))
            {
                if($data['password'] === $password)
                {
                    $_SESSION['LOGGED_USER'] = $data['afpa_id'];
                    header('Location: index.php');
                }
                // if(password_verify($password, $data['password']))
                // {
                //     $_SESSION['LOGGED_USER'] = $data['afpa_id'];
                //     header('Location: index.php');
                // }
                else {
                    $_SESSION['ERROR_LOGIN'] = 'Le pseudo et/ou le mot de passe est incorrect.';
                    $_SESSION['ERROR_LOGIN_INPUT'] = $_POST;
                    header('Location: ../index.php?action=login');
                }
                
            }else{
                header('Location: index.php?action=login');
            } 
        }else {
            $_SESSION['ERROR_LOGIN'] = 'Le pseudo renseigné n\'existe pas, veuillez créer un compte ou réessayer.';
            $_SESSION['ERROR_LOGIN_INPUT'] = $_POST;
            header('Location: index.php?action=login');
        }
    }else {
        $_SESSION['ERROR_LOGIN'] = "Un des champs n'est pas rempli.";
        $_SESSION['ERROR_LOGIN_INPUT'] = $_POST;
        header ('location: index.php?action=login');
    }

}
