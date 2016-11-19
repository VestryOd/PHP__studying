<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<table border="1">
	<tr>
		<th>Название</th>
	</tr>
	<?php foreach ($items as $item): ?>
	<tr>
		<td><?php echo $item['title']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
</body>
</html>