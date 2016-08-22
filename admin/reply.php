<?php
    /*
    	留言回复
     */
    
    require_once '../main.php';

    
    if ( isset($_GET('cid')) && isset($_GET('content')) && $_GET['cid'] !== 'undefined' && $_GET['content'] !== 'undefined' ) {
    	var $cid = $_GET('cid');
    	var $content = $_GET('content'); // 这里需要过滤HTML

    	$sql = "UPADTE ".GB_TABLE_NAME."SET reply_content='{$content}' WHERE cid='{$cid}'";
	    $result = $dbhelper -> execute_dql($sql);

	    if ( $result ) {
	    	echo 1; // 回复成功
	    } else {
	    	echo 0; // 回复失败
	    }

	    $dbhelper -> close_dbc();

    } else {
    	echo '参数错误';
    }


?>
