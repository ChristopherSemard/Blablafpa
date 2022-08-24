<?php



function addBooking($booking, $travelListSteps, $travelSteps, $travel, $bdd)
{
    require_once('../src/classes/Booking.php');

    $statement = $bdd->prepare('INSERT INTO booking (city_start, city_finish, travel_id, user_id) VALUES (:city_start, :city_finish, :travel_id, :user_id)');
    $statement->execute([
        'city_start' => $booking->getCityStart(),
        'city_finish' => $booking->getCityDestination(),
        'travel_id' => $booking->getTravelId(),
        'user_id' => $booking->getUserId(),
    ]);


    $lastId = $bdd->lastInsertId();
    $booking->setBookingId($lastId);

    $indexStart = array_search($booking->getCityStart(), $travelListSteps);
    $indexFinish = array_search($booking->getCityDestination(), $travelListSteps);
    for ($i = $indexStart; $i < $indexFinish; $i++) {
        addBookedStep($travelSteps[$i], $lastId, $bdd);
    }
}

function addBookedStep($step, $bookingId, $bdd)
{
    $statement = $bdd->prepare('INSERT INTO bookedstep (step_id, booking_id) VALUES (:step_id, :booking_id)');
    $statement->execute([
        'step_id' => $step['step_id'],
        'booking_id' => $bookingId,
    ]);
}


function getBookingByUserId()
{
    require_once('../src/pdo/pdo.php');

    // ALLER CHERCHER TOUS LES MESSAGES CONCERNANT UN TRAJET

}



function getBookedUsers($id, $bdd)
{
    require_once('../src/pdo/pdo.php');

    $statement = $bdd->prepare('SELECT *  FROM booking b INNER JOIN users AS u on u.user_id = b.user_id  WHERE travel_id = ? GROUP BY b.booking_id');
    $statement->execute(array($id));
    $bookedUsers = $statement->fetchAll();
    return $bookedUsers;

    // REQUETE SQL POUR ALLER CHERCHER LE TRAJET PAR SON ID FOURNI EN PARAMETRE
    // RETURN LE TRAVEL TROUVE

}


function getAllBookingsByUserId($id, $bdd)
{
    $statement = $bdd->prepare('SELECT *  FROM booking b INNER JOIN travel AS t on t.travel_id = b.travel_id  WHERE b.user_id = ? GROUP BY b.booking_id');
    $statement->execute(array($id));
    $bookings = $statement->fetchAll();
    return $bookings;
}
