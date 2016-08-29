<?php
    /*
    	删除
    	前端使用AJAX
     */
    
    require('../main.php');

    $cid = $_GET['delComment'];

    if ( !empty($cid) && $cid!=='undefined' ) {
    	
    	$sql_p = "DELETE FROM ".GB_TABLE_NAME." WHERE cid='{$cid}'";
	    $result_p = $dbhelper -> execute_dql($sql_p);

        $sql_c = "DELETE FROM ".REPLY_TABLE_NAME." WHERE cid='{$cid}'";
        $result_c = $dbhelper -> execute_dql($sql_c);


	    if ( $result_p && $result_c ) {
	    	echo 1; // 删除操作成功
	    } else {
	    	echo 0; // 删除操作失败
	    }

	    $dbhelper -> close_dbc();
    } else {
        echo '参数错误';
    }
    

