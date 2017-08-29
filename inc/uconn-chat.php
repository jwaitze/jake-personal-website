<?php

	if(!isset($page_name)) { // redirect to subdirectory if visited directly
		header("Location: ../uconn-chat");
		exit();
	}

?>

<h2 id="inlineElement">UConn Chatroom</h2>
<iframe id="chatFrame" src="http://kiwiirc.com/client/irc.traject.io:+6697/uconn/" width="100%" height="750px"></iframe>
<p>Server: irc.traject.io</p>
<p>Port: 6667 (6697 SSL)</p>
<p>Channel: #uconn</p>
<script src="../js/AreYouSureYouWantToLeave.js"></script>
