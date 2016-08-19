<?php

    // 管理员登录
    require_once '../main.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // 查询密码及用户名
    $sql_login = "SELECT * FROM ".ADMIN_TABLE_NAME." WHERE nickname='{$username}' AND password='{$password}' limit 1";
    $row = $dbhelper -> execute_dml($sql_login);
    $dbhelper -> close_dbc();

    //var_dump($row);

    if ( !$row ) {
        header("location: index.php");
        exit;
    } else {
        $_SESSION['loggedin'] = true;
        header("location: admin.php");
    }

?>
