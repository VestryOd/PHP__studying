<?php
//var_dump($_SERVER);
    include_once $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/magicquotes_inc.php';

    if (isset($_GET['addjoke'])){
    	include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/form_html.php';
    	exit();
    }

    include_once $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/includes/db_inc.php';

    if (isset($_POST['joketext'])){
    	try {
    		$sql = 'INSERT INTO joke SET 
    		joketext=:joketext,
    		jokedate = CURDATE()';
    	$s = $pdo->prepare($sql);
    	$s->bindValue(':joketext', $_POST['joketext']);
    	$s->execute();

    	} catch (Exception $e) {
    		$error = 'Не удалось добавить новую шутку в базу' . $e->getMessage();
    		include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/output/error_inc.php';
    		exit();
    	}

    	header('Location: .');
    	exit();
    }
    
    try {
        $sql = 'SELECT id, joketext FROM joke';
        $result = $pdo->query($sql);
    }
    catch (Exception $e) {
        $error = 'Невозможно загрузить список шуток' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/output/error_inc.php';
        exit();
    }
    
    while ($row = $result->fetch()){
        $jokes[] = array('id' => $row['id'], 'text' => $row['joketext']);
    }
    
    include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/output/jokes_html.php';

if (isset($_GET['deletejoke'])){
  try {
    $sql = 'DELETE FROM joke WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (Exception $e) {
    $error = 'Невозможно удалить запись из базы шуток' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'] . '/myChapter6/output/error_inc.php';
    exit();
  }

  header('Location: .');
  exit();
}