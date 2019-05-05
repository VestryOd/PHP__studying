<?php
	include_once $_SERVER['DOCUMENT_ROOT'] .'/includes/magicquotes.inc.php';
	
	$items = array(

		array('id' => '1', 'desc' => 'Канадско-австралийский словарь','price' => 24.95),
		array('id' => '2', 'desc' => 'Практически новый парашют (никогда не раскрывался)','price' => 1000),
		array('id' => '3', 'desc' => 'Песни группы Goldfish (набор из 2 CD)','price' => 19.99) ,
		array('id' => '14', 'desc' => 'Просто JavaScript (SitePoint)','price' => 39.95));
	session_start();
	if(!isset($_SESSION['cart'])){

		$_SESSION['cart'] = array();
	}

	if(isset($_POST['action']) and $_POST['action'] == 'Купить'){

		//Добавляем новый элемент в конец массива
		$_SESSION['cart'][] = $_POST['id'];
		header('Location: .');
		exit();
	}

	if(isset($_POST['action']) and $_POST['action'] == 'Очистить корзину'){

		//Опустошаем корзину
		unset($_SESSION['cart']);
		header('Location: ?cart');
		exit();
	}

	if(isset($_GET['cart'])){
		$cart = array();
		$total = 0;
		foreach ($_SESSION['cart'] as $id) {
			
			foreach($items as $product){
				if($product['id'] == $id){
					$cart[] = $product;
					$total += $product['price'];
					break;
				}
			}
		}

		include 'cart.html.php';
		exit();
	}

	include 'catalog.html.php';

?>