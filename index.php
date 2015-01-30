<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title>Minute Hack</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="icon" type="image/gif" href="favicon.gif" />
	</head>
	<body>
		<h1>Minute Hack</h1>
		<form class="make" method="post" action="files/make.php">
			<input type="title" required name="title" class="input" placeholder="Project title">
			<div class="switch c3">
				<input type="radio" name="css" value="css" id="css" class="switch-input" checked>
				<label for="css" class="switch-label">CSS</label>
				<input type="radio" name="css" value="css_tools" id="css_tools" class="switch-input">
				<label for="css_tools" class="switch-label">CSS + tools</label>
				<input type="radio" name="css" value="stylus" id="stylus" class="switch-input">
				<label for="stylus" class="switch-label">stylus</label>
			</div>
			<div class="switch">
				<input type="radio" name="php" value="yes" id="php_yes" class="switch-input" checked>
				<label for="php_yes" class="switch-label">PHP</label>
				<input type="radio" name="php" value="no" id="php_no" class="switch-input">
				<label for="php_no" class="switch-label">HTML</label>
			</div>
			<div class="switch">
				<input type="radio" name="js" value="yes" id="js_yes" class="switch-input" checked>
				<label for="js_yes" class="switch-label">JS</label>
				<input type="radio" name="js" value="no" id="js_no" class="switch-input">
				<label for="js_no" class="switch-label">No JS</label>
			</div>
			<div class="switch">
				<input type="radio" name="jquery" value="yes" id="jquery_yes" class="switch-input" checked>
				<label for="jquery_yes" class="switch-label">jQuery</label>
				<input type="radio" name="jquery" value="no" id="jquery_no" class="switch-input">
				<label for="jquery_no" class="switch-label">Nope</label>
			</div>
			<input type="submit" value="Make it!" class="button">
		</form>
		<p><a href="https://github.com/raphaelbastide/Minute-Hack">About</a></p>
	</body>
</html>
