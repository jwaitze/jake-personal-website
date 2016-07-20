<?php

	if(!isset($page_name)) { // redirect to subdirectory if visited directly
		header("Location: ../blog");
		exit();
	}

	// exclusive to logged in users
	if(!$logged_in)
		return;

?>
				<h2 id="inlineElement">Editing Blog Post</h2>
                <div class="newBlogPostContainer">
                	<form name="blogedit" action="index.php" method="post" accept-charset="utf-8">
                		<ul>
                			<li>
                                                <label for="title">Title:</label>
                                                <?php echo $temp2; ?>
                                        </li>
                                        <li>
                                                <label for="dateposted">Date Posted:</label>
                                                <?php echo substr($temp1, 0, 10); ?>
                                        </li>
                			<li>
                				<label for="update">Content:</label>
                				<textarea type="update" name="update" required><?php echo $temp3; ?></textarea>
                			</li>
                                        <?php echo '<input type="hidden" name="post" value="' . $temp1 . '">'; ?>
                			<li class="submitButton"><input type="submit" value="Update"></li>
                		</ul>
                	</form>
                </div>
