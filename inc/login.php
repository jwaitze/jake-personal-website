<?php

  if (!isset($page_name)) { // redirect to subdirectory if visited directly
    header("Location: ../login");
    exit();
  }

  if ($logged_in) {
    include_once("logged_in.php");
    return;
  }

  if ($failed_login)
    echo '<p>Failed login attempt.</p>';

  if ($failed_captcha)
    echo '<p>Bad captcha input.</p>';

?>

<h2 id="inlineElement">Login</h2>
<div class="loginForm">
  <form name="login" action="index.php" method="post" accept-charset="utf-8">
		<ul>
			<li>
				<label for="username">Username:</label>
				<input type="username" name="username" placeholder="username" required />
			</li>
			<li>
				<label for="password">Password:</label>
				<input type="password" name="password" placeholder="password" required />
			</li>
      <li>
        <label for="captcha">Captcha:</label>
        <input type="text" name="captcha_code" placeholder="captcha" maxlength="6" />
      </li>
			<li><input type="submit" value="Login"></li>
		</ul>
	</form>
  <p><a href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false">[ Different Captcha ]</a></p>
  <img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image" />
</div>
