<?php

    // 展示留言，及提交留言的表单

    require_once '../main.php';

    // 判断是否登录
    if (! (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ) {
        header("location: login.php");
        exit;
    }


    $sql_gb = 'SELECT * From '.GB_TABLE_NAME.' ORDER BY create_time';
    $array_gb = $dbhelper -> execute_dml($sql_gb);

    $array_count = count($array_gb);
    

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>留言管理</title>
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="../static/components/sweetalert/sweetalert.css">
        <link rel="stylesheet" href="../static/components/toast/jquery.toast.css">

        <link rel="stylesheet" href="../static/css/style.css">
        <link rel="stylesheet" href="../static/css/megna.css">
    </head>
    <body>
        <div class="wrapper" id="wrapper">

            <header>
                <nav class="navbar navbar-default navbar-static-top m-b-0">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#" style="color:#fff;">say<strong>HI</strong></a>

                        <ul class="nav navbar-top-links navbar-right pull-right">
                            <li>
                                <a href="../loginout.php">退出</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-xs-12">
                            <h4 class="page-title">留言管理</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="white-box comments-list-box">
                                
                                <div class="comment-center">

                                    <!-- 循环输出 -->
                                    <?php foreach ($array_gb as $key => $value): ?>
                                    <div class="<?php echo ( ($key + 1) == $array_count)?"comment-body b-none" : "comment-body"; ?>" style="width:100%;">
                                        <div class="mail-contnet" style="padding-left:0;" data-cid="<?php echo $value['cid'] ?>">
                                            <h5><?php echo $key+1 . $value['nickname'] ?></h5>
                                            <p class="mail-desc" style="height:auto;"><?php echo $value['content'] ?></p>

                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <a href="#reply-<?php echo $value['cid'] ?>" class="btn btn-default btn-outline btn-sm js-reply" data-toggle="collapse">回复</a>
                                                    &nbsp;
                                                    <a href="javascript:void(0);" class="btn btn-default btn-outline btn-sm js-del">删除</a>
                                                </div>

                                                <time class="time pull-right"><?php echo $value['create_time']; ?></time>
                                            </div>

                                            <!-- 回复 S -->
                                            <div class="panel-collapse collapse m-t-10" id="reply-<?php echo $value['cid'] ?>">
                                                
                                            </div>
                                            <!-- 回复 End -->

                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                                
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../static/components/sweetalert/sweetalert.min.js"></script>
        <script src="../static/components/toast/jquery.toast.js"></script>
        <script src="../static/components/jquery-loading-overlay/loadingoverlay.min.js"></script>

        <script src="static/admin.js"></script>
    </body>
</html>
