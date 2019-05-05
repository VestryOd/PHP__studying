<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
</head>
<body>
	<p>
		<?php
			if(!empty($_SESSION['error']))
			{
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
		?>
	</p>
	<form action="/login.php" method="post">
		
		<label for="log">Логин:<input type="text" name="login" id="log"/></label>
		<label for="log">Пароль:<input type="password" name="password" id="pass"/></label>
		<input type="submit" />
	</form>
</body>
</html>