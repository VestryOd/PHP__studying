<?php
	////////////////все, по авторизации
	session_start();
	//Функция проверки логина пароля
	function checkLoginPass($login, $password)
	{
		$users = array ('ivanov' => 'qwerty', 'petrov' => '123', 'sidorov' => '456');
		return isset($users[$login]) && $password == $users[$login];
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
	/////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////все по выводу изображений/////////////////////////////////////////////////
	//функция получения списка файлов,
	//и проверки того, что файл изображение - возвращает массив изображений
	function listOfFiles()
	{
		$path = (__DIR__) . DIRECTORY_SEPARATOR . 'pictures'.DIRECTORY_SEPARATOR;
		$listAllFiles = scandir($path);
		$listOfPictures = array();

		//перебор  и запись в массив только jpg
		foreach($listAllFiles as $file)
		{
			if(substr($file, strlen($file)-3) == 'jpg')
			{
				$listOfPictures[] = $file;
			}
		}
		return $listOfPictures;
	}