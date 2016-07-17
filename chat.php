<?php
	
	if(!isset($page_title)) { // redirect to subdirectory if visited directly
		header("Location: chat");
		exit();
	}

?>
                <h2 id="inlineElement">IRC</h2>
                <iframe id="chatFrame" src="http://kiwiirc.com/client/irc.traject.io:+6697/main/" width="100%" height="750px"></iframe>
                <p>Server: irc.traject.io</p>
                <p>Port: 6667 (6697 SSL)</p>
                <p>Channel: #main</p>
                <script src="../js/AreYouSureYouWantToLeave.js"></script>