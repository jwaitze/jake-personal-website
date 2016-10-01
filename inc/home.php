<?php

	if(!isset($page_name)) { // redirect to subdirectory if visited directly
		header("Location: ../home");
		exit();
	}

?>

<h1 id="inlineElement">Personal site</h1>
<p id="homeBody">This is the personal site of Jake Z Waitze. - The primary functions of this website are for showcasing some projects through blog posts and for having a place to consolidate contact information and various social media. This website is entirely <a class="textUnderline" href="https://github.com/jwaitze/Personal-Website" target="_blank">open source</a> and will be consistently updated for the next few months.</p>

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
