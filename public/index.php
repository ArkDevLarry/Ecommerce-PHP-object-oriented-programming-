<?php

session_start();

$path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path = str_replace('index.php', '', $path);
define('ROOT', $path);
define('ASSET', $path.'assets/');

$retUrl = urlencode($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
define('RETURL', $retUrl);

include "../app/init.php";

$app = new App();