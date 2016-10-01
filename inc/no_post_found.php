<?php

	if(!isset($page_name)) { // redirect to subdirectory if visited directly
		header("Location: ../blog");
		exit();
	}

?>

<h2 id="inlineElement">Error</h2>
<p>No such post was found.</p>
