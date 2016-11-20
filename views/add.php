<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

<form action="/add.php" method="post" enctype="multipart/form-data">
	<label for="title">Название:</label> <input type="text" name="title" id="title" />
	<label for="image">Файл:</label> <input type="file" name="image" id="image" />
	<input type="submit">
</form>

<a href="/">На главную</a>
</body>
</html>