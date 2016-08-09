<?php

    // 管理员登录
    
    session_start();

    require_once '../main.php';

    $dbhelper = new DBHelper();

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // 查询密码及用户名
    $sql_login = "SELECT * FROM ".ADMIN_TABLE_NAME." WHERE nickname='{$username}' AND password='{$password}' limit 1";
    $row = $dbhelper -> execute_dml($sql_login);
    $dbhelper -> close_dbc();

    //var_dump($row);

    if ( !$row ) {
        header("location: index.html");
        //exit('用户名或密码错误');
    } else {
        $_SESSION['uid'] = $row[0]['uid'];
        header("location: admin.php");
    }

?>
