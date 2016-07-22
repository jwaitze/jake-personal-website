<?php

	if(!isset($page_name)) { // redirect to home if visited directly
		header("Location: ../home");
		exit();
	}

	include("../_config.php");

	error_reporting(E_ERROR | E_PARSE); // disable for development.
	// people may try and invoke errors to divulge further info about the site
	// don't let them get that far if it's even possible...
	// (although this particular website is open source...)

	$logged_in = false;
	$logged_in_as = "";
	$failed_login = false;
	$notice_to_display ="";

	$page_title = "Jake Waitze";
	$page_description = "";

	$home_label = "Home";
	$blog_label = "Blog";
	$irc_label = "IRC";

	$temp1 = 0;
	$temp2 = 0;
	$temp3 = 0;
	$temp4 = 0;

?>