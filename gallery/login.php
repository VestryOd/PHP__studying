<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	require 'functions.php';

	if(empty($_POST['login']) && empty($_POST['password']))
	{
		$_SESSION['error'] = 'Пустой логин или пароль!';
		header('Location: /form.php');
		exit();
	}

	$login = $_POST['login'];
	$password = $_POST['password'];

	if(!checkLoginPass($login, $password))
	{
		$_SESSION['error'] = 'Неверный логин или пароль!';
		header('Location: /form.php');
		exit();
	}

	login($login);
	header('Location: /index.php');
	exit();