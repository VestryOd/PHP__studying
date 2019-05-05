<?php
	header('Content-Type: text/html; charset=utf-8');
	require 'functions.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<title>Галерея</title>
</head>
<body>
	<div style="width: 1170px; margin: 20px auto; padding-left: 15px">
		<?php
		if (!isset($_COOKIE['auth'])) {
			echo '<form action="index.php" method="post">
			
			<label for="log">Логин:<input type="text" name="login" id="log"/></label>
			<label for="log">Пароль:<input type="password" name="password" id="pass"/></label>
			<input type="submit" name="submit" value="Войти"/>
		</form>';
	} else {
		echo '<div>
				<h3>Привет,'.getUser().'</h3>
			</div>
			<p>
				Это страница Вашего профиля с сохранёнными фотографиями!
			</p>
			<br>
			<div>
				<form action="index.php" method="post" enctype="text">
					<input type="submit" name="Logout" value="logout">
				</form>
			</div>
			<h4>Загрузить новые фото в коллекцию:</h4>
			<form action="index.php" method="post" enctype="multipart/form-data">
				<input type="file" name="image">
				<input type="submit" name="submit" value="Загрузить">
			</form>
		</div>';
		header('Location: .');
		exit();
	}
		?>

		<?php $flag = '';
			if (isset($_POST['submit']) && $_POST['submit'] == 'Войти'): ?>
				<div>
					<h3><?php echo checkLoginPass($_POST['login'], $_POST['password']); ?></h3>
				</div>
			<?php elseif (isset($_POST['submit']) && $_POST['submit'] == 'Загрузить' && isset($_COOKIE['auth'])):
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					$newName = 'pictures/' . basename($_FILES['image']['name']);
					$res = move_uploaded_file(
						$_FILES['image']['tmp_name'],
						$newName
					);
					$flag = fileIsCopied();
				} else $flag = fileIsNotCopied();
				header('Location: .');
				exit();
			elseif (isset($_POST['submit']) && $_POST['submit'] == 'Выйти'):
				logout();
				header('Location: .');
				exit();

			endif; ?>
		<div>
			<p>
				<?php echo $flag; ?>
			</p>
		</div>
	</div>

	<?php
		$results = listOfFiles();
		foreach ($results as $file):
	?>
		<div class="container" style="width: 1170px">
			<div class="row" style="margin: 0 15px">
				<div style="margin: 0 0">
					<img src="./pictures/<?php echo $file; ?>" style="width: 1170px; margin: 0 auto">
				</div>
			</div>
		</div><br><br>
	<?php endforeach; ?>
</body>
</html>