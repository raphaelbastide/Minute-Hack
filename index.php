<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title>Minute Hack</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="font/stylesheet.css" />
		<link rel="icon" type="image/gif" href="favicon.gif" />
	</head>
	<body>
		<h1>Minute Hack</h1>
		<form class="make" method="post" action="files/make.php">
			<input type="title" required name="title" class="input" placeholder="Project title">
			<div class="switch">
				<input type="radio" name="php" value="no" id="php_no" class="switch-input">
				<label for="php_no" class="switch-label">HTML</label>
				<input type="radio" name="php" value="yes" id="php_yes" class="switch-input" checked>
				<label for="php_yes" class="switch-label">PHP</label>
			</div>
			<div class="switch c3">
				<input type="radio" name="css" value="css" id="css" class="switch-input" checked>
				<label for="css" class="switch-label">CSS</label>
				<input type="radio" name="css" value="css_tools" id="css_tools" class="switch-input">
				<label for="css_tools" class="switch-label">CSS + tools</label>
				<input type="radio" name="css" value="stylus" id="stylus" class="switch-input">
				<label for="stylus" class="switch-label">stylus</label>
			</div>
			<div class="switch c3">
				<input type="radio" name="js" value="no_js" id="js" class="switch-input" checked>
				<label for="js" class="switch-label">no JS</label>
				<input type="radio" name="js" value="plain_js" id="plain_js" class="switch-input">
				<label for="plain_js" class="switch-label">plain JS</label>
				<input type="radio" name="js" value="jquery" id="jquery" class="switch-input">
				<label for="jquery" class="switch-label">JS + jQuery</label>
			</div>
			<div class="switch">
				<input type="radio" name="readme" value="no" id="readme_no" class="switch-input">
				<label for="readme_no" class="switch-label">no README.md</label>
				<input type="radio" name="readme" value="yes" id="readme_yes" class="switch-input" checked>
				<label for="readme_yes" class="switch-label">README.md</label>
			</div>
			<input type="submit" value="DOWNLOAD" class="button swing">
		</form>
		<p><a href="https://github.com/raphaelbastide/Minute-Hack">About</a></p>
	</body>
</html>
