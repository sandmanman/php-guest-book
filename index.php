<?php

    // 分页展示最新留言，及提交留言的表单

    require_once 'config.php';
    require_once 'mysql.class.php';

    $dbhelper = new DBHelper(); // 实例化DBHelper

    // 查询留言表gb_guestbook数据语句
    $sql_gb = 'SELECT nickname,content,createtime From '.GB_TABLE_NAME.' ORDER BY createtime DESC';
    $array_gb = $dbhelper -> execute_dml($sql_gb);

    $dbhelper -> close_dbc();
?>

<!DOCTYPE html>
<html style="background:#edf1f5;">
    <head>
        <meta charset="utf-8">
        <title>留言</title>
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="static/css/megna.css">
        <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="wrapper" id="wrapper">

            <?php include('common/header.php'); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-12">
                            <h4 class="page-title">留言</h4>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box">
                                <h3 class="box-title">最新留言</h3>
                                <div class="comment-center">

                                    <!-- 循环输出 -->
                                    <?php foreach ($array_gb as $value): ?>
                                    <div class="comment-body" style="width:100%;">
                                        <div class="mail-contnet" style="padding-left:0;">
                                             <h5><?php echo $value['nickname'] ?>：</h5>
                                             <p class="mail-desc" style="height:auto;"><?php echo $value['content'] ?></p>
                                             <a href="javacript:void(0)" class="pull-right">回复</a>
                                             <span class="time"><?php echo date( 'm-d H:i', $value['createtime'] ) ?></span>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>

                            <div class="white-box">
                                <!-- 留言表单 S -->
                                <div class="guestbook-form">
                                    <form id="guestbookForm" action="post.php" method="post">
                                        <div class="form-group">
                                            <input type="text" name="nickname" class="form-control" placeholder="昵称">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="邮箱">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="gb_content" id="" cols="30" rows="3" class="form-control" placeholder="说点什么吧..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info"><i class="fa fa-paper-plane"></i> 提交</button>
                                    </form>
                                </div>
                                <!-- 留言表单 End -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
