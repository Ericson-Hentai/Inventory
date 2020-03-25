<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$isSecure = false;
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
	$isSecure = true;
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
	$isSecure = true;
}

$REQUEST_PROTOCOL = $isSecure ? 'https://' : 'http://';

// for activity log
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['SERVER_NAME'] . $_SERVER['REMOTE_ADDR'];

// name of project
$Projectname = dirname(__DIR__);
$Projectname = explode('\\', $Projectname);
$Projectname = $Projectname[5];

$Projectname2 = dirname(__DIR__);
$Projectname2 = explode('\\', $Projectname2);
$Projectname2 = $Projectname2[3];


// path for app/
define("direction", "".$REQUEST_PROTOCOL."".$_SERVER['HTTP_HOST']."/".$Projectname2."");







// path for library
define("asset", "".$REQUEST_PROTOCOL."".$_SERVER['HTTP_HOST']."/".$Projectname2."/public/resources");










// path for includes e.g. header and footer
define("util", realpath(dirname(__DIR__) . '/app/Controller/utils.php'));

// // path for layouts e.g. contents
// define("index", realpath(dirname(__DIR__, 1) . '/public/'));

