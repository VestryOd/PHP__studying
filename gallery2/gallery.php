<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>
		Это страница Вашего профиля с сохранёнными фотографиями!
	</p>
	<br>
	<div>
		<form action="index.php" method="post" enctype="text">
			<input type="submit" name="Logout" value="logout">
		</form>
	</div>
	<div>
		<div>
			<h4>Загрузить новые фото в коллекцию:</h4>
			<form action="index.php" method="post" enctype="multipart/form-data">
				<input type="file" name="image">
				<input type="submit" name="submit" value="Загрузить">
			</form>
		</div>
</body>
</html>