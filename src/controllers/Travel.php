<?php



function displayTravel($id)
{
    session_start();
    require_once('../src/pdo/pdo.php');
    require_once('../src/Repository/TravelRepository.php');
    require_once('../src/Repository/UserRepository.php');
    require_once('../src/Repository/MessageRepository.php');



    $travel = getTravelById($id, $bdd);
    // var_dump($travel);

    $user = getUserById($travel["user_id"], $bdd);
    $messages = getMessage($id, $bdd);


    // var_dump($user);



    require('../templates/travel.php');
}

function submitMessage($input)
{
    session_start();
    require_once('../src/Repository/MessageRepository.php');
    var_dump($input);
    $content = htmlspecialchars($input['message']);
    $userId = $input['userId'];
    $travelId = $input['travelId'];
    $date = new DateTime();
    addMessage($content, $userId, $travelId, $date);
    header('Location: index.php?action=travel&id=' . $travelId);
}
