<?php

	function GetStoredPassword($username) {
		global $mysqli;
		if($result = $mysqli->query("SELECT password FROM users WHERE username = '" . trim($username) . "' LIMIT 1;")) {
			$row = mysqli_fetch_array($result);
			$retval = $row['password'];
			$result->close();
			return $retval;
		}

		session_unset();
		return "";
	}

	if(isset($_GET['logout'])) {
		session_unset();
		return;
	}

	session_start();

	if($_SESSION['username'] && $_SESSION['password']) {
		// check current session
		$stored_password = GetStoredPassword($_SESSION['username']);
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
		$stored_password = GetStoredPassword($_POST['username']);
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