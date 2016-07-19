<?php

	function InsertBlogPostIntoDatabase($logged_in, $mysqli, $title, $urlkey, $content) {
                if(!$logged_in)
                        return false;

                $stmt = $mysqli->prepare("INSERT INTO `blogposts` (`title`, `urlkey`, `content`) VALUES (?, ?, ?)");
                $stmt->bind_param('sss', $title, $urlkey, $content);
                $stmt->execute();

                if($stmt->affected_rows > 0)
                        return true;

                $stmt->close();
                
                return false;
        }

        function GetStoredPostsByRange($mysqli, $start, $amount) {

                $stmt = $mysqli->prepare("SELECT content FROM blogposts ORDER BY urlkey DESC LIMIT ?, ?");
                $stmt->bind_param('ii', $start, $amount);
                $stmt->execute();

                $retval = array();
                if($result = $stmt->get_result()) {
                        while($row = mysqli_fetch_array($result))
                                array_push($retval, $row['content']);

                        $result->close();
                }

                $stmt->close();

                return $retval;
        }

        function GetBlogPostByUrlKeyFromDatabase($mysqli, $urlkey) {
                $stmt = $mysqli->prepare("SELECT content FROM blogposts WHERE urlkey = ? LIMIT 1");
                $stmt->bind_param('s', $urlkey);
                $stmt->execute();

                if($result = $stmt->get_result()) {
                        $row = mysqli_fetch_array($result);
                        $retval = $row['content'];
                        $result->close();
                        $stmt->close();
                        return $retval;
                }

                $stmt->close();

                return "";
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

        function GetPostByURLKey($mysqli, $urlkey) {

                $stmt = $mysqli->prepare("SELECT content FROM blogposts WHERE urlkey = ? LIMIT 1");
                $stmt->bind_param('s', $urlkey);
                $stmt->execute();

                if($result = $stmt->get_result()) {
                        while($row = mysqli_fetch_array($result)) {
                                if($row['content']) {
                                        $result->close();
                                        $stmt->close();
                                        return $row['content'];
                                }
                        }

                        $result->close();
                }

                $stmt->close();

                return "";
        }

        function GetStoredPassword($mysqli, $username) {

                $stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ? LIMIT 1");
                $stmt->bind_param('s', trim($username));
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

?>