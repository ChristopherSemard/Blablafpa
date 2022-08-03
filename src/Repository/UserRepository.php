<?php


function getUserById($id, $bdd){

    $statement = $bdd->prepare('SELECT email, firstname, lastname, afpa_id, user_id  FROM users WHERE user_id = ?');
    $statement->execute(array($id));
    $user = $statement-> fetch();
    return $user;

    // REQUETE SQL POUR ALLER CHERCHER LE TRAJET PAR SON ID FOURNI EN PARAMETRE


    // RETURN LE TRAVEL TROUVE
    
}