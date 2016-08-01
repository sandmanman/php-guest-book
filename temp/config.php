<?php

/*
 *
 * 配置文件
 *
*/
define('DEBUG', ture);
define('DB_HOST', 'localhost'); // 主机地址
define('DB_USER', 'root'); // 登录名
define('DB_PWD', 'xc'); // 密码
define('DB_NAME', 'letter'); // 数据库名
define('GB_TABLE_NAME', 'guestbook'); // 数据表名
define('ADMIN_TABLE_NAME', 'User'); // 数据表名
define('PER_PAGE_GB', 5); // 每页显示几条数据

if (DEBUG) {
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
}
/**end of file**/
