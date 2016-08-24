<?php
    /*
    	留言回复
     */
    
    require_once '../main.php';

    $cid = $_GET['cid'];
  	$content = $_GET['content'];
  	$content = trim($content);
   	$content = htmlspecialchars($content);
   	$reply_time = time();

    if ( !empty($content && $content) && $cid!=='undefined' && $content!=='undefined' ) {
    	
        $sql = "INSERT INTO ".REPLY_TABLE_NAME."(cid,content,reply_time) VALUES('$cid', '$content', '$reply_time')";
        $result = $dbhelper -> execute_dql($sql);

  	    if ( $result ) {
            // 改变留言表对应cid的status
            $sql_status = "UPDATE ".GB_TABLE_NAME." SET status='1' WHERE cid='$cid'";
            $res_status = $dbhelper -> execute_dql($sql_status);

            if ($res_status) {
              echo 1; // 回复成功
            }
  	    	
  	    } else {
  	    	  echo 0; // 回复失败
  	    }

  	    $dbhelper -> close_dbc();

    } else {
    	echo '参数错误';
    }



