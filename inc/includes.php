<?php

	//$generate_password_hash = "";
	if(isset($generate_password_hash))
		die(hash('sha512', $generate_password_hash . $generate_password_hash . "`^salt^`"));

	include_once("../inc/database.php");
	include_once("../inc/check_login.php");
	$mysqli->close();


	include_once("../inc/process_submits.php");

	//output the full page
	include_once("../inc/header.php");

	include_once($page_name . ".php");
	include_once("../inc/footer.php");

?>