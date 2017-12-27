<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('DS') ? null : define('SITE_ROOT', DS .'E' .DS .'xampp' .DS .'htdocs' .DS.'Imperial');


require_once("config.php");
require_once("database.php");
require_once("db_objects.php");
require_once("users.php");
require_once("sessions.php");
require_once("members.php");

?>