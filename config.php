<?php

    session_start();


    // 配置
    define( 'DB_HOST', 'localhost' ); // 服务器地址
    define( 'DB_USER', 'root' ); // 数据库用户名
    define( 'DB_PWD', 'root' ); // 数据库密码
    define( 'DB_NAME', 'guestbook' ); // 数据库名

    define( 'GB_TABLE_NAME', 'gb_guestbook' ); // 留言表
    define( 'REPLY_TABLE_NAME', 'gb_reply' ); // 回复表
    define( 'ADMIN_TABLE_NAME', 'gb_user' ); // 用户表

    date_default_timezone_set('Asia/Shanghai');

