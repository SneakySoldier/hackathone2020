<?php
session_start();
require_once 'connect.php';

$familiya = $_POST['familiya'];
$name = $_POST['name'];
$otchestvo = $_POST['otchestvo'];
$data = $_POST['data'];
$month = $_POST['month'];
$year = $_POST['year'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$school = $_POST['school_selecter'];
$class = $_POST['class'];
$class_value = $_POST['class_value'];
$accept_yes = $_POST['accept_yes'];

$button_reg = $_POST['register-btn'];

$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_login) > 0) 
{
   $_SESSION['message'] = 'Такой пользователь уже зарегистрирован!';
   header('Location: ../register.php');
} 
else
{
if ($familiya === "" || $name === "" || $otchestvo === "" || $data === "" || $month === "" || $year === "" || $email === "" || $password === "" || $password_confirm === "" || $school === "" || $class === "" || $class_value === "")
{
    $_SESSION['message'] = 'Заполните все пустые поля!';
    header('Location: ../register.php');
} else
{
if ($password === $password_confirm)
    {   
        if ($accept_yes)
        {
        $password = md5($password);
        mysqli_query ($connect, "INSERT INTO `users` (`id`, `familiya`, `name`, `otchestvo`, `data`, `month`, `year`, `email`, `password`, `school`, `class`, `class_value`) VALUES (NULL, '$familiya', '$name', '$otchestvo', '$data', '$month', '$year', '$email', '$password', '$school', '$class', '$class_value')");
        $_SESSION['message'] = 'Регистрация выполнена успешно!';
        header('Location: ../register.php');
        } 
        else 
        {
            $_SESSION['message'] = 'Подтвердите согласие на обработку ваших персональных данных!';
            header('Location: ../register.php');
        }
    } 
    else 
    {
      $_SESSION['message'] = 'Пароли не совпадают!';
      header('Location: ../register.php');
    }
}
}
?>
