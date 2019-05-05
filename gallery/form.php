<?php
	session_start();
	//
	//
	//здесь надо сделать вывод хоть одной фотографии, в заданных размерах, несмотря на то, что фото большое.
	//
	//второй шаг - собственно вывести список фото, из папки
	//
	//
	//далее разместить блок с кнопкой авторизации и формой добавления фоток
	//
	//
	//
	//самы йпродвинутый вариант - сделать именно галерею - полоса прокрутки с превью, либо плиткой ограниченное количество и
	////подгрузка аяксом
	
	///Подключение файла функций
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ГАЛЕРЕЯ</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
	
	<div>
		<h3>Галерея интересных фото</h3>
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