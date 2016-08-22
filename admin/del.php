<?php
    /*
    	删除
    	前端使用AJAX
     */
    
    require_once '../main.php';

    if ( isset($_GET['delComment']) && $_GET['delComment'] !== 'undefined' ) {
    	$cid = $_GET['delComment'];
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
    
?>
