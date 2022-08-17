<?php

function displayFormLogin()
{
    require('../templates/login.php');
    unset($_SESSION['ERROR_LOGIN']);
    unset($_SESSION['ERROR_LOGIN_INPUT']);
}

function submitLogin()
{
    require_once('../src/pdo/pdo.php');
    if (isset($_POST['afpaId']) && isset($_POST['password'])) {
        $idAfpa = htmlspecialchars($_POST['afpaId']);
        $password = htmlspecialchars($_POST['password']);

        $check = $bdd->prepare('SELECT * FROM users WHERE afpa_id = ?');
        $check->execute(array($idAfpa));
        $data = $check->fetch();
        $row = $check->rowCount();

        if ($row == 1) {
            if (password_verify($password, $data['password'])) {
                $_SESSION['LOGGED_USER'] = [
                    'userId' => $data['user_id'],
                    'afpaId' => $data['afpa_id'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                ];
                header('Location: index.php');
            } else {
                $_SESSION['ERROR_LOGIN'] = 'Le pseudo et/ou le mot de passe est incorrect.';
                $_SESSION['ERROR_LOGIN_INPUT'] = $_POST;
                header('Location: ../index.php?action=login');
            }
        } else {
            $_SESSION['ERROR_LOGIN'] = 'Le pseudo renseigné n\'existe pas, veuillez créer un compte ou réessayer.';
            $_SESSION['ERROR_LOGIN_INPUT'] = $_POST;
            header('Location: index.php?action=login');
        }
    } else {
        $_SESSION['ERROR_LOGIN'] = "Un des champs n'est pas rempli.";
        $_SESSION['ERROR_LOGIN_INPUT'] = $_POST;
        header('location: index.php?action=login');
    }
}
