<?php



function displayFormBooking($id)
{
    require_once('../src/pdo/pdo.php');
    require_once('../src/Repository/TravelRepository.php');

    $travel = getTravelById($id, $bdd);
    // $travelSteps = getTravelSteps($id, $bdd);
    require('../templates/booking.php');
    unset($_SESSION['ERROR_BOOKING-TRAVEL']);
}


function submitBooking($input)
{

    require_once('../src/pdo/pdo.php');
    require_once('../src/Repository/TravelRepository.php');
    require_once('../src/Repository/BookingRepository.php');
    require_once('../src/classes/Booking.php');

    if (isset($_POST['start']) && isset($_POST['destination'])) {

        $start = htmlspecialchars($input['start']);
        $destination = htmlspecialchars($input['destination']);
        $userId = htmlspecialchars($input['user_id']);
        $travelId = htmlspecialchars($input['travel_id']);

        $travelSteps = getTravelSteps($travelId, $bdd);
        $travel = getTravelById($travelId, $bdd);

        if ($userId == $travel['user_id']) {
            $_SESSION['ERROR_BOOKING-TRAVEL'] = "Vous ne pouvez pas réserver sur votre propre trajet !";
            header('location: index.php?action=travel&id=' . $travelId);
            exit;
        }


        $travelListSteps = json_decode($travel['list_steps']);
        $indexStart = array_search($start, $travelListSteps);
        $indexFinish = array_search($destination, $travelListSteps);
        if ($indexStart >= $indexFinish) {
            $_SESSION['ERROR_BOOKING-TRAVEL'] = "Vous ne pouvez pas choisir une ville de départ située après votre arrivée dans le trajet";
            header('location: index.php?action=travel&id=' . $travelId);
            exit;
        }
        $bookingTravelSteps = [];
        for ($i = $indexStart; $i < $indexFinish; $i++) {
            array_push($bookingTravelSteps, $travelSteps[$i]);
        }

        foreach ($bookingTravelSteps as $key => $step) {
            if ($step['seatsOccupied'] >= $travel['seat_available']) {
                $_SESSION['ERROR_BOOKING-TRAVEL'] = "Malheureusement il n'y a plus assez de places sur ce trajet !";
                header('location: index.php?action=travel&id=' . $travelId);
                exit;
            }
        }

        $newBooking = new Booking($start, $destination, $travelId, $userId);
        $booking = addBooking($newBooking, $travelListSteps, $travelSteps, $travel, $bdd);

        $_SESSION['SUCCESS_BOOKING-TRAVEL'] = "Félicitations vous avez réservé votre place pour ce trajet !";
        header('location: index.php?action=travel&id=' . $travelId);
        exit;
    }
}
