<?php
    /*
    	留言回复
     */
    
    require_once '../main.php';

    $cid = $_GET['cid'];
  	$content = $_GET['content'];
  	$content = trim($content);
   	$content = htmlspecialchars($content);

    if ( !empty($content && $content) && $cid!=='undefined' && $content!=='undefined' ) {
    	
    	$sql = "UPDATE ".GB_TABLE_NAME." SET reply_content='$content' WHERE cid='$cid'";
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
