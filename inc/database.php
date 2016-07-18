<?php

	if(!isset($page_title)) { // redirect to subdir if visited directly
		header("Location: ../home");
		exit();
	}
	
	$mysqli = new mysqli($SQLDB['host'], $SQLDB['user'], $SQLDB['pass'], $SQLDB['db']);
	if($mysqli->connect_errno)
		die("DB Error (" . $mysqli->connect_error . ")\n");

	$mysqli->set_charset("utf8mb4"); // use the correct utf-8 charset for mysql...
	
?>