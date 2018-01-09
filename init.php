<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT','E:' .DS .'xampp' .DS .'htdocs' .DS.'Imperial');


require_once("config.php");
require_once("database.php");
require_once("db_objects.php");
require_once("users.php");
require_once("sessions.php");
// require_once("members.php");
require_once("photo.php");
require_once("user_update.php");
require_once("user_photo.php");
require_once("fetch.php");
require_once("add_member.php");


?>