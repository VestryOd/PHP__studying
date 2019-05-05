<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Профиль</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
	<!--Блок авторизации  -->
	<div>
		<h3>Привет, <?php echo $_SESSION['login']; ?></h3>
	</div>
		<p>
			Это страница Вашего профиля с сохранёнными фотографиями!
		</p>
		<a href="/logout.php">Выход</a>
	<div>
	<div>
		<h4>Загрузить новые фото в коллекцию:</h4>
		<form action="index.php" method="post" enctype="multipart/form-data">
			<input type="file" name="myfile">
			<input type="submit" name="Загрузить">
		</form>
	</div>
		<?php if($_SESSION['upload_error']): ?>
			<p><?php echo $_SESSION['upload_error']; ?></p>
		<?php endif; ?>
	</div>
	<?php
		$results = array();
		$results = $_SESSION['pictures'];
		foreach ($results as $result):
	?>
	<div class="container">
		<div class="row">
			<div>
				<img src="./pictures/<?php echo $result; ?>" alt="<?php echo $result; ?>" style="width: 800px">
			</div>
		</div>
	</div><br><br>
	<?php endforeach; ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>