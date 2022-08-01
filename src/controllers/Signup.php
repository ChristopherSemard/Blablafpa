<?php

function displayFormSignup(){

    session_start();
        
    require('../templates/signup.php');
}

function submitSignup($input){
    require_once('../src/pdo/pdo.php');
    session_start();
if(isset($input['afpaId']) && isset($input['email']) && isset($input['firstName']) && isset($input['lastName']) && isset($input['password']) && isset($input['password_retype'])){
    var_dump($input);
    $idAfpa = htmlspecialchars($input['afpaId']);
    $firstName = htmlspecialchars($input['firstName']);
    $lastName = htmlspecialchars($input['lastName']);
    $email = htmlspecialchars($input['email']);
    $password = htmlspecialchars($input['password']);
    $password_retype = htmlspecialchars($input['password_retype']);
    

    $check = $bdd->prepare('SELECT afpa_id, firstname, lastname, email, password FROM users WHERE afpa_id = ?');
    
    $check->execute(array($idAfpa));
    $data = $check->fetch();
    $row = $check->rowCount();
var_dump($data);
    $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
    var_dump(1);
    // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
    if($row == 0){ 
        if(strlen($idAfpa) <= 60){ // On verifie que la longueur du pseudo <= 60
            if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                    if($password == $password_retype){ // si les deux mdp saisis sont bons

                        $password = hash('sha256', $password);
                        var_dump(2);
                    
                        $insert = $bdd->prepare('INSERT INTO users(afpa_id, email, firstname, lastname, password) VALUES(:afpa_id, :firstname, :lastname, :email, :password');
                        $insert->execute(array(
                            'afpa_id' => $idAfpa,
                            'firstname' => $firstName,
                            'lastname' => $lastName,
                            'email' => $email,
                            'password' => $password,
                    
            
                        ));
                        // On redirige avec le message de succès
                        // header('Location:index.php?action=login');
                        
                    }else header('Location: index.php?action=signup');
                }else header('Location: index.php?action=signup');
            }else header('Location: index.php?action=signup');
        }else header('Location: index.php?action=signup');
    }else header('Location: index.php?action=signup');




        

    }
}