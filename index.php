<?php
session_start();

if ($_SESSION['user']) {
    /*header('Location: suite.php');*/
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="test.css">
	<title>Вход в ЕСДЗ "Класс Клик"</title>
</head>
<body>
	<form form action="vendor/signin.php" method="post" enctype="multipart/form-data">
	<div class="header" style="display: flex; justify-content: space-between;">
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">Обратная связь</a>
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">Тел. для справок: +7 (984) 118-05-58</a>
	</div>

	</div>
		<div class="block_login">
		<img src="assets/logo2.png" style="width: 80px;height: 80px;">
		<p style="font-weight: bold; color: #3e3ef8; text-transform: uppercase;"> Единая система домашних заданий</p>
		<p style="font-weight: bold; margin-top: 35px"> Вход в ЕСДЗ "Класс Клик"</p>
		<div>

		<div>
			<input type="email" name="email" placeholder="E-mail" style="width: 190px;">
		</div>
		<div>
			<input type="password" name="password" placeholder="Пароль" style="width: 190px;">
		</div>

		<div style="text-align: left;">
			<input type="checkbox" name=""> Запомнить меня
		</div>
		<div class="button_block">
		<div class="buttons_div" style="display: flex;justify-content: center;">
			<button type="submit" name="login-btn" style="background: #3e3ef8;">Войти</button>
			<button type="submit" name="register-btn" style="width: 150px;">Регистрация</button>
		</div>
		<div>
			<p>Забыли пароль? <a href="#" style="font-weight: bold; color: #3e3ef8;">Восстановить.</a></p>
		</div>
        <div style="padding-top: 15px;">
            <?php 
            if ($_SESSION['message']){
                echo '<p class="message">'.$_SESSION['message'].'</p>';
            } 
                unset($_SESSION['message']);
            ?>
        </div>
		</div>
	</div>
	</form>
</body>
</html>