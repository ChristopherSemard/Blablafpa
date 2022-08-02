<?php

require_once('../classes/Travel.php');

function getAllTravel(){
    $trajetList = [new Travel('Rouen','Paris',['Dreux']), new Travel('Lille','Rouen',['Amiens']),new Travel('Rouen','Le Mans'),new Travel('Paris','Le Mans'), new Travel('Rouen','Lille',['Amiens'])];
    return $trajetList;
}

function searchTravel(){
    $trajetList = getAllTravel();
    if(isset($_POST['start'],$_POST['finish'])&& $_POST['start'] && $_POST['finish']){
        $availableTravel = [];
        foreach ($trajetList as $travel) {
            foreach($travel->getSteps() as $step){
                if(($travel->getStart() == $_POST['start'] || $step == $_POST['start']) && $travel->getDestination() == $_POST['finish']){
                    array_push($availableTravel,$travel);
                }
            }    
        }
    }
}

?>