<?php

function displayFormSignup(){

    session_start();
        
    require('../templates/signup.php');
}

function submitSignup($input){
    require_once('../src/pdo/pdo.php');
    session_start();
    
    if(isset($input['afpaId']) && isset($input['email']) && isset($input['firstName']) && isset($input['lastName']) && isset($input['password']) && isset($input['password_retype'])){

        $idAfpa = htmlspecialchars($input['afpaId']);
        $firstName = htmlspecialchars($input['firstName']);
        $lastName = htmlspecialchars($input['lastName']);
        $email = htmlspecialchars($input['email']);
        $password = htmlspecialchars($input['password']);
        $password_retype = htmlspecialchars($input['password_retype']);

        $regexPassword = "/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";


        $check = $bdd->prepare('SELECT afpa_id, firstname, lastname, email, password FROM users WHERE afpa_id = ?');
        $check->execute(array($idAfpa));
        $data = $check->fetch();
        $row = $check->rowCount();

        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row !=0){
            $_SESSION['ERROR_SIGNIN'] = 'Un utilisateur existe déjà, merci d\'en choisir un autre.';
            $_SESSION['ERROR_SIGNIN_INPUT'] = $input;
            header('Location: index.php?action=signup');
            exit;
        }

        // // Si les deux mdp saisis sont différents
        else if($password != $password_retype){ 
            $_SESSION['ERROR_SIGNIN'] = 'Vos mots de passe ne correspondent pas.';
            $_SESSION['ERROR_SIGNIN_INPUT'] = $input;
            header('Location: index.php?action=signup');
            exit;
        }

        //     // On verifie que la longueur du pseudo <= 60
        else if(strlen($idAfpa) > 60){ 
            $_SESSION['ERROR_SIGNIN'] = 'L\'ID Afpa n\'est pas valide, merci d\'en choisir un autre.';
            $_SESSION['ERROR_SIGNIN_INPUT'] = $input;
            header('Location: index.php?action=signup');
            exit;
        }

        // // On verifie que la longueur du mail <= 100    
        else if(strlen($email) > 150){ 
            $_SESSION['ERROR_SIGNIN'] = 'Le mail est trop long, merci d\'en choisir un autre.';
            $_SESSION['ERROR_SIGNIN_INPUT'] = $input;
            header('Location: index.php?action=signup');
            exit;
        }

        else if (!preg_match($regexPassword, $password)){
            $_SESSION['ERROR_SIGNIN'] = 'Votre mot de passe n\'est pas valide';
            $_SESSION['ERROR_SIGNIN_INPUT'] = $input;
            header('Location: ../index.php?action=signin');
            exit;
        }

        else{
            $password = password_hash($password, PASSWORD_BCRYPT);
            $statement = $bdd->prepare('INSERT INTO users (afpa_id, email, firstname, lastname, password) VALUES (:afpa_id, :email, :firstname, :lastname, :password)');
            $statement->execute(  ['afpa_id' => $idAfpa,
            'firstname' => $firstName,
            'lastname' => $lastName,
            'email' => $email,
            'password' => $password]);
            // On redirige avec le message de succès
            $_SESSION['LOGGED_USER'] = $idAfpa;
            header('Location:index.php');
        }

    }

    else {
        $_SESSION['ERROR_SIGNIN'] = 'Un des champs n\'est pas rempli.';
        $_SESSION['ERROR_SIGNIN_INPUT'] = $input;
        header('Location: ../index.php?action=signin');
        exit;

    }
}