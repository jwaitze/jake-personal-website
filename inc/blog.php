<?php
	
	if(!isset($page_name)) { // redirect to subdir if visited directly
		header("Location: ../blog");
		exit();
	}

    if(!empty($notice_to_display))
    	echo $notice_to_display . '<hr>';

	$path = "posts";

	if(isset($_GET['post'])) { // direct link to post

		$postrow = GetAllPostDataByUrlKey($mysqli, urldecode($_GET['post']));
		if(count($postrow) < 3)
			include("../inc/no_post_found.php");
		else
			OutputBlogPost($postrow['title'], urldecode($_GET['post']), $postrow['content'], $postrow['author']);

		if($logged_in) {
			echo '<a href="?delete=' . $_GET['post'] . '"><button onclick="return confirm(\'Are you sure you want to delete?\')" class="editButtonsRight confirmButton">Delete</button></a>';
        	echo '<a href="?edit=' . $_GET['post'] . '"><button class="editButtonsRight">Edit</button></a>';
    	}

		echo '<a href="../blog"><<< Go to Blog <<<</a>';

		return; // exit just this included file
	}

	// pagination...

	$page_num = 0;
	if(isset($_GET['page']))
		$page_num = (int)$_GET['page'];

	$posts_per_page = 3;
	if(isset($_GET['posts_per']))
		$posts_per_page = (int)$_GET['posts_per'];

	$postrows = GetStoredPostsByRange($mysqli, $page_num * $posts_per_page, $posts_per_page);
	$total_posts_count = GetStoredPostsCount($mysqli);

	if(count($postrows) == 0)
		echo "<p>Nothing to see here... Come back later.";

	if($logged_in)
		echo '<a href="../blogpost"><button>New Post</button></a>';

	foreach($postrows as $postrow) {
		$delete = '<a href="?delete=' . $postrow['urlkey'] . '"><button onclick="return confirm(\'Are you sure you want to delete?\')" class="editButtonsInList confirmButton">Delete</button></a>';
        $edit = '<a href="?edit=' . $postrow['urlkey'] . '"><button class="editButtonsInList">Edit</button></a>';

        $title = $postrow['title'];
        if($logged_in)
        	$title = $postrow['title'] . $edit . $delete;

		OutputBlogPost($postrow['title'], $postrow['urlkey'], $postrow['content'], $postrow['author'], false);
		if($postrow != end($postrows)) // add the line if it's not the last entry
			echo "<hr>";
	}

	// next page / prev page
	if(!isset($_GET['page']) && $total_posts_count > $posts_per_page)
		echo '<a href="?page=1"><div class="nextPage">>>> Next Page >>></div></a>';
	else {
		if($page_num != 0) {
			echo '<a href="?page=';
			echo $page_num - 1;
			echo '><div class="prevPage"><<< Previous Page <<<</div></a>';
		}

		if(($page_num + 1) * $posts_per_page < $total_posts_count && $total_posts_count > $posts_per_page) {
			echo '<a href="?page=';
			echo $page_num + 1;
			echo '><div class="nextPage">>>> Next Page >>></div></a>';
		}
	}

?>