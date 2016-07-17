<?php

	//$generate_password_hash = "";
	if(isset($generate_password_hash))
		die(hash('sha512', $generate_password_hash . $generate_password_hash . "`^salt^`"));

	require("../inc/database.php");
	require("../inc/check_login.php");
	$mysqli->close();

	//output the full page
	require("../inc/header.php");
	require($page_name . ".php");
	require("../inc/footer.php");

?>