<?php

	if(!isset($page_name)) { // redirect to subdir if visited directly
		header("Location: ../home");
		exit();
	}

	session_start();

	if(isset($_GET['logout'])) {
		setcookie(session_name(), '', 100);
		session_unset();
		session_destroy();
		return;
	}

	if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
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

	} else if(isset($_POST['username']) && isset($_POST['password'])) {
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