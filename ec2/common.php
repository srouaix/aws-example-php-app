<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
putenv('HOME=/var/www/html');

require 'aws-autoloader.php';

date_default_timezone_set('UTC');

?>