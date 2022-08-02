<?php

require_once('../src/classes/Travel.php');
require_once('../src/classes/Step.php');

function getAllTravel(){
    $trajetList = [new Travel('Rouen','Paris',[new Step('Dreux',2),new Step('Evreux',1)]), new Travel('Lille','Rouen',[new Step('Amiens')]),new Travel('Rouen','Le Mans'),new Travel('Paris','Le Mans'), new Travel('Rouen','Lille',[new Step('Amiens')])];
    return $trajetList;
}
 
function searchTravel($start,$finish,$seat){
    $trajetList = getAllTravel();
    $availableTravel = [];
    foreach ($trajetList as $travel) {
        foreach($travel->getSteps() as $step){
            // echo('<pre>');
            // var_dump($step);
            // echo('<pre>');
            if(($travel->getStart() == $start || $step->getStepLocation() == $start)
            && ($travel->getDestination() == $finish || ($step->getStepLocation() == $finish))
            && ($travel->getMaxSeat() > $seat)
            ){
                if(!in_array($travel,$availableTravel)){
                    array_push($availableTravel,$travel);
                }
            }
        }    
    }
    return $availableTravel;
}

?>