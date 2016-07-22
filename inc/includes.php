<?php

	include_once("../inc/functions.php"); // include all our functions we need...
	include_once("../inc/database.php"); // connect to db, log into db user, select db
	include_once("../inc/check_login.php"); // check if logged in or trying to log in

	//output the full page...
	include_once("../inc/header.php");

	include_once("../inc/process_submits.php"); // process GET and POST requests here, check for auth
	include_once($page_name . ".php");

	include_once("../inc/footer.php");

	$mysqli->close(); // done querying db

?>