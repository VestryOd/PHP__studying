<?php

function date_transform($number, $month){
	
	$dateMonth = '';

	if($number > 31){
		echo 'Введите число от 1-го до 31-го!';
	}elseif($month > 12){
		echo 'Введите число от 1-го до 12-ти!';
	}else{
		switch ($month) {
			case '1':
				$dateMonth = $number.' января';
				break;
			case '2':
				$dateMonth = $number.' февраля';
				break;
			case '3':
				$dateMonth = $number.' марта';
				break;
			case '4':
				$dateMonth = $number.' апреля';
				break;
			case '5':
				$dateMonth = $number.' мая';
				break;
			case '6':
				$dateMonth = $number.' июня';
				break;
			case '7':
				$dateMonth = $number.' июля';
				break;
			case '8':
				$dateMonth = $number.' августа';
				break;
			case '9':
				$dateMonth = $number.' сентября';
				break;
			case '10':
				$dateMonth = $number.' октября';
				break;
			case '11':
				$dateMonth = $number.' ноября';
				break;
			case '12':
				$dateMonth = $number.' декабря';
				break;

		}
	}

	return $dateMonth;
}


echo date_transform(31,12);