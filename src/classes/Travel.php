<?php
//require_once('../src/pdo/pdo.php');

include('Step.php');

class Travel{
    private $travelId;
    private $userId;
    private $dateStart;
    private $seatAvailable;
    private $listSteps;

    public function __construct($travelId,$userId,$dateStart,$seatAvailable,$steps=[])
    {
        $this->travelId=$travelId;
        $this->userId=$userId;
        $this->dateStart=$dateStart;
        $this->seatAvailable=$seatAvailable;
        $this->listSteps = $steps;
    }
    public function addStep($step){
        array_push($this->steps,$step);
    }

    public function getSteps(){
        return $this->listSteps;
    }
}
$travelTest = new Travel(1,1,'2022/08/01',3,[new Step('Rouen','Paris',3)]);
var_dump($travelTest->getSteps()[0]->getStep());