<?php
session_start();
$email = $_SESSION['loggedInUser']['email'];
require '../config/function.php';
require"../config/log.php";
$activityLog->setAction($_SESSION['loggedInUser']['id'], "Logged out $email");

if (isset($_SESSION['logged'])) {
    logoutSession();
    redirect('index.php','Logged Out Successfully.');
}