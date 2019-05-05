<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Вход</title>
</head>
<body>
	<hl>Bxoд</hl>
	<p>Пожалуйста, войдите в систему, чтобы просмотреть страницу, к которой вы обратились.</p>

	<!-- Проверка нет ли ошибки входа -->
	<?php if(isset($loginError)): ?>
		<p><?php htmlout($loginError); ?></p>
	<?php endif; ?>

	<!-- Сама форма для ввода -->
	<form action="" method="post">
		<div>
			<label for="email">Email:<input type="text" name="email" id="email"></label>
		</div>
		<div>
			<label for="password">Пароль:<input type="password" name="password" id="password"></label>
		</div>
		<div>
			<input type="hidden" name="action" value="login">
			<input type="submit" value="Войти">
		</div>
	</form>

	<!-- возврат в админку -->
	<p><a href="/admin/">Вернуться на главную страницу</a></p>
</body>
</html>