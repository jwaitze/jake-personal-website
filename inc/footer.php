<?php
	
	if(!isset($page_title)) { // redirect to home if visited directly
		header("Location: ../home");
		exit();
	}

?>
			</div>
		</div>
		<div class="mainFooter">
<?php

	if($logged_in)
		echo "<span class=\"loginFooter\">Logged in as: $logged_in_as | <a href=\"?logout\">Logout</a></span>";
	else
		echo "<span class=\"loginFooter\"><a href=\"../login\">Login</a></span>";

?>
	<span class="privacyFooter">2016 | <a href="../privacy-policy">Privacy Policy</a></span></div>

		<!-- StatCounter -->
	    <script src="../js/statcounter.js"></script>
	    <noscript><div class="statcounter"><a title="shopify stats"
	    href="http://statcounter.com/shopify/" target="_blank"><img
	    class="statcounter"
	    src="//c.statcounter.com/11030518/0/80026339/1/"
	    alt="shopify stats"></a></div></noscript>
	    <!-- StatCounter -->

		<script src="../js/three.min.js"></script>
		<script src="../js/Projector.js"></script>
		<script src="../js/CanvasRenderer.js"></script>
		<script src="../js/Bird.js"></script>
		<script src="../js/Boid.js"></script>
		
		<script src="../js/addHidden.js"></script>
		<script src="../js/main.js"></script>
	</body>
</html>
