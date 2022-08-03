<?php

require_once('../src/controllers/Homepage.php');
require_once('../src/controllers/Login.php');
require_once('../src/controllers/Signup.php');
require_once('../src/controllers/Search.php');
require_once('../src/controllers/PublishTravel.php');
require_once('../src/controllers/Logout.php');
require_once('../src/controllers/Travel.php');


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
        } elseif ($_GET['action'] === 'logout') {
            logout();
        } elseif ($_GET['action'] === 'search') {
            displayFormSearch();
            var_dump(extract($_POST));
        } elseif ($_GET['action'] === 'publish-travel') {
            displayFormPublishTravel();
        } elseif ($_GET['action'] === 'travel') {
            if (isset($_GET['id'])) {
                $id  =  $_GET['id'];
                displayTravel($id);
            } else {
                homepage();
            }
        } elseif ($_GET['action'] === 'submit-publish-travel') {
            $input = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
            }
            submitPublishTravel($input);
        } elseif ($_GET['action'] === 'submit-message') {
            $input = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
            }
            submitMessage($input);
        }
    } else {
        homepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    echo ($errorMessage);
}
?>
<script src="./assets/js/autocomplete.js"></script>