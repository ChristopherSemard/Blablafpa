<?php
class Step{
    private $stepId;
    private $cityStart;
    private $cityFinish;
    private $travelId;
    

    public function __construct($cityStart, $cityFinish, $travelId)
    {
        $this->cityStart=$cityStart;
        $this->cityFinish=$cityFinish;
        $this->travelId=$travelId;
    }

    public function getAvailableSeat(){
        // return $this->seatAvailable;
    }
    public function getStepName(){
        return $this->cityStart . '-' . $this->cityFinish;
    }

    public function getCityStart(){
        return $this->cityStart;
    }
    public function getCityFinish(){
        return $this->cityFinish;
    }
    public function getTravelId(){
        return $this->travelId;
    }


}