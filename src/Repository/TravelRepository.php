<?php



function addTravel($travel, $bdd)
{
    require_once('../src/classes/Travel.php');
    $statement = $bdd->prepare('INSERT INTO travel (start, destination, date_start, seat_available, list_steps, user_id) VALUES (:start, :destination, :date_start, :seat_available, :list_steps, :user_id)');
    $statement->execute([
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
        if (isset($travelSteps[$key + 1])) {
            $newStep = new Step($city, $travelSteps[$key + 1], $travel->getTravelId());
            array_push($travelStepsToCreate, $newStep);
        }
    }
    addTravelSteps($travelStepsToCreate, $bdd);
    return $lastId;
}



function addTravelSteps($travelSteps, $bdd)
{
    foreach ($travelSteps as $key => $step) {
        $statement = $bdd->prepare('INSERT INTO travel_steps (city_start, city_finish, travel_id) VALUES (:city_start, :city_finish, :travel_id)');
        $statement->execute([
            'city_start' => $step->getCityStart(),
            'city_finish' => $step->getCityFinish(),
            'travel_id' => $step->getTravelId(),
        ]);
    }
}


function getTravelSteps($id, $bdd)
{
    $statement = $bdd->prepare('SELECT ts.step_id, ts.city_start, ts.city_finish, ts.travel_id, COUNT(bs.step_id) as seatsOccupied FROM travel_steps ts 
    LEFT JOIN bookedstep bs ON bs.step_id = ts.step_id WHERE ts.travel_id = ? GROUP BY ts.step_id');
    $statement->execute(array($id));
    $travelSteps = $statement->fetchAll();
    return $travelSteps;
}

function getAllTravel($start, $finish, $bdd)
{
    $allTravelRequest = "SELECT  * FROM travel t INNER JOIN users u ON u.user_id = t.user_id WHERE list_steps LIKE '%$start%$finish%' GROUP BY t.travel_id ORDER by t.date_start ASC";
    $allTravelStatement = $bdd->query($allTravelRequest);
    $allTravel = $allTravelStatement->fetchAll();
    return $allTravel;
}

function getTravelById($id, $bdd)
{
    $statement = $bdd->prepare('SELECT * FROM travel WHERE  travel_id = ?');
    $statement->execute(array($id));
    $travel = $statement->fetch();
    return $travel;
}


function getAllTravelsByUserId($id, $bdd)
{
    $statement = $bdd->prepare('SELECT *  FROM travel WHERE user_id = ?');
    $statement->execute(array($id));
    $travels = $statement->fetchAll();
    return $travels;
}
