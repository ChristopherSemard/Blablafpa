<?php

require_once('../src/Repository/travelsRepository.php');

function displayFormSearch(){
    session_start();  
    require('../templates/search.php');
  
}
function makeSearch(){
  
    session_start();  
    
    if(isset($_POST['start'],$_POST['finish'])&& $_POST['start'] && $_POST['finish']){
        $availableTravel = searchTravel($_POST['start'],$_POST['finish']);
    }

    require('../templates/search.php');
}