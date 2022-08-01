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

    public function getAvaillableSeat(){
         
    }
}
