<?php

require_once('../src/controllers/Homepage.php');
require_once('../src/controllers/Login.php');
require_once('../src/controllers/Signup.php');


try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
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
        } 
    } else {
        homepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    echo($errorMessage);
}