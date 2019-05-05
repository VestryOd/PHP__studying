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
		<div>
			<h3>Привет, <?php if(isset($_COOKIE['auth'])) {
				echo $_COOKIE['auth'] . '!';
				} else echo 'Гость!'; ?></h3>
		</div>
		<form action="index.php" method="post">
			
			<label for="log">Логин:<input type="text" name="login" id="log"/></label>
			<label for="log">Пароль:<input type="password" name="password" id="pass"/></label>
			<input type="submit" name="submit" value="Войти"/>
		</form>

</body>
</html>