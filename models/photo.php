<?php

require_once __DIR__ . '/../functions/sql.php';

function Photos_getAll() {

	$sql = 'SELECT * FROM images';
	return sql_query($sql);
	
}

function Photo_insert($data) {

}