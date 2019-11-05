<?php

session_start();
require_once('DAO.php');

$presets = $_POST;
$username = $_POST['username'];
$password = $_POST['password'];
$messages = array();
// $valid = $dao->isValidUser($username, $password);

    $valid = true;
    if(empty($username)) {
        $messages[] = "PLEASE ENTER USERNAME";
        $valid = false;
    }
    if (empty($password)) {
        $messages[] = "PLEASE ENTER A PASSWORD";
        $valid = false;
    }
    $_SESSION = array();
    if ($valid) {
        $dao = new Dao();
        $result = $dao->getUser($username, $password);

        if (!empty($result)) {
            $_SESSION['logged_in'] = true;
            header("Location: baseballhomepage.php");
            exit;
        } else {
            $valid = false;
            $messages[] = "INCORRECT USERNAME OR PASSWORD";
        }
    }
    if (!$valid) {
        $_SESSION['messages'] = $messages;
        $_SESSION['sentiment'] = 'bad';
        header("Location: loginpage.php");
        exit;
    }

