<?php

    // 退出
    
    require_once '../main.php';

    session_destroy();

    header('location: ../index.php');
    

?>
