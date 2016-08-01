<?php
define('DEBUG', ture);
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', 'xc');
define('DB_NAME', 'letter');
define('GB_TABLE_NAME', 'guestbook');
define('ADMIN_TABLE_NAME', 'User');
define('PER_PAGE_GB', 5);

if (DEBUG) {
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
}
/**end of file**/