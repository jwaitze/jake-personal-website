<?php

	function GetStoredPassword($mysqli, $username) {

		$query_username = $mysqli->real_escape_string($username);

		$stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ? LIMIT 1");
		$stmt->bind_param('s', trim($query_username));
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

	session_start();

	if(isset($_GET['logout'])) {
		setcookie(session_name(), '', 100);
		session_unset();
		session_destroy();
		return;
	}

	if($_SESSION['username'] && $_SESSION['password']) {
		// check current session
		$stored_password = GetStoredPassword($mysqli, $_SESSION['username']);
		if($stored_password == "")
			return;

		if($stored_password == $_SESSION['password']) {
			$logged_in = true;
			$logged_in_as = $_SESSION['username'];
			return;
		}
		
		session_unset();

	} else if($_POST['username'] && $_POST['password']) {
		// process new login
		$stored_password = GetStoredPassword($mysqli, $_POST['username']);
		if($stored_password == "") // no such user
			return;
		
		// salted hashes not plain text
		$check_password = trim(hash('sha512', $_POST['password'] . $_POST['password'] . "`^salt^`"));
		if($stored_password == $check_password) {
			$_SESSION['username'] = trim($_POST['username']);
			$_SESSION['password'] = $check_password;
			$logged_in = true;
			$logged_in_as = $_POST['username'];
			return;
		}
		
		session_unset();
	}

?>