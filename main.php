<?php

    // 应用目录为当前目录
	define('APP_PATH', __DIR__.'/');

	// 网站根URL
	define('APP_URL', 'http://localhost/fastphp');

    // 开启调试模式
	define('APP_DEBUG', true);

    include APP_PATH.'/config.php';
    include APP_PATH.'/mysql.class.php';

    // 实例DBHelper
    $dbhelper = new DBHelper(); 


