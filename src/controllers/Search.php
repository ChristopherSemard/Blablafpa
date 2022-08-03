<?php

function displayFormSearch(){
    session_start();  
    require('../templates/search.php');
  
}
function makeSearch($start,$finish){
    require_once('../src/pdo/pdo.php');
    require_once('../src/classes/Travel.php');
    require_once('../src/Repository/TravelRepository.php');
  
    session_start();  
    
    $availableTravel=getAllTravel($start,$finish,$bdd);
    
    require('../templates/search.php');

}