<?php
	
	if(!isset($page_title)) { // redirect to subdir if visited directly
		header("Location: blog");
		exit();
	}

	$path = "posts";

	if(isset($_GET['post'])) { // direct link to post
		$filepath = $path . '/' . urldecode($_GET['post']) . '.php';
		if(!file_exists($filepath))
			include("../inc/no_post_found.php");
		else {
			$page_filepath = "";
			include($filepath);
		}

		echo "<a href=\"../blog\"><<< Go to Blog <<<</a>";

		return; // exit just this included file
	}

	$files = array_diff(scandir($path), array('.', '..')); // omit this dir & prev dir

	// to limit the amount of posts shown, this is where i will choose what posts go in the array.

	foreach($files as $file) {
		$page_filepath = "?post=" . basename($file, ".php");
		include($path . '/' . $file);

		if($file != end($files)) // add the line if it's not the last entry
			echo "<hr>";
	}

	echo "<a href=\"?page=2\"><div class=\"nextPage\">>>> Next Page >>></div></a>";

?>