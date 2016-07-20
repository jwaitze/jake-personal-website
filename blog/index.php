<?php

	$page_name = basename(__DIR__); // must be in this file
	// $page_name to output the correct included file in includes.php

	include("../inc/defaults.php"); // variable values below
	$page_description = '<meta name="description" content="Jake Waitze\'s personal site. | Blog" />';
	$blog_label = '<div id="activePage">Blog</div>';

	include("../inc/includes.php");

?>