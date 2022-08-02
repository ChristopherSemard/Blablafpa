<?php

require_once('../src/classes/Travel.php');

function getAllTravel(){
    $trajetList = [new Travel('Rouen','Paris',['Dreux',]), new Travel('Lille','Rouen',['Amiens']),new Travel('Rouen','Le Mans'),new Travel('Paris','Le Mans'), new Travel('Rouen','Lille',['Amiens'])];
    return $trajetList;
}

function searchTravel($start,$finish){
    $trajetList = getAllTravel();
        $availableTravel = [];
        foreach ($trajetList as $travel) {
            foreach($travel->getSteps() as $step){
                if(($travel->getStart() == $start || $step == $start) && ($travel->getDestination() == $finish || $step == $finish)){
                    array_push($availableTravel,$travel);
                }
            }    
    }
    return $availableTravel;
}

?>