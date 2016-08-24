<?php
    /*
    	留言回复
     */
    
    require_once '../main.php';

    $cid = $_GET['cid'];
  	$content = $_GET['content'];
  	$content = trim($content);
   	$content = htmlspecialchars($content);
   	$create_time = time();

    if ( !empty($content && $content) && $cid!=='undefined' && $content!=='undefined' ) {
    	
    	$sql = "INSERT INTO ".REPLY_TABLE_NAME."(cid,content,create_time) VALUES('$cid', '$content', '$create_time')";
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
