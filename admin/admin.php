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
                        <div class="col-lg-12">
                            <h4 class="page-title">留言管理</h4>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default comments-list-panel">
                                <div class="panel-body">
                                    <div class="comment-center">

                                        <!-- 循环输出 -->
                                        <?php foreach ($array_gb as $key => $value): ?>
                                        <div class="<?php echo ( ($key + 1) == $array_count)?"comment-body b-none" : "comment-body"; ?>" style="width:100%;">
                                            <div class="mail-contnet" style="padding-left:0;">
                                                <h5><?php echo $key+1 . $value['nickname'] ?></h5>
                                                <p class="mail-desc" style="height:auto;"><?php echo $value['content'] ?></p>

                                                <a href="javascript:void(0);" class="pull-right js-del" data-cid="<?php echo $value['cid'] ?>">删除</a>
                                                <a href="javacript:void(0)" class="pull-right" style="margin-right:20px;">回复</a>

                                                <span class="time"><?php echo $value['create_time']; ?></span>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>

                            <div class="white-box hidden">
                                <!-- 回复 S -->
                                <div class="guestbook-form">
                                    <form id="replyForm" action="" method="post">
                                        <div class="form-group">
                                            <textarea name="gb_content" id="" cols="30" rows="3" class="form-control" placeholder="说点什么吧...">@痞子狗 </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info"><i class="fa fa-paper-plane"></i> 回复</button>
                                    </form>
                                </div>
                                <!-- 回复 End -->
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
        <script type="text/javascript">
            $(function(){
                $('.js-del').each(function() {
                    var cid = $(this).data('cid');
                    $(this).click(function() {
                        delComment(cid);
                    });
                });
                function delComment(cid) {
                    swal({
                        title: '确认删除?',
                        text: '删除后不可恢复!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d9534f',
                        cancelButtonText: '取消',
                        confirmButtonText: '删除',
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function(isConfirm){
                        if (isConfirm) {
                            $.ajax({
                                url: 'del.php?delComment='+cid,
                                type: 'POST',
                                dataType: 'json',
                                data: {'cid':cid}
                            })
                            .done(function(data) {
                                if ( data == 1 ) {
                                    swal({
                                        title: '删除成功!',
                                        type: 'success',
                                        showConfirmButton: true,
                                        confirmButtonText: '确定'
                                    }, function(isConfirm) {
                                        if (isConfirm) {
                                            $.LoadingOverlay('show', {
                                                image: '',
                                                size: '30%',
                                                fontawesome : "fa fa-spin fa-cog"
                                            });
                                            window.location.href = 'admin.php';
                                        }
                                    });
                                }                           
                            })
                            .fail(function(data) {
                                console.log("error");
                            });
                        }
                    });
                }
            });
        </script>
    </body>
</html>
