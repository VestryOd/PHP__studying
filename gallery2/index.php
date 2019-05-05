<?php
	header('Content-Type: text/html; charset=utf-8');
	require 'functions.php';

	$message = '';
	
	if (!isset($_COOKIE['auth'])) {
			include 'form.php';
	}

	if (isset($_POST['submit']) && $_POST['submit'] == 'Войти') {
		$loginCheck = checkLoginPass($_POST['login'], $_POST['password']);
		$message = $loginCheck['message'];
		if ($loginCheck['flag']) {
			login($_POST['login']);
		}
	}
	echo $message;
	var_dump($_POST);
	var_dump($loginCheck);