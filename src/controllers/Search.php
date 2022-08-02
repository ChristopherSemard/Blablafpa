<?php

require_once('../src/Repository/travelsRepository.php');

function displayFormSearch(){
    session_start();  
    require('../templates/search.php');
  
}
function makeSearch(){
  
    session_start();  
    
    if(isset($_POST['start'],$_POST['finish'],$_POST['seat'])&& $_POST['start'] && $_POST['finish'] && $_POST['seat']){
        $availableTravel = searchTravel($_POST['start'],$_POST['finish'],$_POST['seat']);
    }

    require('../templates/search.php');
}