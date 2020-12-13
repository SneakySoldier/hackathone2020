<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<form action="vendor/signin.php" method="post">
    <div class="block_form">
	<h1 class="autorization_h1">Вход в Класс Клик</h1>
    <input class="login_input" type="text" name="login" placeholder="Логин">
    <input type="password"  name="password" placeholder="Пароль">
    <div class="signup_signin">
    <button type="submit" class="signin_btn" name="in_btn">Войти</button>
    <button class="signup_btn" name="up_btn">Зарегистрироваться</button>
    </div>
    <p class="pass_recovery"><a HREF="unpassword.php"> Забыли пароль или не можете войти?</a> 
    
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg"> '. $_SESSION['message'] .' </p>';
    }
    unset($_SESSION['message']);
    ?>

    </p>
</div>
</form>
</body>
</html>