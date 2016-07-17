<?php

        if(!isset($page_title)) { // redirect to subdirectory if visited directly
		header("Location: ../login");
		exit();
	}

        date_default_timezone_set('EST');

        // submits which are exclusive to logged in users
        if($logged_in) {
                if(isset($_POST['blogtitle']) && isset($_POST['blogcontent'])) {
                        $new_post = '';
                        $new_post .= '        <div class="blogpost">' . PHP_EOL;
                        $new_post .= '                <a href="<?php echo $page_filepath; ?>"><h2 id="inlineElement">' . $_POST['blogtitle'] . '</h2></a>' . PHP_EOL;
                        $new_post .= '                <p>Posted: <?php echo substr(basename(__FILE__, \'.php\'), 0, 10); ?></p>' . PHP_EOL;
                        $new_post .= $_POST['blogcontent'] . PHP_EOL;
                        $new_post .= '        </div>' . PHP_EOL;
                        $new_title_core = date("Y-m-d_") . str_replace(' ', '-', $_POST['blogtitle']);
                        $new_title = '../blog/posts/' . $new_title_core . '.php';
                        
                        // for when edits may occur
                        if(file_exists($new_title)) {
                                if(isset($_POST['blogreplace']))
                                        unlink($new_title);
                        }

                        if(!file_exists($new_title)) {
                                if(file_put_contents($new_title, $new_post) != FALSE) {
                                        $url_filepath = "../blog/index.php?post=" . basename(urlencode($new_title_core)); // urlencode for inline link usage
                                        $notice_to_display = "<p>Successfully made blog post. It is available at <a href=\"$url_filepath\" target=\"_blank\">this link</a>.</p>";
                                }
                                return;
                        }

                        $notice_to_display = "<p>Did not replace the already existing blog post under that name.</p>";
                }
        }

?>