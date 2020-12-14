<?php
session_start();
$connect = mysqli_connect('172.17.0.2', 'root', 'root', 'hackathon');

if (!$connect) {
        die('Error connect to DataBase');
}

if ($_SESSION['user']) {
    /*header('Location: /');*/
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
	<form form action="../../../vendor/signin.php" method="get" enctype="multipart/form-data">
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
			<img src="../../../assets/school_icon.jpg" alt="" class="school_icon">
		</div>
		<div class="school_name">
			<a href="../../../school/<?=$sql['2'];?>.php" style="font-size: 18px;"><?=$sql['1'];?></a>
			<p style="font-size: 12px; text-align: justify;padding-top: 5px"><?=$sql['3'];?></p>
		</div>
		</div>
		<?php 
        }
        ?>
	</div>
	<div class="profile">
		<div class="profile_block">
		<?php
        $school_select = mysqli_query($connect, "SELECT * FROM `users` WHERE `school` = 'vnosh1' AND `class` = '1' AND `class_value` = 'a'"); /*только ВНОШ 1*/

		if (mysqli_num_rows($school_select) > 0)
		{
 		$sql = mysqli_fetch_all($school_select);
        foreach ($sql as $sql) 
        {
        	$_SESSION['id'] = $sql['0'];
        ?>        
		<div class="children_block">
		<div class="children_item">
			<img src="../../../assets/myprofile.png" alt="" class="children_icon">
		</div>
		<div class="children_name">
			<a href="../../../school/user.php?id=<?=$_SESSION['id'];?>" style="font-size: 14px;"><?=$sql['1'];?> <?=$sql['2'];?> <?=$sql['3'];?></a>
			<p style="font-size: 12px; text-align: justify;padding-top: 5px"><?=$sql['7'];?></p>
			<p style="font-size: 12px; text-align: justify;padding-top: 5px">
				<?php
				if($sql['9'] ==="vnosh1")
				{
					$schoolname = "МБУ Вилюйская НОШ №1 им.Г.И.Чиряева";
				}
				if($sql['9'] ==="vsosh1")
				{
					$schoolname = "МБУ Вилюйская СОШ №1 им.Г.И.Чиряева";
				}
				if($sql['9'] ==="vsosh2")
				{
					$schoolname = "МБУ Вилюйская СОШ №2 им.Г.С.Донского";
				}
				if($sql['9'] ==="vsosh3")
				{
					$schoolname = "МБУ Вилюйская СОШ №3 им.Н.С.Степанова";
				}
				?>			
				<?=$schoolname?></p>
			<p style="font-size: 12px; text-align: justify;padding-top: 5px"><?=$sql['10'];?> "<?php
			if ($sql['11'] ==="a")
			{
				$myclass = "А";
			}
			if ($sql['11'] ==="b")
			{
				$myclass = "Б";
			}
			if ($sql['11'] ==="v")
			{
				$myclass = "В";
			}
			if ($sql['11'] ==="g")
			{
				$myclass = "Г";
			}
			?><?=$myclass?>" класс</p>
		</div>
		</div>
		<?php 
        }
    }
        ?>

		</div>
		<div class="profile_block2">
			<div class="profile_head_text"><p>Профиль</p></div>
			<div class="frame_image"><img src="../../../assets/myprofile.png" alt="" class="image_prifle"></div>
			<div><button type="submit" class="change_avatar_btn" style="background-color: #e5ebf1;color: #55677d;font-weight: normal;">Редактировать</button></div>
			<div class="myname_head_text"><p style="font-weight: bold;margin: 0px auto;">E-mail:</p></div>
			<div class="myname_head_text"><p style="font-size: 14px;margin: 5px auto;"><?=$_SESSION['user']['email']?></p></div>
			<div class="myname_head_text"><p style="font-weight: bold;margin: 15px auto;">Фамилия имя отчество:</p></div>
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