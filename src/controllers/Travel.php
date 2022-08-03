<?php 



function displayTravel($id)
    {
        session_start();
        require_once('../src/pdo/pdo.php');
        require_once('../src/Repository/TravelRepository.php');
        require_once('../src/Repository/UserRepository.php');
        // var_dump($id);


        $travel=getTravelById($id, $bdd);
        // var_dump($travel);
        
        $user = getUserById($travel["user_id"], $bdd);
        // var_dump($user);

        require('../templates/travel.php');
    }
