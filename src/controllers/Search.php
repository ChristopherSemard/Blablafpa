<?php

require_once('../models/search.php');

function displayFormSearch(){

    session_start();
        
    require('../templates/search.php');
}

