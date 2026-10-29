<?php

// Demo mode: one-click login as a sample user, and a database that resets itself
// every DEMO_RESET_HOURS so visitors always see the same starting data.

define("DEMO_EMAIL", "demo@donart.app");
define("DEMO_PASSWORD", "demo1234");

function demo_mode(){

	$value = strtolower((string)getenv("DEMO_MODE"));
	return in_array($value, array("1","true","yes","on"), true);
}

function is_demo_account($userid){

	if(!demo_mode()){
		return false;
	}

	$DB = new Database();
	$userid = addslashes($userid);
	$row = $DB->read("select email from users where userid = '$userid' limit 1");

	return is_array($row) && $row[0]['email'] == DEMO_EMAIL;
}

function demo_login(){

	$DB = new Database();
	$row = $DB->read("select userid from users where email = '" . DEMO_EMAIL . "' limit 1");

	if(is_array($row)){
		$_SESSION['mybook_userid'] = $row[0]['userid'];
		return true;
	}

	return false;
}

function demo_reset_database(){

	$dir = dirname(__DIR__);
	$conn = (new Database())->connect();

	foreach (array("schema.sql","seed.sql") as $file) {

		$sql = file_get_contents($dir . "/database/" . $file);
		if(!mysqli_multi_query($conn, $sql)){
			return false;
		}

		// flush every result so the connection is usable again
		do {
			if($result = mysqli_store_result($conn)){
				mysqli_free_result($result);
			}
		} while (mysqli_more_results($conn) && mysqli_next_result($conn));
	}

	// remove files uploaded by visitors, keep the bundled demo images
	foreach (glob($dir . "/uploads/*", GLOB_ONLYDIR) as $folder) {

		if(basename($folder) == "demo"){
			foreach (glob($folder . "/*_thumb.jpg") as $thumb) {
				@unlink($thumb);
			}
			continue;
		}

		foreach (glob($folder . "/*") as $file) {
			@unlink($file);
		}
		@rmdir($folder);
	}

	return true;
}

function demo_maybe_reset(){

	if(!demo_mode()){
		return;
	}

	$hours = (float)(getenv("DEMO_RESET_HOURS") !== false ? getenv("DEMO_RESET_HOURS") : 24);
	if($hours <= 0){
		return;
	}

	$stamp = dirname(__DIR__) . "/uploads/.demo_reset";
	if(file_exists($stamp) && filemtime($stamp) > time() - $hours * 3600){
		return;
	}

	$lock = fopen($stamp . ".lock", "c");
	if(!$lock || !flock($lock, LOCK_EX | LOCK_NB)){
		return;
	}

	clearstatcache();
	if(!file_exists($stamp) || filemtime($stamp) <= time() - $hours * 3600){

		if(demo_reset_database()){
			touch($stamp);
		}
	}

	flock($lock, LOCK_UN);
	fclose($lock);
}

function demo_banner(){

	if(!demo_mode()){
		return;
	}

	$hours = getenv("DEMO_RESET_HOURS") !== false ? (float)getenv("DEMO_RESET_HOURS") : 24;
	$reset = $hours > 0 ? " Changes are wiped every " . ($hours == 1 ? "hour" : rtrim(rtrim(number_format($hours, 1), "0"), ".") . " hours") . "." : "";

	echo "<div style='position:relative;z-index:10;background:#fff3cd;color:#664d03;border-bottom:1px solid #ffe69c;padding:8px 12px;text-align:center;font-family:sans-serif;font-size:14px;'>
		You're viewing a demo of Donart with sample data. Feel free to post, like, message and create groups.$reset
	</div>";
}
