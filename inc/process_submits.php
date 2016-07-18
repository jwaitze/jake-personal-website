<?php

        if(!isset($page_title)) { // redirect to subdirectory if visited directly
                header("Location: ../login");
                exit();
        }

        function InsertBlogPostIntoDatabase($logged_in, $mysqli, $title, $urlkey, $content) {
                if(!$logged_in)
                        return false;

                // don't break my SQL statements! (perhaps used prepared statements later...)
                $insert_title = $mysqli->real_escape_string($title);
                $insert_urlkey = $mysqli->real_escape_string($urlkey);
                $insert_content = $mysqli->real_escape_string($content);

                if($mysqli->query("INSERT INTO `blogposts` (`title`, `urlkey`, `content`) VALUES ('$insert_title', '$insert_urlkey', '$insert_content')") == TRUE)
                        return true;
                
                return false;
        }

        date_default_timezone_set('EST');

        // submits which are exclusive to logged in users
        if($logged_in) {
                if(isset($_POST['blogtitle']) && isset($_POST['blogcontent'])) { // NEW POST SUBMISSION
                        $new_title_core = date("Y-m-d_") . str_replace(' ', '-', $_POST['blogtitle']);
                        $url_filepath = "../blog/index.php?post=" . basename(urlencode($new_title_core)); // urlencode for inline link usage
                        $new_title = '../blog/posts/' . $new_title_core . '.php';
                        
                        $new_post = '';
                        $new_post .= '        <div class="blogpost">' . PHP_EOL;
                        $new_post .= '                <a href="' . $url_filepath . '"><h2 id="inlineElement">' . $_POST['blogtitle'] . '</h2></a>' . PHP_EOL;
                        $new_post .= '                <p>Posted: ' . date("Y-m-d") . '</p>' . PHP_EOL;
                        $new_post .= $_POST['blogcontent'] . PHP_EOL;
                        $new_post .= '        </div>' . PHP_EOL;

                        if(!InsertBlogPostIntoDatabase($logged_in, $mysqli, $_POST['blogtitle'], $new_title_core, $new_post)) {
                                $notice_to_display = "<p>Failed to make blog post.</p>";
                                return;
                        }

                        $notice_to_display = "<p>Successfully made blog post. It is available at <a href=\"$url_filepath\" target=\"_blank\">this link</a>.</p>";
                }
        }

?>