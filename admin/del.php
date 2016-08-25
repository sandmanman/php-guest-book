<?php
    /*
    	删除
    	前端使用AJAX
     */
    
    require('../main.php');

    $cid = $_GET['delComment'];

    if ( !empty($cid) && $cid!=='undefined' ) {
    	
    	$sql = "DELETE FROM ".GB_TABLE_NAME." WHERE cid='{$cid}'";
	    $result = $dbhelper -> execute_dql($sql);

	    if ( $result ) {
	    	echo 1; // 删除操作成功
	    } else {
	    	echo 0; // 删除操作失败
	    }

	    $dbhelper -> close_dbc();
    } else {
        echo '参数错误';
    }
    

