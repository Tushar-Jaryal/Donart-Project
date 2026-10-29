<?php 
ini_set("display_errors", getenv("APP_DEBUG") ? 1 : 0);

function split_url()
{
	$url = isset($_GET['url']) ? $_GET['url'] : "home";
	$url = explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL));

	return $url;
}

//create root variable
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== "off") || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") ? "https" : "http";
$root = $scheme . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$root = trim(str_replace("index.php", "", $root),"/");

define("ROOT", $root . "/");

$URL = split_url();

if(file_exists($URL[0] . ".php")){
	require($URL[0] . ".php");
}else{

	http_response_code(404);
	require("404.php");
}
