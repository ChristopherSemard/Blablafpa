<?php



function displayTravel($id)
{
    require_once('../src/pdo/pdo.php');
    require_once('../src/Repository/TravelRepository.php');
    require_once('../src/Repository/UserRepository.php');
    require_once('../src/Repository/MessageRepository.php');
    require_once('../src/Repository/BookingRepository.php');

    $travel = getTravelById($id, $bdd);
    $travelSteps = getTravelSteps($id, $bdd);
    $user = getUserById($travel["user_id"], $bdd);
    $messages = getMessage($id, $bdd);
    $bookedUsers = getBookedUsers($id, $bdd);
    if (isset($_SESSION['LOGGED_USER'])) {
        $userIsBookedCount = 0;
        foreach ($bookedUsers as $key => $bookedUser) {
            if ($bookedUser['user_id'] == $_SESSION['LOGGED_USER']['userId']) {
                $userIsBooked = true;
                $userIsBookedIndex = $key;
                $userIsBookedCount++;
            } elseif ($travel['user_id'] == $_SESSION['LOGGED_USER']['userId']) {
                $userIsBooked = false;
            }
        }
    } else {
        $userIsBooked = false;
    }

    require('../templates/travel.php');
    unset($_SESSION['ERROR_BOOKING-TRAVEL']);
    unset($_SESSION['SUCCESS_BOOKING-TRAVEL']);
}

function submitMessage($input)
{
    require_once('../src/Repository/MessageRepository.php');
    $content = htmlspecialchars($input['message']);
    $userId = $input['userId'];
    $travelId = $input['travelId'];
    $date = new DateTime();
    addMessage($content, $userId, $travelId, $date);
    header('Location: index.php?action=travel&id=' . $travelId . '#messages');
}
