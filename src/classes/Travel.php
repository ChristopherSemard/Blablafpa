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

};
