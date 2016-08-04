<?php

    // 管理员登录

    require_once '../config.php';
    require_once '../mysql.class.php';

    $dbhelper = new DBHelper(); // 实例化DBHelper

    $username = $_POST['username'];
    $password = $_POST['password'];



    // 查询密码及用户名
    $sql_login = 'SELECT password FROM '.ADMIN_TABLE_NAME.' WHERE level=1 AND nickname='."'$username'";
    $sql_password = $dbhelper -> execute_dml($sql_login);
    $dbhelper -> close_dbc();

    print_r($sql_password);

    if ( empty($username) && empty($password) ) {
        echo '用户名或密码错误';
    }

    if ( md5($password) === $sql_password[0]['password'] ) {
        //echo '登录成功';
        session_start();
        $_SESSION['login'] = true;
        header("Location: admin.php");
    } else {
        //echo '用户名或密码错误';
        header("Location: index.html");
    }

?>
