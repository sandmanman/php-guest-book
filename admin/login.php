 <?php
require '../config.php';
require '../mysql.class.php';

$user = DB::cleanSql($_POST['uname']);
$pwd = DB::cleanSql($_POST['password']);

$sql_login = 'SELECT password FROM ' . ADMIN_TABLE_NAME . ' WHERE level=9 AND nickname = '. "'{$user}'" . ' LIMIT 1';

DB::connect();
$insert_status = mysql_query($sql_login);
$password = mysql_fetch_array($insert_status)[0];
DB::close();

if (md5($pwd) === $password) {
	//save to session
	session_start();
	$_SESSION['admin'] = true;
	header('location:admin.php');
} else {
	header('location:index.html');
}

/**end of file**/