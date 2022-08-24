<?php


function getAllMessageByTravel()
{
    require_once('../src/pdo/pdo.php');

    // ALLER CHERCHER TOUS LES MESSAGES CONCERNANT UN TRAJET

}



function addMessage($content, $userId, $travelId, $date)
{
    require_once('../src/pdo/pdo.php');
    $statement = $bdd->prepare('INSERT INTO messages (content, message_date, user_id, travel_id) VALUES (:content, :message_date, :user_id, :travel_id)');
    $statement->execute([
        'content' => $content,
        'message_date' => $date->format('Y-m-d H:i:s'),
        'user_id' => $userId,
        'travel_id' => $travelId
    ]);


    // AJOUTER UN MESSAGE (content, message_date, user_id, travel_id)

}
function getMessage($id, $bdd)
{
    require_once('../src/pdo/pdo.php');

    $statement = $bdd->prepare('SELECT content, message_date, firstname, lastname, m.user_id  FROM messages m INNER JOIN users AS u on u.user_id = m.user_id  WHERE travel_id = ? ORDER BY message_date DESC');
    $statement->execute(array($id));
    $messages = $statement->fetchAll();
    return $messages;

    // REQUETE SQL POUR ALLER CHERCHER LE TRAJET PAR SON ID FOURNI EN PARAMETRE


    // RETURN LE TRAVEL TROUVE

}
