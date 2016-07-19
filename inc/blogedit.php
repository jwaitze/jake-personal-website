<?php

	if(!isset($page_name)) { // redirect to subdirectory if visited directly
		header("Location: ../blog");
		exit();
	}

	// exclusive to logged in users
	if(!$logged_in)
		return;

?>
				<h2 id="inlineElement">New Blog Post</h2>
                <div class="newBlogPostContainer">
<?php

        if(!empty($notice_to_display))
                echo $notice_to_display;
?>
                	<form name="blogpost" action="index.php" method="post" accept-charset="utf-8">
                		<ul>
                			<li>
                				<label for="blogtitle">Blog Title:</label>
                				<input type="blogtitle" name="blogtitle" placeholder="Title" required>
                			</li>
                			<li>
                				<label for="blogcontent">Blog Post:</label>
                				<textarea type="blogcontent" name="blogcontent" placeholder="Put the post HTML in here... (be sure to use proper paragraphic formatting)" required></textarea>
                			</li>
                			<li class="submitButton"><input type="submit" value="Submit"></li>
                		</ul>
                	</form>
                </div>
