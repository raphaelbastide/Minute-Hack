<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title>Minute Hack</title>
		<link rel="stylesheet" type="text/css" href="../css/main.css" />
	</head>
	<body>
		<div class="make">
	<?php
	// First delete previous session’s files
	unlink('MinuteHack.zip');

	/* creates a compressed zip file */
	function create_zip($files = array(),$destination = '',$overwrite = false) {
		//if the zip file already exists and overwrite is false, return false
		if(file_exists($destination) && !$overwrite) {
			echo 'A file already exist.';
			return false;
		}
		//vars
		$valid_files = array();
		//if files were passed in...
		if(is_array($files)) {
			//cycle through each file
			foreach($files as $file) {
				//make sure the file exists
				if(file_exists($file)) {
					$valid_files[] = $file;
				}
			}
		}
		//if we have good files...
		if(count($valid_files)) {
			$zip = new ZipArchive();
			if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
				return false;
			}
			foreach($valid_files as $file) {
				$zip->addFile($file,$file);
			}
			echo '<p>Succes!</p> <br> <a class="button" href="MinuteHack.zip">Download</a>';
			$zip->close();
			return file_exists($destination);
		}else{
			return false;
			echo '<p>Invalid files :/</p>';
		}
	}
	// Form vars
	$title = $_POST["title"];
	$css = $_POST["css"];
	$php = $_POST["php"];
	$js = $_POST["js"];
	$jquery = $_POST["jquery"];

	// Insert text into files function
	$key_title = '<meta charset=utf-8 />';
	$custom_title = '		<title>'.$title.'</title>';
	$key_css = '<meta charset=utf-8 />';
	if ($css === "css") {
		$custom_css = '		<link rel="stylesheet" type="text/css" href="css/main.css" />';
	}else if ($css === "css_tools"){
		$custom_css = '		<link rel="stylesheet" type="text/css" href="css/tools.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />';
	}else if ($css === "stylus"){
		$custom_css = '		<link rel="stylesheet" type="text/css" href="css/main.styl" />';
	}
	$key_js = '</body>';
	if ($jquery === "yes") {
		$custom_js = '	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>';
	}else if($js === "yes"){
		$custom_js = '	<script type="text/javascript" src="js/main.js"></script>';
	}else{
		$custom_js = '';
	}
	$file = "neutral.txt";
	if ($php === 'yes') {
		$newfile = 'index.php';
	}else{
		$newfile = 'index.html';
	}
	copy($file, $newfile) or exit("failed to copy $file");
	$fc = fopen ($file, "r");
	while (!feof ($fc)){
		$buffer = fgets($fc, 4096);
		$lines[] = $buffer;
	}
	fclose ($fc);
	$f=fopen($newfile,"w") or die("<p>couldn't open $file</p>");
	foreach($lines as $line){
		fwrite($f,$line); //place $line back in file
		if (strstr($line,$key_title)){
			fwrite($f,$custom_title."\n");
		}
		if (strstr($line,$key_css)){
			fwrite($f,$custom_css."\n");
		}
		if (strstr($line,$key_js)){
			fwrite($f,$custom_js."\n");
		}
	}
	fclose($f);

	$files = array();
	if ($css === 'css') {
		array_push($files, 'css/main.css');
	}else if ($css === 'css_tools'){
		array_push($files, 'css/main.css');
		array_push($files, 'css/tools.css');
	}else if ($css === 'stylus'){
		array_push($files, 'css/main.styl');
		array_push($files, 'css/utils.styl');
	}
	if ($php === 'yes') {
		array_push($files, 'index.php');
	}else{
		array_push($files, 'index.html');
	}
	if ($js === 'yes') {
		array_push($files, 'js/main.js');
	}
	if ($jquery === 'yes') {
		array_push($files, 'js/jquery-1.11.2.min.js');
	}
	//if true, good; if false, zip creation failed
	$result = create_zip($files,'MinuteHack.zip');
	?>
		<br>
		<p><a href="../">Back</a></p>
	</div>
	</body>
</html>
