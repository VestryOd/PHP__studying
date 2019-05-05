<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/helpers_inc.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Каталог Шуток</title>
</head>
<body>
	<h1 class="h1">Каталог Шуток</h1>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/output/top_html.php';?>
        
	<br>
		<p><a href="?addjoke">Добавьте свою собственную шутку</a></p>
        <p>Вот все шутки, которые есть в базе в данный момент:</p>
      	<?php foreach ($jokes as $joke): ?>
      		<form action="?deletejoke" method="post">
      			<blockquote>
                    <p class="joke"><?php htmlout($joke['text']); ?>
                    	<input type="hidden" name="id" value="<?php echo $joke['id']?>">
                    	<input type="submit" value="Удалить">
                    </p>
                </blockquote>
      		</form>
      	<?php endforeach; ?>
        
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/output/footer_html.php';?>
</body>
</html>