<?php

    // 管理员登录

    require_once '../main.php';

    $dbhelper = new DBHelper(); // 实例化DBHelper

    $username = $_POST['username'];
    $password = $_POST['password'];



    // 查询密码及用户名
    $sql_login = 'SELECT password FROM '.ADMIN_TABLE_NAME.' WHERE level=1 AND nickname='."'{$username}'";
    $row = $dbhelper -> execute_dml($sql_login);
    $dbhelper -> close_dbc();

    var_dump($row);

    if ( empty($username) && empty($password) ) {
        echo '用户名或密码错误';
    }

    if ( md5($password) === $row[0]['password'] ) {
        //echo '登录成功';
        session_start();
        $_SESSION['login'] = true;
        header("location: admin.php");
    } else {
        //echo '用户名或密码错误';
        header("location: index.html");
    }

?>
