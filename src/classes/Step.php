<?php
class Step{
    //private $id;
    private $locationStart;
    private $locationFinish;
    //private $travel_id;
    private $seatAvailable;
    

    public function __construct($locationStart,$locationFinish,$seatAvailable)
    {
        //$this->travelId=$travelId;
        $this->locationStart=$locationStart;
        $this->locationFinish=$locationFinish;
        $this->seatAvailable=$seatAvailable;
    }

    public function getAvailableSeat(){
        return $this->seatAvailable;
    }
    public function getStep(){
        return $this->locationStart . 'to' . $this->locationFinish;
    }
}