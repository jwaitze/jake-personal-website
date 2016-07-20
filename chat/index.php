<?php

	$page_name = basename(__DIR__); // must be in this file
	// $page_name to output the correct included file in includes.php

	include("../inc/defaults.php"); // variable values below
	$page_description = '<meta name="description" content="Jake Waitze\'s personal site. | IRC Chat | irc.traject.io / irc.waitze.net : 6667 / +6697 @ #main" />';
	$irc_label = '<div id="activePage">IRC</div>';

	include("../inc/includes.php");

?>