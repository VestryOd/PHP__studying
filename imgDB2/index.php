<?php
	function login($login)
	{
		return setcookie('auth', $login, time() + 3600);
	}

	function logout()
	{
		return setcookie('auth', '', time() - 3600);
	}

	function userIsLoged()
	{
		return isset($_COOKIE['auth']);
	}

	function checkUser($login, $password) {
		if (isset($login) && $login != '' && isset($password) && $password != '') {
			if ($login == 'ivanov' && $password == 'qwerty') {
				return login($login);
			} else {
				return $GLOBALS['login_error'] = 'Введите кооректные логин и пароль';
			}
		}
	}

	if (!userIsLoged()) {
		header('Location: form.inc.php');
		// exit;
	} else {
		header('Location: /profile.inc.php');
		// exit;
	}

	if (isset($_POST['action']) && $_POST['action'] == 'login') {
		if (!checkUser($_POST['name'], $_POST['password'])) {
			echo $GLOBALS['login_error'];
		}
		// exit;
	}

	if (isset($_POST['action']) && $_POST['action'] == 'logout') {
		logout();
		exit;
	}

	include 'fix.php';