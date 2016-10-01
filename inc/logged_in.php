<?php

  if(!isset($page_name)) { // redirect to subdirectory if visited directly
    header("Location: ../login");
    exit();
  }

?>

<h2 id="inlineElement">Account</h2>
<p>Features</p>
<ul>
  <li class="textUnderline"><a href="../blogpost">Make a new blog post</a></li>
  <li class="textUnderline"><a href="http://webmail.waitze.net/" target="_blank">Check your email</a></li>
</ul>
