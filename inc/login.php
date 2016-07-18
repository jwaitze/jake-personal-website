<?php

        if(!isset($page_name)) { // redirect to subdirectory if visited directly
                header("Location: ../login");
                exit();
        }

?>
                <h2 id="inlineElement">Login</h2>
<?php

        if($logged_in) {
                echo "<p>Logged in.</p>";
                echo "<ul>";
                echo "<li class=\"newBlogPost\"><a href=\"../blogpost\">Make a new blog post</a></li>";
                echo "</ul>";
                return;
        }

?>

                <div class="loginForm">
                        <form name="login" action="index.php" method="post" accept-charset="utf-8">
                		<ul>
                			<li>
                				<label for="username">Username:</label>
                				<input type="username" name="username" placeholder="username" required />
                			</li>
                			<li>
                				<label for="password">Password:</label>
                				<input type="password" name="password" placeholder="password" required />
                			</li>
                			<li><input type="submit" value="Login"></li>
                		</ul>
                	</form>
                </div>
