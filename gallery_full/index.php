<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	require __DIR__ . DIRECTORY_SEPARATOR .'functions.php';
	$_SESSION['pictures'] = listOfFiles();
///////////////////// по авторизации//////////
	//если юзер не авторизован - переброс нп форму авторизации
	if(!isUser())
	{
		header('Location: /form.php');
		exit();
	}
	require __DIR__ . DIRECTORY_SEPARATOR .'profile.php';

	if(!empty($_FILES))
	{
		$fileName = $_FILES['myfile']['name'];
		$from = $_FILES['myfile']['tmp_name'];
		$dest = __DIR__ . DIRECTORY_SEPARATOR .'pictures/';

		if(!copy($from, $dest.basename($fileName)))
		{
			$_SESSION['copied'] = true;
			$_SESSION['upload_error'] = 'Ошибка, файл не был скопирован!';
		}
		else
		{
			echo 'Новый файл добавлен в галлерею';
		}

		//header('Location: .');
		//exit();
	}

	if($_SESSION['copied'])
	{
		header('Location: /profile.php');
		exit();
	}