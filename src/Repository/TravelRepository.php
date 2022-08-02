<?php



function addTravel($travel, $bdd){

    require_once('../src/classes/Travel.php');

    
    $statement = $bdd->prepare('INSERT INTO travel (start, destination, date_start, seat_available, list_steps, user_id) VALUES (:start, :destination, :date_start, :seat_available, :list_steps, :user_id)');
    $statement->execute(  [
    'start' => $travel->getStart(),
    'destination' => $travel->getDestination(),
    'date_start' => $travel->getDateStart(),
    'seat_available' => $travel->getSeatAvailable(),
    'list_steps' => json_encode($travel->getListSteps()),
    'user_id' => $travel->getUserId(),
    ]);


    $lastId = $bdd->lastInsertId();
    $travel->setTravelId($lastId);

    $travelSteps = $travel->getListSteps();
    $travelStepsToCreate = [];
    foreach ($travelSteps as $key => $city) {
        if(isset($travelSteps[$key + 1])){
            $newStep = new Step($city, $travelSteps[$key + 1], $travel->getTravelId());
            array_push($travelStepsToCreate, $newStep);
        }
    }

    addTravelSteps($travelStepsToCreate, $bdd);
}

function addTravelSteps($travelSteps, $bdd){
    foreach ($travelSteps as $key => $step) {
        $statement = $bdd->prepare('INSERT INTO travel_steps (city_start, city_finish, travel_id) VALUES (:city_start, :city_finish, :travel_id)');
        $statement->execute(  [
        'city_start' => $step->getCityStart(),
        'city_finish' => $step->getCityFinish(),
        'travel_id' => $step->getTravelId(),
        ]);

    }
}


function getTravelById($id, $bdd){

    // REQUETE SQL POUR ALLER CHERCHER LE TRAJET PAR SON ID FOURNI EN PARAMETRE

    // RETURN LE TRAVEL TROUVE
    
}