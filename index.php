<?php
/**
* set title 
*/
$title = '实验楼之PHP留言本';

require 'config.php';
require './common/header.php';
require 'mysql.class.php';

$gb_count_sql = 'SELECT count(*) FROM ' . GB_TABLE_NAME;
//connect db
DB::connect();
$gb_count_res = mysql_query($gb_count_sql);
$gb_count = mysql_fetch_array($gb_count_res)[0];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
//计算留言数，得出分页数
$pagenum = ceil($gb_count / PER_PAGE_GB);
if ($page > $pagenum || $page < 0) {
	$page = 1;
}

// 限制搜索结果
$offset = ($page - 1) * PER_PAGE_GB;

$pagedata_sql = 'SELECT  nickname,content,createtime,reply,replytime FROM ' . GB_TABLE_NAME . ' WHERE status = 0 ORDER BY createtime DESC LIMIT ' . $offset . ',' . PER_PAGE_GB;

$sql_page_result = mysql_query($pagedata_sql);
while($temp = mysql_fetch_array($sql_page_result)) {
	$sql_page_array[] = $temp;
}
DB::close();

//循环输出数据库中满足条件id留言内容
foreach($sql_page_array as $key => $value){
	echo '<br />';
	echo '留言者：'. $value['nickname'].'|';
	//将时间转换成指定格式时间
	echo '时间：' . date('Y-m-d H:i:s', $value['createtime']) .'<br />';
	echo '内容:' . $value['content'];
	if (!empty($value['reply'])) {
		echo '管理员回复：' . $value['reply'] . '|';
		echo '回复时间：' . date('Y-m-d H:i:s', $value['replytime']) .'<br />';
	}
	echo '<hr />';
}

echo '共 '.$gb_count.'&nbsp;&nbsp;条留言  ';
if ($pagenum > 1) {
	for($i = 1; $i <= $pagenum; $i++) {
		if($i == $page) {
			echo '&nbsp;&nbsp;['.$i.']';
		} else {
			echo '<a href="?page='. $i .'">&nbsp;' . $i . '&nbsp;</a>';
		}
	}
}
?>

<div id="post">
<form name="message_submit" id="form" action="post.php" method="post">
  姓名：<input type="text" name="nickname" id="name" placeholder="必填"/><br />
  内容：<input type="text" name="content" id="content" placeholder="必填"><br />
  E-MAIL:<input type="text" name="email" id="email" placeholder="E-MAIL"><br />
  <input type="submit" value="留言" id="sub"><input type="reset" value="重置" id="reset">
</form>
</div>
<script src='js/check.js'></script>

<?php require 'common/footer.php';?>
