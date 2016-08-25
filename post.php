<?php

    /*
        发表留言
     */

    require('main.php');

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['gb_content'];
    $createtime = time();

    if ( !(empty($nickname) && empty($content)) ) {

        // 查询留言表gb_guestbook数据语句
        $sql_gb = "INSERT INTO ".GB_TABLE_NAME."(nickname,content,create_time) VALUES("."'$nickname', '$content', '$createtime')";
        $array_gb = $dbhelper -> execute_dql($sql_gb);

        $dbhelper -> close_dbc();

        header("Location: index.php");
        exit;

    } else {
        echo '不可以空着';
    }


