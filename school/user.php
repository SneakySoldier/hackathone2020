<?php
session_start();
$connect = mysqli_connect('localhost', 'root', 'root', 'hackathon');

if (!$connect) {
        die('Error connect to DataBase');
}

if ($_SESSION['user']) {
    /*header('Location: /');*/
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../test.css">
	<title>ЕСДЗ "Класс Клик"</title>
</head>
<body>
	<form form action="../../../vendor/profile.php" method="post" enctype="multipart/form-data">
	<div class="header" style="display: flex; justify-content: space-between;">
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">Обратная связь</a>
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">ЕДИНАЯ СИСТЕМА ДОМАШНИХ ЗАДАНИЙ "КЛАСС КЛИК"</a>
		<a href="#" style="font-weight: bold;color: #fff; margin: auto;">Тел. для справок: +7 (984) 118-05-58</a>
	</div>
	<div class="osnovnoe_telo">
	<div class="schools">
	<?php
        $school_select = mysqli_query($connect, "SELECT * FROM `1class_subjects`");
        $sql = mysqli_fetch_all($school_select);

        foreach ($sql as $sql) 
        {
        ?>        
		<div class="school_block">
		<div class="shool_item">
			<img src="../<?=$sql['3'];?>" alt="" class="school_icon">
		</div>
		<div class="school_subjects">
			<a href="?<?= http_build_query(array_merge($_GET,['subject' => $sql['1']])); ?>" style="font-size: 18px;"><?=$sql['1'];?></a>
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
        $sql = mysqli_fetch_all($school_select);
        foreach ($sql as $sql) 
        {
        ?>        
		<div class="b3_block">
		<div class="block_weeks">
			<a href="?<?= http_build_query(array_merge($_GET,['week' => $sql['1']])); ?>" style="font-size: 18px;"><?=$sql['1'];?></a>
				</div>
				<?php
		        $school_select2 = mysqli_query($connect, "SELECT * FROM `days`");
		        $sql2 = mysqli_fetch_all($school_select2);
		        foreach ($sql2 as $sql2) 
		        {
		        	?>

		<?php } ?>
		</div>
		<?php 
        }
        ?>
		</div>
	</div>
	</div>
	</form>
</body>
</html>