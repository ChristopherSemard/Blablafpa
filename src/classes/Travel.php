<?php
//require_once('../src/pdo/pdo.php');

include('Step.php');

class Travel
{
    private $start;
    private $destination;
    private $steps = [];

    function __construct($start,$destination,$steps=[])
    {
        $this->start = $start;
        $this->destination =$destination;
        $this->steps = $steps;
        
    }
    public function getStart(){
        return $this->start;
    }
    public function getDestination(){
        return $this->destination;
    }
    public function getSteps(){
        return $this->steps;
    }
    public function listStep(){
        $listStep = [];
        foreach ($this->steps as $step) {
            $order = $step->getStepOrder();
            $stepLocation = $step->getStepLocation();
            foreach($step as $order => $stepLocation){
                array_push($listStep,$step);
            }
        }
        return $listStep;
    }

};


// $trajetList = [new Travel('Rouen','Paris',[new Step('Dreux',2),new Step('Evreux',1)]), new Travel('Lille','Rouen',[new Step('Amiens')]),new Travel('Rouen','Le Mans'),new Travel('Paris','Le Mans'), new Travel('Rouen','Lille',[new Step('Amiens')])];
// $trajetTest = new Travel('Rouen','Paris',[new Step('Dreux',2),new Step('Evreux',1)]);
// var_dump($trajetTest->listStep());