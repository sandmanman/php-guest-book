<?php

    /*
     * 数据库连接封装
    */

    class DBHelper{
        private $mysqli;
        private static $host='localhost';
        private static $user='root';
        private static $pwd='root';
        private static $dbname='guestbook';

        // 通过构造方法进行初始化操作
        public function __construct(){
            $this -> mysqli = new mysqli(self::$host, self::$user, self::$pwd, self::$dbname) or die('数据库链接出错:'.$this -> mysqli -> connect_error);
            // 设置数据库编码为utf8
            $this -> mysqli -> query('set names utf8');
        }

        // 执行查询语句
        public function execute_dml($sql){
            $arr = array();
            $result = $this -> mysqli -> query($sql) or die($this -> mysqli -> error);
            if($result){
                while( $row= $result -> fetch_assoc() ) {
                    // 将查询结果封装到一个数组中，返回给方法调用处
                    $arr[]=$row;
                }
                //释放查询结果资源
                $result -> free();
            }
            return $arr;
        }

        // 执行增加、删除、更新语句
        public function execute_dql($sql){
            $result = $this -> mysqli -> query($sql) or die($this -> mysqli -> error);
            if(!$result) {
                return 0; // 表示操作失败
            } else {
                if($this -> mysqli -> affected_rows > 0) {
                    return 1; // 操作成功
                } else {
                    return 2; // 没有受影响的行
                }
            }
        }

        // 关闭数据库连接
        public function close_dbc() {
            $this -> mysqli -> close();
        }
    }


    // require_once('DBHelper.class.php');
    // $dbhelper=new DBHelper();
    // $sql='select id,name,age from user';
    // $users=$dbhelper->execute_dml($sql);
    // if(!empty($users)){
?>
