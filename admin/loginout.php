<?php

    // 退出
    
    require('../main.php');

    session_destroy();

    header('location: ../index.php');
    


