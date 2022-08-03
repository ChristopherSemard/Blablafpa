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
        if(isset($_POST['start'])&& isset($_POST['destination']))
        {
            var_dump($input);

        }


    }