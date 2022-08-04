<?php

function displayFormSearch(){
    require('../templates/search.php');
  
}
function makeSearch($input){
    require_once('../src/pdo/pdo.php');
    require_once('../src/classes/Travel.php');
    require_once('../src/Repository/TravelRepository.php');
  
    $start = $input['start'];
    $finish = $input['finish'];
    
    $availableTravel=getAllTravel($start,$finish,$bdd);
    require('../templates/search.php');

}