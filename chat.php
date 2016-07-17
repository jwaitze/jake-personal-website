 <?php
	
	if(!isset($page_title)) {
		header("Location: chat");
		exit();
	}

?>
           <div id="openBody"><a href="#">o</a></div>
            <div id="mainBody">
                <h2 id="inlineElement">IRC</h2><div id="closeBody"><a href="#">x</a></div>
                <iframe id="chatFrame" src="http://kiwiirc.com/client/irc.traject.io:+6697/main/" width="100%" height="750px"></iframe>
                <p>Server: irc.traject.io</p>
                <p>Port: 6667 (6697 SSL)</p>
                <p>Channel: #main</p>
            </div>
            <script src="../js/AreYouSureYouWantToLeave.js"></script>