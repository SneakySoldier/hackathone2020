<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!---Форма регистрации--->
<form action="vendor/signup.php" method="post" enctype="multipart/form-data">
<div class="block_form">
    <h1 class="registration_h1">РЕГИСТРАЦИЯ</h1>
    <div>
    <input type="text" name="familiya" placeholder="Фамилия">
    </div>
    <div>
    <input type="text" name="name" placeholder="Имя">
    </div>
<div>
    <input type="text" name="otchestvo" placeholder="Отчество">
 </div>
 <div>
    <input type="text" name="login" placeholder="Логин">
    </div>
    <div>
    <input type="text" name="email" placeholder="e-mail">
    </div>
    <div>
    <input type="password" name="password" placeholder="Пароль">
    </div>
    <div>
    <input type="password" name="password_confirm" placeholder="Подтверждение пароля">
    </div>
    <div>
    <p class="select">Выберите учитель или ученик</p>
    </div>
    <div>
    <select class="selecter" name="prof_select">
        <option value="">--Учитель или ученик--</option>
        <option value="teacher">Учитель</option>
        <option value="uchenik">Ученик</option>
    </select>
    </div>
    <div>
    <button type="submit" name="insert" class="signup_btn" id="signup_btn">Зарегистрироваться</button>
    </div>
    <p>У вас уже есть аккаунта? <a HREF="index.php">авторизируйтесь</a>

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