<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	require 'functions.php';

	//если юзер не авторизован - переброс нп форму авторизации
	if(!isUser())
	{
		header('Location: /form.php');
		exit();
	}

?>
<h3>Привет, <?php echo getUser(); ?></h3>
<a href="/logout.php">Выход</a>
<?php
	$_SESSION['pictures'] = listOfFiles();
	include 'form.php';