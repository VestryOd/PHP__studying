<?php

function sql_connect() {
	mysql_connect('localhost', 'root', '');
	mysql_select_db('gallery');
}

function sql_query($sql) {
	
	sql_connect();
	$res = mysql_query($sql) or die(mysql_error());

	$ret = [];
	while ( false !== $row = mysql_fetch_array($res)) {
		$ret[] = $row;
	}
	return $ret;
}

function sql_exec($sql) {
	
	sql_connect();
	mysql_query($sql) or die(mysql_error());
}