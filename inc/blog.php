<?php
	
	if(!isset($page_title)) { // redirect to subdir if visited directly
		header("Location: blog");
		exit();
	}

	$path = "posts";

	if(isset($_GET['p'])) { // direct link to post
		$filepath = $path . '/' . urldecode($_GET['p']) . '.php';
		if(!file_exists($filepath))
			include("../inc/no_post_found.php");
		else
			echo file_get_contents($filepath);

		return; // exit this included file
	}

	$files = array_diff(scandir($path), array('.', '..')); // omit this dir and prev dir
	foreach($files as $file)
		echo file_get_contents($path . '/' . $file);

	// need to add splitting up of X amount of blog posts... consider shrinking them and linking to them directly

?>