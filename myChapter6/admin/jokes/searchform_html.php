<?php include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/helpers_inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Управление шутками</title>
</head>
<body>
	<h1>Управление шутками</h1>
	<p><a href="?add">Добавить новую шутку</a></p>
	<form action="" method="get">
		<p>Вывести шутку, которая удовлетворяет следующим критериям</p>
		<!--выбор вывода списка по автору -->
		<div>
			<label for="author">По автору:</label>
			<select name="author" id="author">
				<option value="">Любой автор</option>
					<?php foreach ($authors as $author): ?>
						<option value="<?php htmlout($author['id']); ?>"><?php htmlout($author['name']); ?></option>
					<?php endforeach; ?>
			</select>
		</div>
		<!--выбор вывода списка по категории -->
		<div>
			<label for="category">По категории:</label>
			<select name="category" id="category">
				<option value="">Любая категория</option>
					<?php foreach ($categories as $category): ?>
						<option value="<?php htmlout($category['id']); ?>"><?php htmlout($category['name']); ?></option>
					<?php endforeach; ?>
			</select>
		</div>
		<div>
			<label for="text">Содержит текст</label>
			<input type="text" name="text" id="text">
		</div>
		<div>
			<input type="hidden" name="action" value="search">
			<input type="submit" value="Искать">
		</div>
	</form>
	<p><a href="..">Вернуться на главную страницу</a></p>
</body>
</html>