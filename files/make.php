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

	// Form vars
	$title = $_POST["title"];
	$css = $_POST["css"];
	$php = $_POST["php"];
	$js = $_POST["js"];
	$readme = $_POST["readme"];

	// First delete previous session’s files
	array_map('unlink', glob("*.zip"));

	// Slugify
	function slugify($text){
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		$text = trim($text, '-');
		if (function_exists('iconv')){
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		}
		$text = strtolower($text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		if (empty($text)){
			return 'n-a';
		}
		return $text;
	}

	// Create the new title
	$slug_title = slugify($title).'.zip';

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

		//if we have good files, build the zip
		if(count($valid_files)) {
			$zip = new ZipArchive();
			if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
				return false;
			}
			foreach($valid_files as $file) {
				$zip->addFile($file,$file);
			}
			global $slug_title;
			echo '<p>Succes!</p> <br> <a class="button" href="'.$slug_title.'">Download</a>';
			$zip->close();
			return file_exists($destination);
		}else{
			return false;
			echo '<p>Invalid files :/</p>';
		}
	}


	// Insert text into files function
	$key_title = '<meta charset=utf-8 />';
	$custom_title = '		<title>'.$title.'</title>';
	$key_css = '<meta charset=utf-8 />';
	// CSS
	$link_css = '<link rel="stylesheet" type="text/css" href="css/main.css" />';
	$link_css_tools = '<link rel="stylesheet" type="text/css" href="css/tools.css" />';
	$link_stylus = '<link rel="stylesheet" type="text/css" href="css/main.styl" />';
	// JS
	$js_tag = '<script type="text/javascript" src="js/main.js"></script>';
	$jquery_tag = '<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>';
	function insert_content($original_file, $target_file, $marker, $content){
		$data = file_get_contents($original_file);
		$newdata = str_replace($marker, $content, $data);
		file_put_contents($target_file, $newdata);
	}

	// HTML or PHP
	insert_content('neutral-HTML.txt', 'index.html', '!!title!!', $title);
	// README
	if ($readme === 'yes'){
		insert_content('neutral-README.txt', 'README.md', '!!title!!', $title);
	}
	// CSS
	if ($css === 'css'){
		insert_content('index.html', 'index.html', '!!css!!', $link_css);
	}else if ($css === 'css_tools') {
		insert_content('index.html', 'index.html', '!!css!!', $link_css_tools.'
		'.$link_css);
	}else if ($css === 'stylus'){
		insert_content('index.html', 'index.html', '!!css!!', $link_stylus);
	}else{
		insert_content('index.html', 'index.html', '!!css!!', '');
	}
	// JS or jQuery
	if ($js === 'plain_js'){
		insert_content('index.html', 'index.html', '!!script!!', $js_tag);
	}else if ($js === 'jquery') {
		insert_content('index.html', 'index.html', '!!script!!', $jquery_tag.'
	'.$js_tag);
	}else{
		insert_content('index.html', 'index.html', '!!script!!', '');
	}


	// Insert the files in the zip file
	$files = array();
	// CSS
	if ($css === 'css') {
		array_push($files, 'css/main.css');
	}else if ($css === 'css_tools'){
		array_push($files, 'css/main.css');
		array_push($files, 'css/tools.css');
	}else if ($css === 'stylus'){
		array_push($files, 'css/main.styl');
		array_push($files, 'css/utils.styl');
	}
	// PHP
	if ($php === 'yes') {
		rename('index.html','index.php');
		array_push($files, 'index.php');
	}else{
		array_push($files, 'index.html');
	}
	// JS
	if ($js === 'plain_js') {
		array_push($files, 'js/main.js');
	}else if ($js === 'jquery') {
		array_push($files, 'js/main.js');
		array_push($files, 'js/jquery-1.11.2.min.js');
	}else{
		// do nothing
	}
	// README
	if ($readme === 'yes') {
		array_push($files, 'README.md');
	}
	//if true, good; if false, zip creation failed
	$result = create_zip($files, slugify($title).'.zip');

	?>
		<br>
		<p><a href="../">Back</a></p>
	</div>
	</body>
</html>
