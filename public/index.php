<?php

session_start();
require_once('../src/controllers/Homepage.php');
require_once('../src/controllers/Login.php');
require_once('../src/controllers/Signup.php');
require_once('../src/controllers/Search.php');
require_once('../src/controllers/PublishTravel.php');
require_once('../src/controllers/Logout.php');
require_once('../src/controllers/Travel.php');
require_once('../src/controllers/Booking.php');
require_once('../src/controllers/Profile.php');


try {
    if (isset($_GET['action']) && $_GET['action']) {
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
        } elseif ($_GET['action'] === 'submitsignup') {
            $input = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
            }
            submitSignup($input);
        } elseif ($_GET['action'] === 'logout' && isset($_SESSION['LOGGED_USER'])) {
            logout();
        } elseif ($_GET['action'] === 'search') {
            $input = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
            }
            makeSearch($input);
        } elseif ($_GET['action'] === 'publish-travel' && isset($_SESSION['LOGGED_USER'])) {
            displayFormPublishTravel();
        } elseif ($_GET['action'] === 'travel') {
            if (isset($_GET['id'])) {
                $id  =  $_GET['id'];
                displayTravel($id);
            } else {
                homepage();
            }
        } elseif ($_GET['action'] === 'booking'  && isset($_SESSION['LOGGED_USER'])) {
            if (isset($_GET['id'])) {
                $id  =  $_GET['id'];
                displayFormBooking($id);
            } else {
                homepage();
            }
        } elseif ($_GET['action'] === 'submit-booking'  && isset($_SESSION['LOGGED_USER'])) {
            $input = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
            }
            submitBooking($input);
        } elseif ($_GET['action'] === 'submit-publish-travel'  && isset($_SESSION['LOGGED_USER'])) {
            $input = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
            }
            submitPublishTravel($input);
        } elseif ($_GET['action'] === 'submit-message'  && isset($_SESSION['LOGGED_USER'])) {
            $input = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
            }
            submitMessage($input);
        } elseif ($_GET['action'] === 'profile') {
            displayProfile();
        } else {
            header('Location: index.php');
        }
    } else {
        homepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    echo ($errorMessage);
}
