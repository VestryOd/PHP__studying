<?php
	////////////////все, по авторизации
	session_start();
	//Функция проверки логина пароля
	function checkLoginPass($login, $password)
	{
		$users = array ('ivanov' => 'qwerty', 'petrov' => '123', 'sidorov' => '456');
		$check = array('flag' => false, 'message' => '');

		if (empty($login) && empty($password))
		{
			$check['message'] = 'Пустой логин или пароль!';
		}
		elseif (isset($users[$login]) && $password == $users[$login])
		{
			$check['flag'] = true;
			$check['message'] = 'Вы вошли как пользователь '.$login.'!';
		}
		else $check['message'] = 'Неправильный логин или пароль!';
		return $check;
	}

	//установка логина в куки
	function login($login)
	{
		setcookie('auth', $login, time()+86400);
	}

	//флаг, что авторизован
	function isUser()
	{
		return isset($_COOKIE['auth']);
	}

	//получение логина юзера
	function getUser()
	{
		return $_COOKIE['auth'];
	}

	//
	function logout()
	{
		setcookie('auth', '', time()-86400);
	}

	function listOfFiles()
	{
		$listAllFiles = scandir('pictures');
		$listOfPictures = array();

		foreach($listAllFiles as $file)
		{
			if ($file != '.' && $file != '..' && $file != 'Thumbs.db')
			{
				$listOfPictures[] = $file;
			}
		}
		return $listOfPictures;
	}

	function fileIsCopied() {
		return 'Файл скопирован успешно!';
	}

	function fileIsNotCopied(){
		return 'Файл не был скопирован!';
	}