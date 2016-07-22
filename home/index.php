<?php

	$page_name = basename(__DIR__); // must be in this file
	// $page_name to output the correct included file in includes.php

	include("../inc/defaults.php"); // variable values below
	$page_description = '<meta name="description" content="Jake Waitze\'s personal site. Contact information. Some projects. Social media. IRC. Blog soon." />';
	$home_label = '<div id="activePage">Home</div>';

	include("../inc/includes.php");

?>