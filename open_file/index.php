<?php
	
	require __DIR__ . '/models/photo.php';

	$items = Photos_getAll();

	include __DIR__ . '/views/index.php';