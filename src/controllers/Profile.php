<?php



function displayProfile()
{
    require_once('../src/pdo/pdo.php');
    require_once('../src/Repository/TravelRepository.php');
    require_once('../src/Repository/BookingRepository.php');

    $id = $_SESSION['LOGGED_USER']['userId'];
    $travels = getAllTravelsByUserId($id, $bdd);
    $bookings = getAllBookingsByUserId($id, $bdd);

    require('../templates/profile.php');
}
