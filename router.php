<?php
// Router for PHP's built-in server: php -S localhost:8000 router.php
// Mirrors the .htaccess rewrite used under Apache.
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if($path !== "/" && file_exists(__DIR__ . $path) && !is_dir(__DIR__ . $path)){
	return false;
}
$_GET['url'] = ltrim($path, "/");
$_SERVER['PHP_SELF'] = "/index.php";
require __DIR__ . "/index.php";
