<?php

function displayFormSearch()
{
    require('../templates/search.php');
}
function makeSearch($input)
{
    require_once('../src/pdo/pdo.php');
    require_once('../src/classes/Travel.php');
    require_once('../src/Repository/TravelRepository.php');

    if (isset($input['start'])) {
        $start = $input['start'];
    }
    if (isset($input['finish'])) {
        $finish = $input['finish'];
    }
    $availableTravel = [];
    if (isset($start) && isset($finish)) {
        $availableTravel = getAllTravel($start, $finish, $bdd);
    }
    require('../templates/search.php');
}
