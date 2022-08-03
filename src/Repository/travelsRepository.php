<?php

require_once('../src/classes/Travel.php');
require_once('../src/classes/Step.php');

function getAllTravel(){
    // $trajetList = [new Travel('Rouen','Paris',[new Step('Dreux',2),new Step('Evreux',1)]), new Travel('Lille','Rouen',[new Step('Amiens')]),new Travel('Rouen','Le Mans'),new Travel('Paris','Le Mans'), new Travel('Rouen','Lille',[new Step('Amiens')])];
    $trajetList = [new Travel('Rouen','Paris',1,new DateTime(),3,['Dreux','Evreux'],1), new Travel('Lille','Rouen',2,new DateTime(),3,['Amiens'],2),new Travel('Rouen','Le Mans',3,new DateTime(),2,[],3),new Travel('Paris','Le Mans',4,new DateTime(),2,[],4), new Travel('Rouen','Lille',5,new DateTime(),3,['Amiens','St-Quentin'],5)];
    return $trajetList;
}
 
function searchTravel($start,$finish,$seat){
    $trajetList = getAllTravel();
    $availableTravel = [];
    foreach ($trajetList as $travel) {
        foreach($travel->getListSteps() as $step){
            $indeOfStep = array_search($step,$travel->getListSteps());
            // echo('<pre>');
            // var_dump($indeOfStep);
            // echo('<pre>');
            if(
                ($travel->getStart() == $start || $step == $start
                || ($indeOfStep>1 && $indeOfStep<(count($travel->getListSteps())-2)))
                && ($travel->getDestination() == $finish || ($step == $finish))
                && ($travel->getSeatAvailable() > $seat)
            ){
                echo('<pre>');
                var_dump($indeOfStep);
                echo('<pre>');
                if(!in_array($travel,$availableTravel)){
                    array_push($availableTravel,$travel);
                }
            }
        }   
    }
    return $availableTravel;
}

?>