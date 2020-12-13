<?php
session_start();
require_once 'connect.php';

$email = $_POST['email'];
$password = md5($_POST['password']);
$button_reg = $_POST['register-btn'];
$button_login = $_POST['login-btn'];
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

if (isset($button_reg))
    {   
        header('Location: ../register.php');
    }

if (isset($button_login))
    {       
    $check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
	if (mysqli_num_rows($check_login) > 0) 
	{
		$user = mysqli_fetch_assoc($check_login);		
		 $_SESSION['user'] = [
        "id" => $user['id'],
        "familiya" => $user['familiya'],
        "name" => $user['name'],
        "otchestvo" => $user['otchestvo'],
    	"data" => $user['data'],
    	"month" => $user['month'],
    	"year" => $user['year'],
    	"email" => $user['email'],
    	"password" => $user['password'],
    	"school" => $user['school'],
    	"class" => $user['class'],
    	"class_value" => $user['class_value'],
    	];
	   		header('Location: ../suite.php');
	   		exit;
	} 
	else
	{
		    $_SESSION['message'] = 'Не верный логин или пароль!';
    		header('Location: ../index.php');
    		exit;
	}
 }

 if (isset($_POST['1class_btn']))
	{
		if ($_POST['1myclass'] === "a_class")
		{
			header('Location: ../school/vnosh_1/1_class/a.php');
		}
		if ($_POST['1myclass'] === "b_class")
		{
			header('Location: ../school/vnosh_1/1_class/b.php');
		}
		if ($_POST['1myclass'] === "c_class")
		{
			header('Location: ../school/vnosh_1/1_class/v.php');
		}
		if ($_POST['1myclass'] === "d_class")
		{
			header('Location: ../school/vnosh_1/1_class/g.php');
		}
	} 

 if (isset($_POST['2class_btn']))
	{
		if ($_POST['2myclass'] === "a_class")
		{
			header('Location: ../school/vnosh_1/2_class/a.php');
		}
		if ($_POST['2myclass'] === "b_class")
		{
			header('Location: ../school/vnosh_1/2_class/b.php');
		}
		if ($_POST['2myclass'] === "c_class")
		{
			header('Location: ../school/vnosh_1/2_class/v.php');
		}
		if ($_POST['2myclass'] === "d_class")
		{
			header('Location: ../school/vnosh_1/2_class/g.php');
		}
	} 
 if (isset($_POST['3class_btn']))
	{
		if ($_POST['3myclass'] === "a_class")
		{
			header('Location: ../school/vnosh_1/3_class/a.php');
		}
		if ($_POST['3myclass'] === "b_class")
		{
			header('Location: ../school/vnosh_1/3_class/b.php');
		}
		if ($_POST['3myclass'] === "c_class")
		{
			header('Location: ../school/vnosh_1/3_class/v.php');
		}
		if ($_POST['3myclass'] === "d_class")
		{
			header('Location: ../school/vnosh_1/3_class/g.php');
		}
	} 
if (isset($_POST['4class_btn']))
	{
		if ($_POST['4myclass'] === "a_class")
		{
			header('Location: ../school/vnosh_1/4_class/a.php');
		}
		if ($_POST['4myclass'] === "b_class")
		{
			header('Location: ../school/vnosh_1/4_class/b.php');
		}
		if ($_POST['4myclass'] === "c_class")
		{
			header('Location: ../school/vnosh_1/4_class/v.php');
		}
		if ($_POST['4myclass'] === "d_class")
		{
			header('Location: ../school/vnosh_1/4_class/g.php');
		}
	} 
?>
