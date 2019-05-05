<?php

include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

try {
 	$result = $pdo->query('SELECT id, name FROM author');
 } catch (Exception $e) {
 	$error = 'Ошибка при извлечении авторов из базы данных!'.$e->getMessage();
 	include 'error_html.php';
 	exit();
 }

foreach ($result as $row) {
	$authors[] = array('id' => $row['id'], 'name' => $row['name']);
}

include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/admin/authors/authors_html.php';

if (isset($_POST['action']) and $_POST['action'] == 'Удалить'){

	include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

	//получаем шутки автора, для того, чтобы в массив сохранить id категорий тех шуток,
	//которые принадлежат автору
	try {
		$sql = 'SELECT id FROM joke WHERE authorid = :id';
		$s = prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (Exception $e) {
		$error = 'Ошибка при извлечении шуток, которые нужно удалить.'.$e->getMessage();
		include 'error_html.php';
		exit();
	}

	$result = $s->fetchAll();

	//Удаляем записи о категориях шуток
	try {
		$sql = 'DELETE FROM jokecategory WHERE jokeid = :id';
		$s = prepare(sql);
		
		//перебираем шутки, чтобы удалить именно те, где совпадут jokeid
		foreach ($result as $row) {
			$jokeId = $row['id'];
			$s->bindValue(':id', 'jokeid');
			$s->execute();
		}
	} catch (Exception $e) {
		$error = 'Ошибка при удалении записей о категориях шутки.'.$e->getMessage();
		include 'error_html.php';
		exit();
	}
	//удаляем шутки, принадлежащие автору
	try {
		$sql = 'DELETE FROM joke WHERE id = :id';
		$s = prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (Exception $e) {
		$error = 'Ошибка при удаленни шуток, принадлежащих автору.'.$e->getMessage();
		include 'error_html.php';
		exit();
	}

	//удаляем имя автора
	try {
		$sql = 'DELETE FROM author WHEN id = :id';
		$s = prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (Exception $e) {
		$error = 'Ошибка при удалении автора'.$e->getMessage();
		include 'error_html.php';
		exit();
	}

	header('Location: .');
	exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/magicquotes_inc.php';
if (isset($_GET['add'])) {
	
	$pageTitle = 'Новый автор';
	$action = 'addform';
	$name = '';
	$email = '';
	$id = '';
	$button = 'Добавить автора';

	include 'form_html.php';
	exit();
}

if (isset($_GET['addform'])) {

	include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

	try {
		$sql = 'INSERT INTO author SET 
		name = :name,
		email = :email';
	$s = $pdo->prepare($sql);
	$s->bindValue(':name', $_POST['name']);
	$s->bindValue(':email', $_POST['email']);
	$s->execute();
	} catch (Exception $e) {
		$error = 'Ощибка добавления автора'.$e->getMessage();
		include 'error_html.php';
		exit();
	}

	header('Location: .');
	exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Редактировать') {
	
	include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

	try {
		$sql = 'SELECT id, name, email FROM author WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (Exception $e) {
		$error = 'Ошибка при извлечении информации об авторе'.$e->getMessage();
		include 'error_html.php';
		exit();
	}
	$row = $s->fetch();


	$pageTitle = 'Редактировать автора';
	$action = 'editform';
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	$button = 'Обновить информацию об авторе';

	include 'form_html.php';
	exit();
}

if (isset($_GET['editform'])) {
	
	include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

	try {
		$sql = 'UPDATE author SET 
		name = :name,
		email = :email
		WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->bindValue(':name', $_POST['name']);
		$s->bindValue(':email', $_POST['email']);
		$s->execute();
	} catch (Exception $e) {
		$error = 'Ошибка при обновлении записи об авторе'.$e->getMessage();
		include 'error_html.php';
		exit();
	}

	header('Location: .');
	exit();
}