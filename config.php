<?php


    define( 'DEBUG', true );

    // 配置
    define( 'DB_HOST', 'localhost' ); // 服务器地址
    define( 'DB_USER', 'root' ); // 数据库用户名
    define( 'DB_PWD', 'root' ); // 数据库密码
    define( 'DB_NAME', 'guestbook' ); // 数据库名

    define( 'GB_TABLE_NAME', 'gb_guestbook' ); // 留言表 表名
    define( 'ADMIN_TABLE_NAME', 'gb_user' ); // 用户表 表名

    // 调试用，类似与某些框架的几种模式，生产环境，产品环境
    if ( DEBUG ) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL); // 报告所有错误
        //error_reporting(0); // 禁用报告错误
    }
?>
