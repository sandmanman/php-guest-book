<?php
session_start();
if (!$_SESSION['admin']) {
	return false;
}

require '../config.php';
require '../mysql.class.php';

$id = $_POST['id'];

//id not empty and is_numeric
if ((!empty($id) && is_numeric($id))) {
	$delete_sql = 'UPDATE ' . GB_TABLE_NAME . 'SET status = 1 ' .  . 'WHERE id = ' . $id;
	$delete_status = mysql_query($delete_sql);

	if ($delete_status) {
		echo '{"error":0, "msg":"delete success"}';
	} else {
		echo '{"error":1, "msg":"delete falure"}';
	}
} else {
	echo '{"error":1, "msg":"id needed!"}';
}

/**end**/