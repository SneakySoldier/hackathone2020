<?php

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Task.php';

session_start();
$connect = mysqli_connect('172.17.0.2', 'root', 'root', 'hackathon');

if (!$connect) {
        die('Error connect to DataBase');
}

if ($_SESSION['user']) {
    /*header('Location: /');*/
}

if (isset($_POST['title'])) {
	$title = $_POST['title'];
	$file = isset($_FILES['fileToUpload']) ? $_FILES['fileToUpload'] : null;
	$teacherId = $_GET['teacher_id'];
	$studentId = $_GET['id'];
	$subjectId = $_GET['subject_id'];
	$weekId = $_GET['week_id'];
	Task::create($title, $teacherId, $studentId, $subjectId, $weekId, $file);
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../test.css">
	<title>ЕСДЗ "Класс Клик"</title>
</head>
<body>
	<!-- <form form action="../../../vendor/profile.php" method="post" enctype="multipart/form-data"> -->
	<div class="header" style="display: flex; justify-content: space-between;">
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">Обратная связь</a>
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">ЕДИНАЯ СИСТЕМА ДОМАШНИХ ЗАДАНИЙ "КЛАСС КЛИК"</a>
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">Тел. для справок: +7 (984) 118-05-58</a>
	</div>
	<div class="osnovnoe_telo">
	<div class="schools">
	<?php
        $school_select = mysqli_query($connect, "SELECT * FROM `1class_subjects`");
        $subjects = mysqli_fetch_all($school_select, MYSQLI_ASSOC);

        foreach ($subjects as $subject) 
        {
        ?>        
		<div class="school_block">
		<div class="shool_item">
			<img src="../<?=$subject['icon'];?>" alt="" class="school_icon">
		</div>
		<div class="school_subjects">
			<a href="?<?= http_build_query(array_merge($_GET, ['subject_id' => $subject['id']])); ?>" style="font-size: 18px;"><?=$subject['subjects'];?></a>
		</div>
		</div>
		<?php 
        }
        ?>
	</div>
	<div class="b0">
		<div class="b1">
			<div class="b2">
				<img src="../assets/myprofile.png" alt="" class="image_prifle">  
			</div>
			<div class="info_profile">
				<?php 
					$id = $_GET['id'];
					$info = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
					if (mysqli_num_rows($info) > 0)
					{
							$info_sql = mysqli_fetch_assoc($info);
							$_SESSION['userinfo'] = [
					        "id" => $info_sql['id'],
					        "familiya" => $info_sql['familiya'],
					        "name" => $info_sql['name'],
					        "otchestvo" => $info_sql['otchestvo'],
					    	"data" => $info_sql['data'],
					    	"month" => $info_sql['month'],
					    	"year" => $info_sql['year'],
					    	"email" => $info_sql['email'],
					    	"password" => $info_sql['password'],
					    	"school" => $info_sql['school'],
					    	"class" => $info_sql['class'],
					    	"class_value" => $info_sql['class_value'],
    						];
					?> 
					<p class="fname"> <?=$_SESSION['userinfo']['familiya'];?> <?=$_SESSION['userinfo']['name'];?> <?=$_SESSION['userinfo']['otchestvo'];?></p>
					<p style="padding-top: 5px; font-size: 20;"><?=$_SESSION['userinfo']['email'];?></p>
					<p style="padding-top: 5px; font-size: 20;"><?=$_SESSION['userinfo']['data'];?>.<?=$_SESSION['userinfo']['month'];?>.<?=$_SESSION['userinfo']['year'];?></p>
					<?php 
						if ($_SESSION['userinfo']['class_value'] ==="a")
						{
							$myclass = "А";
						}
						if ($_SESSION['userinfo']['class_value'] ==="b")
						{
							$myclass = "Б";
						}
						if ($_SESSION['userinfo']['class_value'] ==="v")
						{
							$myclass = "В";
						}
						if ($_SESSION['userinfo']['class_value'] ==="g")
						{
							$myclass = "Г";
						}
					 ?>
					<p style="padding-top: 5px; font-size: 20;"><?=$_SESSION['cl'];?> "<?=$myclass;?>" класс</p>
					<?php 
						if($_SESSION['userinfo']['school'] ==="vnosh1")
						{
							$schoolname = "МБУ Вилюйская НОШ №1 им.Г.И.Чиряева";
						}
						if($_SESSION['userinfo']['school'] ==="vsosh1")
						{
							$schoolname = "МБУ Вилюйская СОШ №1 им.Г.И.Чиряева";
						}
						if($_SESSION['userinfo']['school'] ==="vsosh2")
						{
							$schoolname = "МБУ Вилюйская СОШ №2 им.Г.С.Донского";
						}
						if($_SESSION['userinfo']['school'] ==="vsosh3")
						{
							$schoolname = "МБУ Вилюйская СОШ №3 им.Н.С.Степанова";
						}
					 ?>
					<p style="padding-top: 5px; font-size: 20;"><?=$schoolname;?></p>
					<?php
					/*}*/
					}
				 	?>
			</div>	   
		</div>
		<div class="b3">
		<?php
        $school_select = mysqli_query($connect, "SELECT * FROM `weeks`");
		$weeks = mysqli_fetch_all($school_select, MYSQLI_ASSOC);
		foreach ($weeks as $week): ?>
			<div>
				<p><strong><?=$week['week']?></strong></p>
				<?php
				$task = Task::get($_GET['id'], $_GET['subject_id'], $week['id']);
				?>
				<p>Задача: <?=$task['title']?></p>
				<p>Файл: <?=isset($task['file_path']) ? '<a href="'.$task['file_path'].'">'.$task['file_title'].'</a>' : 'нет'?></p>
				<p>Учитель: <?=$task['teacher_name']?></p>
				<?php if (User::isAdmin($_SESSION['user']['id'])): ?>
				<form action="/school/user.php?<?= http_build_query(array_merge($_GET,['teacher_id' => $_SESSION['user']['id'], 'subject_id' => 1, 'week_id' => $week['id']])); ?>" method="post" enctype="multipart/form-data">
					Описание задачи
					<br>
					<textarea name="title" id="" cols="100" rows="10"></textarea>
					<br>
        			Выбрать файл:
					<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="hidden" name="fileToUpload">
					<input type="submit" value="Загрузить файл" name="submit">
				</form>
				<?php endif ?>
			</div>
		<?php endforeach ?>
		</div>
	</div>
	</div>
	<!-- </form> -->
</body>
</html>