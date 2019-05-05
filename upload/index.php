<?php
require 'form.php';
	var_dump($_FILES);

$fileName = $_FILES['myfile']['name'];
$from = $_FILES['myfile']['tmp_name'];
$dest = 'destination/';

if(!copy($from, $dest.basename($fileName)))
{
	echo 'Ошибка, файл не был скопирован!';
}