<?php

    // 展示留言，及提交留言的表单

    require('../main.php');

    // 判断是否登录
    if (! (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ) {
        header("location: login.php");
        exit;
    }

    // 留言
    $sql_gb = 'SELECT * From '.GB_TABLE_NAME.' ORDER BY create_time DESC';
    $array_gb = $dbhelper -> execute_dml($sql_gb);

    // 回复
    $sql_reply = 'SELECT * From '.REPLY_TABLE_NAME.' ORDER BY reply_time DESC';
    $array_reply = $dbhelper -> execute_dml($sql_reply);
    
    // 根据相同cid重新组合数组
    $reply_temp = array();
    foreach ($array_reply as $key => $value) {
        if(!isset($reply_temp[$value['cid']])){
            $reply_temp[$value['cid']][]=$value;
        }else{
            $reply_temp[$value['cid']][]=$value;
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>管理留言</title>
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
                        <a class="navbar-brand" href="../index.php" style="color:#fff;">say<strong>HI</strong></a>

                        <ul class="nav navbar-top-links navbar-right pull-right">
                            <li>
                                <a href="../loginout.php"><i class="fa fa-sign-out"></i> 退出</a>
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
                                    <div class="comment-body" style="width:100%;display:block;">
                                        <div class="mail-contnet" style="padding-left:0;width:100%;" data-cid="<?php echo $value['cid'] ?>">
                                            <strong><?php echo $value['nickname'] ?></strong>
                                            <time class="sl-date"><?php echo date('H:i',$value['create_time']); ?></time>

                                            <p style="font-size:16px;"><?php echo $value['content'] ?></p>

                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <a href="#reply-<?php echo $value['cid'] ?>" class="text-muted js-reply" data-toggle="collapse"><i class="fa fa-reply"></i> 回复</a>
                                                    &nbsp;
                                                    <a href="javascript:void(0);" class="text-muted js-del"><i class="fa fa-close"></i> 删除</a>
                                                </div>
                                            </div>

                                            
                                        </div>

                                        <!-- 回复表单 -->
                                        <div class="panel-collapse collapse m-t-10" id="reply-<?php echo $value['cid'] ?>"></div>

                                        <div class="reply-list" style="padding-left:60px;">
                                            <!-- 回复列表 S -->
                                            <?php if ($value['status'] == 1): ?>
                                                <?php
                                                    $cid = $value['cid'];
                                                    $reply_cid = $reply_temp[$cid];
                                                ?>

                                                <?php foreach ($reply_cid as $key => $value): ?>
                                                    <div class="comment-body" style="width:100%;padding-left:0;">
                                                        <div class="mail-contnet" style="padding-left:0;display:block;">
                                                            <time class="sl-date"><?php echo date('H:i',$value['reply_time']); ?></time>
                                                            <div><?php echo $value['content'] ?></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif ?>
                                            <!-- 回复列表 End -->
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
