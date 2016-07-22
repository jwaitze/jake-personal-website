<?php

        function InsertBlogPost($mysqli, $title, $urlkey, $content, $author) {
                $stmt = $mysqli->prepare("INSERT INTO `blogposts` (`title`, `urlkey`, `content`, `author`) VALUES (?, ?, ?, ?)");
                $stmt->bind_param('ssss', $title, $urlkey, $content, $author);
                $stmt->execute();

                $retval = false;

                if($stmt->affected_rows > 0)
                        $retval = true;

                $stmt->close();
                
                return $retval;
        }

        function UpdateBlogPost($mysqli, $urlkey, $content) {

                $stmt = $mysqli->prepare("UPDATE blogposts SET content = ? WHERE urlkey = ? LIMIT 1");
                $stmt->bind_param('ss', $content, $urlkey);
                $stmt->execute();

                $retval = false;

                if($stmt->affected_rows > 0)
                        $retval = true;

                $stmt->close();
                
                return $retval;
        }

        function GetAllPostDataByUrlKey($mysqli, $urlkey) {
                $stmt = $mysqli->prepare("SELECT title,content,author FROM blogposts WHERE urlkey = ? LIMIT 1");
                $stmt->bind_param('s', $urlkey);
                $stmt->execute();

                $retval = array();

                if($result = $stmt->get_result()) {
                        $row = mysqli_fetch_array($result);
                        $retval = $row;
                        $result->close();
                }

                $stmt->close();

                return $retval;
        }

        function GetStoredPostsByRange($mysqli, $start, $amount) {

                $stmt = $mysqli->prepare("SELECT title,content,author,urlkey FROM blogposts ORDER BY urlkey DESC LIMIT ?, ?");
                $stmt->bind_param('ii', $start, $amount);
                $stmt->execute();

                $retval = array();
                if($result = $stmt->get_result()) {
                        while($row = mysqli_fetch_array($result))
                                array_push($retval, $row);

                        $result->close();
                }

                $stmt->close();

                return $retval;
        }

        function GetStoredPostsCount($mysqli) {
                if($result = $mysqli->query("SELECT COUNT(*) FROM blogposts")) {
                        while($row = mysqli_fetch_array($result)) {
                                foreach($row as $value) {
                                        if($value) {
                                                $result->close();
                                                return $value;
                                        }
                                }
                        }

                        $result->close();
                }

                return 0;
        }

        function DeletePostByURLKey($mysqli, $urlkey) {

                $stmt = $mysqli->prepare("DELETE FROM blogposts WHERE urlkey = ? LIMIT 1");
                $stmt->bind_param('s', $urlkey);
                $stmt->execute();

                $retval = false;

                if($stmt->affected_rows > 0)
                        $retval = true;

                $stmt->close();
                
                return $retval;
        }

        function GetStoredPassword($mysqli, $username) {

                $stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ? LIMIT 1");
                $stmt->bind_param('s', $username);
                $stmt->execute();

                if($result = $stmt->get_result()) {
                        $row = mysqli_fetch_array($result);
                        $retval = $row['password'];
                        $result->close();
                        $stmt->close();
                        return $retval;
                }

                $stmt->close();

                session_unset();
                return "";
        }

        function OutputBlogPost($title, $urlkey, $content, $author, $isRecentPost) {
                echo '
        <div class="blogpost">
                <a href="../blog/index.php?post=';
                echo urlencode($urlkey);
                echo '"><h2 id="inlineElement">';
                echo $title;
                echo '</h2></a>
                <p>Posted: ';
                echo substr(urldecode($urlkey), 0, 10);
                echo '</p>';

                $processed_content = $content;
                if($isRecentPost)
                        $processed_content = substr($content, 0, 790);

                echo $processed_content;

                if($processed_content != $content) {
                        echo ' . . .';
                        echo '<a class="readMore" href="#"><p>Read More</p></a>';
                }

                echo '        </div>';
        }

?>