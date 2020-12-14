<?php
    session_start();

$connect = mysqli_connect('172.17.0.2', 'root', 'root', 'hackathon');

    if (!$connect) {
        die('Error connect to DataBase');
    }
    if ($_SESSION['user']) {
        /*header('Location: suite.php');*/
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="test.css">
	<title>Регистрация в ЕСДЗ "Класс Клик"</title>
</head>
<body>
	<form action="vendor/signup.php" method="post" enctype="multipart/form-data">
	<div class="header" style="display: flex; justify-content: space-between;">
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">Обратная связь</a>
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">Тел. для справок: +7 (984) 118-05-58</a>
	</div>
	<div class="block_register">
		<img src="assets/logo2.png" style="width: 80px;height: 80px; margin: 0 auto;">
		<p style="font-weight: bold; color: #3e3ef8; text-transform: uppercase;"> Единая система домашних заданий</p>
		<p style="font-weight: bold; margin-top: 20px;margin-bottom: 3px;"> Регистрация в ЕСДЗ <br/>"Класс Клик"</p>
		<div>
		<input type="text" name="familiya" placeholder="Фамилия" style="width: 220px;">
		</div>
		<div>
		<input type="text" name="name" placeholder="Имя" style="width: 220px;">
		</div>
		<div>
		<input type="text" name="otchestvo" placeholder="Отчество" style="width: 220px;">
		</div>
		<div class="birthday">
			<p style="margin-top: 5px">Дата рождения</p>
			<div style="margin-top: 10px">
			<input type="number" name="data" min="1" max="31" placeholder="Ч" style="width: 62px; margin: 0px; text-align: center;">
			<input type="number" name="month" min="1" max="12" placeholder="М" style="width: 62px; margin: 0px; text-align: center;">
			<input type="number" name="year" min="2000" max="2020" placeholder="Г" style="width: 90px; margin: 0px; text-align: center;">
			</div>
		</div>
        <select name="school_selecter" class="shool_select" style="margin-top: 15px; padding: 5px 16px 5px;">
        <option value="">--Выберите школу--</option>
        <?php
        $school_select = mysqli_query($connect, "SELECT * FROM `school`");
        $sql = mysqli_fetch_all($school_select);

        foreach ($sql as $sql) 
        {
        ?>        
            <option value='<?=$sql[2];?>'><?=$sql['1'];?></option>            
        <?php 
        }
        ?>
        </select>
		<div>
		<input type="number" name="class" min="1" max="11" placeholder="Класс" style="width: 220px;">
		</div>
		<div>
		<input type="radio" checked name="class_value" value="a"> "А"
		<input type="radio" name="class_value" value="b"> "Б"
		<input type="radio" name="class_value" value="v"> "В"
		<input type="radio" name="class_value" value="g"> "Г"
		</div>

		<div>
			<input type="email" name="email" placeholder="E-mail" style="width: 220px;">
		</div>
		<div>
			<input type="password" name="password" placeholder="Пароль" style="width: 220px;">
		</div>
		<div>
			<input type="password" name="password_confirm" placeholder="Подтверждение пароля" style="width: 220px;">
		</div>
		<div>
			<input type="checkbox" name="accept_yes" style="">Я подтверждаю свое согласие на обработку вносимых <br/> в форму моих персональных данных.
		</div>
		<div class="button_block">
		<div class="buttons_div">
			<button type="submit" class="register-btn">Зарегистрироваться</button>
		</div>
		<div style="margin-bottom: 10px;">
			<p>У меня уже есть аккаунт. <a href="index.php" style="font-weight: bold; color: #3e3ef8;">Войти</a></p>
		</div>
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
	</form>
</body>
</html>