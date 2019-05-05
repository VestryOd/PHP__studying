<?php
	session_start();
	require 'functions.php';

	logout();
	header('Location: /index.php');
	exit();