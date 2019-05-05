<?php
//выводим список категорий
include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

try {
 	$result = $pdo->query('SELECT id, name FROM category');
 } catch (Exception $e) {
 	$error = 'Ошибка при извлечении авторов из базы данных!'.$e->getMessage();
 	include 'error_html.php';
 	exit();
 }

foreach ($result as $row) {
	$categories[] = array('id' => $row['id'], 'name' => $row['name']);
}

include 'categories_html.php';
/////////////////////////////////////////////////////////////////////////////
//Если нажата кнопка Удалить
if (isset($_POST['action']) and $_POST['action'] == 'Удалить'){

	include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

	//Удаляем все записи, связывающие шутки с этой категорией
	try {
		$sql = 'SELECT id FROM jokecategory WHERE categoryid = :id';
		$s = prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (Exception $e) {
		$error = 'Ошибка при удалении шуток из категории.'.$e->getMessage();
		include 'error_html.php';
		exit();
	}

	//Удаляем категорию
	try {
		$sql = 'DELETE FROM category WHERE id = :id';
		$s = prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (Exception $e) {
		$error = 'Ошибка при удаленни категории.'.$e->getMessage();
		include 'error_html.php';
		exit();
	}

	header('Location: .');
	exit();
}
/////////////////////////////////////////////////////////////////////////////

// Добавляем новую категорию.
include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/magicquotes_inc.php';


if (isset($_GET['add'])) {
	
	$pageTitle = 'Новая категория';
	$action = 'addform';
	$name = '';
	$id = '';
	$button = 'Добавить категорию';

	include 'form_html.php';
	exit();
}

if (isset($_GET['addform'])) {

	include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

	try {
		$sql = 'INSERT INTO category SET 
		name = :name';
	$s = $pdo->prepare($sql);
	$s->bindValue(':name', $_POST['name']);
	$s->execute();
	} catch (Exception $e) {
		$error = 'Ощибка при добавлении категории'.$e->getMessage();
		include 'error_html.php';
		exit();
	}

	header('Location: .');
	exit();
}
///////////////////////////////////////////////////////////////////
///редактируем категорию
if (isset($_POST['action']) and $_POST['action'] == 'Редактировать') {
	
	include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

	try {
		$sql = 'SELECT id, name FROM category WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (Exception $e) {
		$error = 'Ошибка при извлечении информации о категории'.$e->getMessage();
		include 'error_html.php';
		exit();
	}

	$row = $s->fetch();

	$pageTitle = 'Редактировать категорию';
	$action = 'editform';
	$name = $row['name'];
	$id = $row['id'];
	$button = 'Обновить информацию о категории';

	include 'form_html.php';
	exit();
}

if (isset($_GET['editform'])) {
	
	include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

	try {
		$sql = 'UPDATE category SET 
		name = :name,
		WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->bindValue(':name', $_POST['name']);
		$s->execute();
	} catch (Exception $e) {
		$error = 'Ошибка при обновлении категории'.$e->getMessage();
		include 'error_html.php';
		exit();
	}

	header('Location: .');
	exit();
}