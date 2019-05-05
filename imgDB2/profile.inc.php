<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Ваш профиль</title>
</head>
<body>
	<div>
		<h1>Вы вошли как пользователь <?php echo $_COOKIE['auth']; ?></h1>
	</div>
	<form action="index.php" method="post">
		<div>
			<input type="hidden" name="action" value="logout">
			<input type="hidden" name="goto" value="index.php">
			<input type="submit" value="Выход">
		</div>
	</form>
</body>
</html>