<?php
	function deposit_percent($summ, $time, $percent){

		$result = ((($summ * $percent)/12) * $time)/100;
		return $result;
	}

echo deposit_percent(10000, 24, 16);