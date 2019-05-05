<?php
	session_start();
	$_SESSION['output'] = '';
	$_SESSION['title'] = '';
	$_SESSION['login'] = '';
	$_SESSION['logged'] = false;
	$_SESSION['authorise'] = false;

	$login = 'vasja@mail.ru';
	$pass = 'qwerty';

	if(empty($_COOKIE['login'])){
		$_SESSION['output'] = 'Вы вошли как гость! Пожалуйста авторизуйтесь';
		$_SESSION['title'] = 'Авторизация';
	}

	if(isset($_POST['action']) && $_POST['action'] == 'Авторизация'){
		$_SESSION['authorise'] = true;
	}
	
	if(isset($_POST['action']) && $_POST['action'] == 'Войти'){
		if(($_POST['login'] == $login) && ($_POST['password'] == $pass)) {
			setcookie('login', 'Vasja', time()+1800);
			$_SESSION['logged'] = true;
		} else {
			$_SESSION['output'] = 'Введены неправильное имя пользователя и/или пароль! Пожалуйста введите корректные данные.';
			$_SESSION['title'] = 'Ошибка авторизации!';
		}
	}

	if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'Vasja'){
		$_SESSION['login'] = 'Vasja';
		$_SESSION['output'] = 'Добро пожаловать! Вы вошли как пользователь '.$_SESSION['login'];
		$_SESSION['title'] = 'Страница профиля';
	}

	if(isset($_POST['action']) && $_POST['action'] == 'Выйти'){
		setcookie('login', 'Vasja', time()-86400);
		$_SESSION['output'] = 'Вы вошли как гость! Пожалуйста авторизуйтесь';
		$_SESSION['title'] = 'Авторизация';
		$_SESSION['login'] = '';
		$_SESSION['logged'] = false;
		$_SESSION['authorise'] = false;
	}
	include 'form_inc.php';
	//var_dump($_SESSION);
	//var_dump($_COOKIE);