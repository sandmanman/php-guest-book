<?php

	define('URL_PATH', '/');
    define('APP_PATH', dirname(__FILE__));

    include APP_PATH.'/config.php';
    include APP_PATH.'/mysql.class.php';

    // 实例DBHelper
    $dbhelper = new DBHelper(); 

?>
