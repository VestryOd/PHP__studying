<?php
	include 'form.html.php';
	$current = 1;
	$prev = 0;
	$result = 0;
	$fibbo = array();

	function rekursFibbo($a){

		global $current, $prev, $result, $fibbo;
		if($a){
			$result = $prev + $current;
			$a -= 1;
			$prev = $current;
			$current = $result;
			$fibbo[] += $result;
			//echo $result;
			rekursFibbo($a);
		}

	}

	//var_dump($_GLOBALS);

	rekursFibbo($_POST['steps']);
	//var_dump($fibbo);
	for($i=0; $i<$_POST['steps']; $i++){
		echo $fibbo[$i].', ';
	}
?>