<?php 



    function displayFormBooking($id)
    {
        session_start();
        require_once('../src/pdo/pdo.php');
        require_once('../src/Repository/TravelRepository.php');

        $travel=getTravelById($id, $bdd);
        // var_dump($travel);
        

        require('../templates/booking.php');
    }


    function submitBooking($input){

        session_start();
        require_once('../src/pdo/pdo.php');
        require_once('../src/Repository/TravelRepository.php');
        require_once('../src/Repository/BookingRepository.php');
        require_once('../src/classes/Booking.php');
    
        if(isset($_POST['start'])&& isset($_POST['destination']))
        {

            $start = htmlspecialchars($input['start']);
            $destination = htmlspecialchars($input['destination']);
            $userId = htmlspecialchars($input['user_id']);
            $travelId = htmlspecialchars($input['travel_id']);
    
            $travelSteps = getTravelSteps($travelId, $bdd);
            $travel = getTravelById($travelId, $bdd);
            
            foreach ($travelSteps as $key => $step) {
                if ($step['seatsOccupied'] >= $travel['seat_available']) {
                    $_SESSION['ERROR_BOOKING-TRAVEL'] = "Malheureusement il n'y a plus assez de places sur ce trajet !";
                    header ('location: index.php?action=travel&id='.$travelId);
                    return;
                }
            }

            $newBooking = new Booking($start, $destination, $travelId, $userId);
            $booking = addBooking($newBooking, $travelSteps, $travel, $bdd);

            $_SESSION['SUCCESS_BOOKING-TRAVEL'] = "Félicitations vous avez réservé votre place pour ce trajet !";
            header ('location: index.php?action=travel&id='.$travelId);
        }


    }