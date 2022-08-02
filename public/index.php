<?php

require_once('../src/controllers/Homepage.php');
require_once('../src/controllers/Login.php');
require_once('../src/controllers/Signup.php');
require_once('../src/controllers/Search.php');
require_once('../src/controllers/PublishTravel.php');
require_once('../src/controllers/Logout.php');


try {
    if (isset($_GET['action']) && $_GET['action']){
        if ($_GET['action'] === 'login') {
            displayFormLogin();
        } elseif ($_GET['action'] === 'submitlogin') {
            $input = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
            }
            submitLogin($input); 
        } elseif ($_GET['action'] === 'signup') {
            displayFormSignup();
        }  elseif ($_GET['action'] === 'submitsignup') {
            $input = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
            }
            submitSignup($input); 
        } elseif ($_GET['action'] === 'logout') {
            //logout();
        } elseif($_GET['action']==='search'){
            makeSearch();
        }
        elseif ($_GET['action'] === 'publish-travel') {
            displayFormPublishTravel();
        } 
    } else {
        homepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    echo($errorMessage);
}
?>
<script src="./assets/js/autocomplete.js"></script>