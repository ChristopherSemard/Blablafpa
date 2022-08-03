
<?php



function addBooking($booking, $travelSteps, $travel, $bdd){
    require_once('../src/classes/Booking.php');





    $statement = $bdd->prepare('INSERT INTO booking (city_start, city_finish, travel_id, user_id) VALUES (:city_start, :city_finish, :travel_id, :user_id)');
    $statement->execute(  [
    'city_start' => $booking->getCityStart(),
    'city_finish' => $booking->getCityDestination(),
    'travel_id' => $booking->getTravelId(),
    'user_id' => $booking->getUserId(),
    ]);


    $lastId = $bdd->lastInsertId();
    $booking->setBookingId($lastId);

    $travelListSteps = json_decode($travel['list_steps']);

    $indexStart = array_search($booking->getCityStart(), $travelListSteps);
    $indexFinish = array_search($booking->getCityDestination(), $travelListSteps);

    for ($i = $indexStart; $i < $indexFinish; $i++) {
        addBookedStep($travelSteps[$i], $lastId, $bdd);
    }

}

function addBookedStep($step, $bookingId, $bdd){
        $statement = $bdd->prepare('INSERT INTO bookedstep (step_id, booking_id) VALUES (:step_id, :booking_id)');
        $statement->execute(  [
        'step_id' => $step['step_id'],
        'booking_id' => $bookingId,
        ]);
}


function getBookingByUserId(){
    require_once('../src/pdo/pdo.php');

    // ALLER CHERCHER TOUS LES MESSAGES CONCERNANT UN TRAJET

}


