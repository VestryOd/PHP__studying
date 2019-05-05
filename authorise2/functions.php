<?php
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