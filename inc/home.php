<?php
	
	if(!isset($page_name)) { // redirect to subdirectory if visited directly
		header("Location: ../home");
		exit();
	}

?>
				<h1 id="inlineElement">Welcome to my personal site.</h1>
				<p id="homeBody">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed lacus mollis, lobortis quam non, vestibulum sapien. Nam eu nibh sed velit tincidunt suscipit non vitae nunc. Suspendisse lorem sem, pharetra at erat non, suscipit gravida orci. Etiam ut ex id ligula lacinia sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec accumsan pharetra sagittis. Integer efficitur consequat mi, ut venenatis quam elementum rhoncus. Etiam sollicitudin semper mi. Ut id pulvinar tortor. Integer convallis sapien non dui porta, a aliquet enim feugiat. Phasellus vel massa non neque viverra lacinia id id augue.</p>

<?php

	$postrows = GetStoredPostsByRange($mysqli, 0, 3);
	$total_posts_count = GetStoredPostsCount($mysqli);

	if(count($postrows) == 0)
		return; // no posts, so the below part of this page is omitted
	else
		echo '<hr><a href="../blog"><h1 id="recentPostsHeader">Recent Blog Posts</h1></a>';

	foreach($postrows as $postrow) {

		OutputBlogPost($postrow['title'], $postrow['urlkey'], $postrow['content'], $postrow['author'], true);

		if($postrow != end($postrows)) // add the line if it's not the last entry
			echo '<hr class="fadingStyleRecentPosts">';
	}

?>