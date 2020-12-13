<?php
    session_start();
    require_once 'connect.php';

$familiya = $_POST['familiya'];
$name = $_POST['name'];
$otchestvo = $_POST['otchestvo'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$prof_select = $_POST['prof_select'];

?>