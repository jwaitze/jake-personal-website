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
	$total_posts_count = count($files);

	$page_num = 0;
	if(isset($_GET['page']))
		$page_num = (int)$_GET['page'];

	$posts_per_page = 3;
	if(isset($_GET['posts_per']))
		$posts_per_page = (int)$_GET['posts_per'];

	// extract the slice of posts we want
	$files = array_slice($files, $page_num * $posts_per_page, $posts_per_page);

	foreach($files as $file) {
		$page_filepath = "?post=" . basename($file, ".php");
		include($path . '/' . $file);

		if($file != end($files)) // add the line if it's not the last entry
			echo "<hr>";
	}

	// pagination...
	if(!isset($_GET['page']))
		echo "<a href=\"?page=1\"><div class=\"nextPage\">>>> Next Page >>></div></a>";
	else {
		if($page_num != 0) {
			echo "<a href=\"?page=";
			echo $page_num - 1;
			echo "\"><div class=\"prevPage\"><<< Previous Page <<<</div></a>";
		}

		if(($page_num + 1) * $posts_per_page < $total_posts_count) {
			echo "<a href=\"?page=";
			echo $page_num + 1;
			echo "\"><div class=\"nextPage\">>>> Next Page >>></div></a>";
		}
	}

?>