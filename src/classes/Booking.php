<?php

class Booking{
    private $bookingId;
    private $cityStart;
    private $cityDestination;
    private $travelId;
    private $userId;

    public function __construct($cityStart, $cityDestination, $travelId, $userId, $bookingId = null)
    {
        $this->travelId=$travelId;
        $this->cityStart=$cityStart;
        $this->cityDestination=$cityDestination;
        $this->travelId=$travelId;
        $this->userId=$userId;
    }

    public function setBookingId($id){
        $this->bookingId = $id;
    }
    public function getBookingId(){
        return $this->bookingId;
    }
    public function getCityStart(){
        return $this->cityStart;
    }
    public function getCityDestination(){
        return $this->cityDestination;
    }
    public function getUserId(){
        return $this->userId;
    }
    public function getTravelId(){
        return $this->travelId;
    }



}
