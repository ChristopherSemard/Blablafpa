<?php
//require_once('../src/pdo/pdo.php');

include('Step.php');

class Travel{
    private $travelId;
    private $start;
    private $destination;
    private $userId;
    private $dateStart;
    private $seatAvailable;
    private $ListSteps = [];

    public function __construct($start, $destination, $userId, $dateStart, $seatAvailable, $steps=[], $travelId = null)
    {
        $this->travelId=$travelId;
        $this->start=$start;
        $this->destination=$destination;
        $this->userId=$userId;
        $this->dateStart=$dateStart;
        $this->seatAvailable=$seatAvailable;
        $this->start=$start;
        $this->destination=$destination;
        foreach ($steps as $key => $step) {
            $this->addToListSteps($step);
        }
    }

    public function setTravelId($id){
        $this->travelId = $id;
    }
    public function getTravelId(){
        return $this->travelId;
    }
    public function getStart(){
        return $this->start;
    }
    public function getDestination(){
        return $this->destination;
    }
    public function getUserId(){
        return $this->userId;
    }
    public function getDateStart(){
        return $this->dateStart;
    }
    public function getSeatAvailable(){
        return $this->seatAvailable;
    }

    public function addToListSteps($step){
        array_push($this->ListSteps, $step);
    }
    public function getListSteps(){
        $arr = $this->ListSteps;
        array_unshift($arr,$this->start);
        array_push($arr,$this->destination);
        return $arr;
    }

}
