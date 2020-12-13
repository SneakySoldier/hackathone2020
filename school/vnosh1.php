<?php
session_start();
require_once '../vendor/connect.php';
$connect = mysqli_connect('172.17.0.3', 'root', 'root', 'hackathon');
if (!$connect) {
        die('Error connect to DataBase');
}
if ($_SESSION['user']) { 
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../test.css">
	<title>ЕСДЗ "Класс Клик"</title>
</head>
<body>
	<form action="../vendor/signin.php" method="post" enctype="multipart/form-data">
	<div class="header" style="display: flex; justify-content: space-between;">
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">Обратная связь</a>
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">ЕДИНАЯ СИСТЕМА ДОМАШНИХ ЗАДАНИЙ "КЛАСС КЛИК"</a>
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">Тел. для справок: +7 (984) 118-05-58</a>
	</div>
	<div class="osnovnoe_telo">
	<div class="schools">
	<?php
        $school_select = mysqli_query($connect, "SELECT * FROM `school`");
        $sql = mysqli_fetch_all($school_select);
        foreach ($sql as $sql) 
        {
        ?>        
		<div class="school_block">
		<div class="shool_item">
			<img src="../assets/school_icon.jpg" alt="" class="school_icon">
		</div>
		<div class="school_name">
			<a href="../school/<?=$sql['2'];?>.php" style="font-size: 18px;"><?=$sql['1'];?></a>
			<p style="font-size: 12px; text-align: justify;padding-top: 5px"><?=$sql['3'];?></p>
		</div>
		</div>
		<?php 
        }
        ?>
	</div>
	<div class="profile">
		<div class="profile_block">
		<div class="class_block">
			<div class="class_item">
				<img src="../assets/myclass.jpg" alt="" class="class_icon">
			</div>
			<div class="class_name">
				<p style="font-size: 14px; font-weight: bold;">1 КЛАССЫ</p>
				<div class="class_value" style="display: flex; width: 500px;height: 60px; border: 0px solid black;">
				<p style="margin: auto 0;font-weight: bold;"><input type="radio" name="1myclass" value="a_class" style="margin: auto;"> "А"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="1myclass" value="b_class" style="margin: auto;"> "Б"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="1myclass" value="c_class" style="margin: auto;"> "В"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="1myclass" value="d_class" style="margin: auto;"> "Г"</p>
				<button type="submit" name="1class_btn" style="margin-top: auto; margin-left: 150px; border-radius: 100px; padding: 10px;background: #4a76a8">. . .</button>
            </div>
			</div>
		</div>
		<div class="class_block">
			<div class="class_item">
				<img src="../assets/myclass.jpg" alt="" class="class_icon">
			</div>
			<div class="class_name">
				<p style="font-size: 14px; font-weight: bold;">2 КЛАССЫ</p>
				<div class="class_value" style="display: flex; width: 500px;height: 60px; border: 0px solid black;">
				<p style="margin: auto 0;font-weight: bold;"><input type="radio" name="2myclass" value="a_class" style="margin: auto;"> "А"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="2myclass" value="b_class" style="margin: auto;"> "Б"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="2myclass" value="c_class" style="margin: auto;"> "В"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="2myclass" value="d_class" style="margin: auto;"> "Г"</p>
				<button type="submit" name="2class_btn" style="margin-top: auto; margin-left: 150px; border-radius: 100px; padding: 10px;background: #4a76a8">. . .</button>
            </div>
			</div>
		</div>
		<div class="class_block">
			<div class="class_item">
				<img src="../assets/myclass.jpg" alt="" class="class_icon">
			</div>
			<div class="class_name">
				<p style="font-size: 14px; font-weight: bold;">3 КЛАССЫ</p>
				<div class="class_value" style="display: flex; width: 500px;height: 60px; border: 0px solid black;">
				<p style="margin: auto 0;font-weight: bold;"><input type="radio" name="3myclass" value="a_class" style="margin: auto;"> "А"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="3myclass" value="b_class" style="margin: auto;"> "Б"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="3myclass" value="c_class" style="margin: auto;"> "В"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="3myclass" value="d_class" style="margin: auto;"> "Г"</p>
				<button type="submit" name="3class_btn" style="margin-top: auto; margin-left: 150px; border-radius: 100px; padding: 10px;background: #4a76a8">. . .</button>
            </div>
			</div>
		</div>
				<div class="class_block">
			<div class="class_item">
				<img src="../assets/myclass.jpg" alt="" class="class_icon">
			</div>
			<div class="class_name">
				<p style="font-size: 14px; font-weight: bold;">4 КЛАССЫ</p>
				<div class="class_value" style="display: flex; width: 500px;height: 60px; border: 0px solid black;">
				<p style="margin: auto 0;font-weight: bold;"><input type="radio" name="4myclass" value="a_class" style="margin: auto;"> "А"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="4myclass" value="b_class" style="margin: auto;"> "Б"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="4myclass" value="c_class" style="margin: auto;"> "В"</p>
				<p style="margin: auto 10px;font-weight: bold;"><input type="radio" name="4myclass" value="d_class" style="margin: auto;"> "Г"</p>
				<button type="submit" name="4class_btn" style="margin-top: auto; margin-left: 150px; border-radius: 100px; padding: 10px;background: #4a76a8">. . .</button>
            </div>
			</div>
		</div>
		</div>
		<div class="profile_block2">
			<div class="profile_head_text"><p>Профиль</p></div>
			<div class="frame_image"><img src="../assets/myprofile.png" alt="" class="image_prifle"></div>
			<div><button type="submit" class="change_avatar_btn" style="background-color: #e5ebf1;color: #55677d;font-weight: normal;">Редактировать</button></div>
			<div class="myname_head_text"><p style="font-weight: bold;margin: 0px auto;">E-mail:</p></div>
			<div class="myname_head_text"><p style="font-size: 14px;margin: 5px auto;"><?=$_SESSION['user']['email']?></p></div>
			<div class="myname_head_text"><p style="font-weight: bold;margin: 15px auto;">Фамилия имя отчество:</p>
			</div>
			<div class="myname_head_text"><p style="font-size: 14px;margin: 5px auto;">
				<?=$_SESSION['user']['familiya']?>
				<?=$_SESSION['user']['name']?>
				<?=$_SESSION['user']['otchestvo']?>
				</p></div>
			<div class="myname_head_text"><p style="font-weight: bold;margin: 15px auto;">Дата рождения:</p></div>
			<div class="myname_head_text"><p style="font-size: 14px;margin: 5px auto;">
			<?=$_SESSION['user']['data']?>.
			<?=$_SESSION['user']['month']?>
			<?=$_SESSION['user']['year']?>
			</p></div>
	</div>
	</div>
	</div>
	</form>
</body>
</html>
