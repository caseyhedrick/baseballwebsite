<?php

session_start();
//require_once 'KLogger.php';
//$logger = new KLogger ("log.txt", K
//Logger::WARN);
require_once ('DAO.php');
$dao = new Dao();
$presets = $_POST;

$username = $_POST['username'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$valid=true;
$messages=array();

if(empty($username)) {
    $messages[] = "PLEASE ENTER USERNAME";
    $valid = false;
    echo 'empty username';
}
if(empty($first_name)){
    $messages[]= "PLEASE ENTER A FIRST NAME";
    $valid=false;
}
if(empty($last_name)){
    $messages[]= "PLEASE ENTER A LAST NAME";
    $valid=false;
}
if(empty($email)){
    $messages[]= "PLEASE ENTER AN E-MAIL ADDRESS";
    $valid=false;
} else if(1!=preg_match('/\w+@\w+\.[a-zA-Z]{2,4}/', $email)){
    $messages[]= "E-MAIL ADDRESS INVALID. PLEASE ENTER A VALID E-MAIL";
    $valid=false;
}
if(empty($password)){
    $messages[]= "PLEASE ENTER A PASSWORD";
    $valid=false;
}
if($valid) {
    $dao = new Dao();
    $user = $dao->getUser($username, $password);
    if(empty($user)){
        $dao->addUser($first_name, $last_name, $email, $username, $password);
        $messages[]="SUCCESSFULLY REGISTERED!";
        $_SESSION['messages'] = $messages;
        header("Location: baseballhomepage.php");
        exit;
    }else {
        $valid=false;
        $messages[] = "USER ALREADY EXIST";
    }
}

if(!$valid) {
    echo 'NOT VALID';
    $_SESSION['messages'] = $messages;
    $_SESSION['sentiment'] = 'bad';
    header("Location: register.php");
    exit;
}
