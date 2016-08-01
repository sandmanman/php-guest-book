<?php
/*
 * 连接数据库封装
*/
class DB {
	static $_connect = null;

	static function connect() {
		if (!self::$_connect) {
			$conn = mysql_connect(DB_HOST, DB_USER, DB_PWD);
			if ($conn) {
				mysql_select_db(DB_NAME, $conn);
				mysql_query("set names 'utf8'");
				self::$_connect = $conn;
			} else {
				exit('database error');
			}
		}

		return self::$_connect;
	}

    // mysql_real_escape_string()对数据中的 单引号,双引号进行转义,也就是防止sql注入
    // mysql_real_escape_string()考虑到连接的当前字符集
	static function cleanSql($sql) {
		return mysql_real_escape_string($sql);
	}

    // 关闭数据库的连接
	static function close() {
		if (self::$_connect) {
			mysql_close(self::$_connect);
		}
	}
}
