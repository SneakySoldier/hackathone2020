<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Класс клик</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<div class="mydiv">
	<img src="assets/myprofile.png" alt="" style="width: 80px; height: 80px;">
</div>
<div class="block">
	<div class="block_row">
		<div class="block_column">
			<div class="block_item">
			<img src="assets/matematika.png" class="logo" style="display: block; margin-left: auto; margin-right: auto;">
			<button style="margin-top: 15px; width: 190px; margin: 5px;">Математика</button>
			</div>
		</div>
		
		<div class="block_column">
			<div class="block_item">
			<img src="assets/fizika.png" class="logo" style="display: block; margin-left: auto; margin-right: auto;">
			<button style="margin-top: 15px; width: 190px;margin: 5px;">Физика</button>
			</div>
		</div>
		
		<div class="block_column">
			<div class="block_item">
			<img src="assets/russkiy.png" class="logo" style="display: block; margin-left: auto; margin-right: auto;">
			<button style="margin-top: 15px; width: 190px;margin: 5px;">Русский язык</button>		
			</div>
		</div>
		
		<div class="block_column">
			<div class="block_item">
			<img src="assets/informatika.png" class="logo" style="display: block; margin-left: auto; margin-right: auto;">
			<button style="margin-top: 15px; width: 190px;margin: 5px;">Информатика</button>
			</div>
		</div>

		<div class="block_column">
			<div class="block_item">
			<img src="assets/himiya.png" class="logo" style="display: block; margin-left: auto; margin-right: auto;">
			<button style="margin-top: 15px; width: 190px;margin: 5px;">Химия</button>
			</div>
		</div>

		<div class="block_column">
			<div class="block_item">
			<img src="assets/biologiya.png" class="logo" style="display: block; margin-left: auto; margin-right: auto;">
			<button style="margin-top: 15px; width: 190px;margin: 5px;">Биология</button>
			</div>
		</div>

	</div>

</div>

<!form action="vendor/get_db.php" method="post">

<!/form>
</body>
</html>