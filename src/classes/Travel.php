<?php
require_once('../src/pdo/pdo.php');


class Travel{
    private $travelId;
    private $userId;
    private $dateStart;
    private $seatAvailable;
    private $listSteps;

    public function __construct($travelId,$userId,$dateStart,$seatAvailable,$steps=[new Step,new Step])
    {
        $this->travelId=$travelId;
        $this->$userId=$userId;
        $this->$dateStart=$dateStart;
        $this->$seatAvailable=$seatAvailable;
        $this->$steps = $steps;
    }
    
    public function addStep($step){
        array_push($this->steps,$step);
    }

    public function getSteps(){
        return $this->steps;
    }
}
