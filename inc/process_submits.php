<?php

        if(!isset($page_name)) { // redirect to subdirectory if visited directly
                header("Location: ../login");
                exit();
        }

        date_default_timezone_set('EST');

        // submits which are exclusive to logged in users
        if($logged_in) {
                if(isset($_GET['blogedit']) && isset($_POST['blogpostkey'])) {
                        echo GetBlogPostByUrlKeyFromDatabase($mysqli, "2016-07-18_Hello,-World.-My-First-Personal-Website-Blog-Post");
                        die("test");
                } else if(isset($_POST['blogtitle']) && isset($_POST['blogcontent'])) { // NEW POST SUBMISSION
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