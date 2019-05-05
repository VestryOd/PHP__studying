<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Файлы</title>
</head>
<body>
	<div>
		<h3>Вывод списка файлов из директории</h3>
	</div>
	<div>
		<?php
		$path = (__DIR__);
		$path .= '\pictures';
		$fileslist = scandir($path, 1);
			foreach ($fileslist as $pics): 
				if(strlen($pics) > 4): ?>
					<img src="./pictures/<?php echo $pics; ?>"><br>
				<?php endif; ?>
			<?php endforeach; ?>
	</div>
	<div></div>
</body>
</html>