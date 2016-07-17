<?php
	
	$mysqli = new mysqli($SQLDB['host'], $SQLDB['user'], $SQLDB['pass'], $SQLDB['db']);
	if($mysqli->connect_errno)
        die("DB Error (" . $mysqli->connect_error . ")\n");

	$mysqli->set_charset("utf-8");

?>