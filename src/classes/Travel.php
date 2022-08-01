<?php
require_once('../src/pdo/pdo.php');


class Travel{
    private $travelId;
    private $userId;
    private $dateStart;
    private $seatAvailable;
    private $steps;

    public function __construct($travelId,$userId,$dateStart,$seatAvailable,$steps=[])
    {
        $this->travelId=$travelId;
        $this->$userId=$userId;
        $this->$dateStart=$dateStart;
        $this->$seatAvailable=$seatAvailable;
        $this->$steps = $steps;
    }

    public function getAvailableSeat(){
        return 5;
    }
    public function booking($seat){
        if($this->getAvailableSeat() < $seat) {
            return false;
        }
        return true;
    }
    
    public function addStep($step){
        array_push($this->steps,$step);
    }

    public function getSteps(){
        return $this->steps;
    }
}
