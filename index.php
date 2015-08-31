<?php
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define('SLBBS_ROOT',$_SERVER['HTTP_HOST']);
define('APP_DEBUG',True);
define('APP_PATH','./Application/');
require './Framework/ThinkPHP.php';
