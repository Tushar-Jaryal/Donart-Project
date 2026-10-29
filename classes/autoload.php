<?php 
	
	session_start();

	include("classes/connect.php");
	include("classes/functions.php");
	include("classes/login.php");
	include("classes/user.php");
	include("classes/post.php");
 	include("classes/image.php");
 	include("classes/profile.php");
 	include("classes/settings.php");
 	include("classes/time.php");
 	include("classes/messages.php");
 	include("classes/group.php");
 	include("classes/demo.php");

 	demo_maybe_reset();

 	if(!defined("ROOT")){

 		//create root variable
		$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== "off") || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") ? "https" : "http";
		$root = $scheme . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		$root = trim(str_replace("router.php", "", $root),"/");

		define("ROOT", $root . "/");

		$URL = split_url2();

 	}
