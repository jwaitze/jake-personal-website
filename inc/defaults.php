<?php

	if(!isset($page_name)) { // redirect to home if visited directly
		header("Location: ../home");
		exit();
	}

	include("../_config.php");

	error_reporting(E_ERROR | E_PARSE); // disable for development

	$logged_in = false;
	$logged_in_as = "";
	$notice_to_display ="";

	$page_title = "Jake Waitze";
	$page_description = "";

	$home_label = "Home";
	$blog_label = "Blog";
	$irc_label = "IRC";

?>