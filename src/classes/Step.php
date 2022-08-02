<?php
class Step{
    //private $id;
    private $stepLocation;
    private int $order;
    //private $travel_id;
    //private $seatAvailable;
    

    public function __construct($stepLocation, int $order =1){
        //$this->travelId=$travelId;
        $this->stepLocation=$stepLocation;
        $this->order=$order;
    }

    public function getStepLocation(){
        return $this->stepLocation;
    }

    public function getStepOrder(){
        return $this->order;
    }
}