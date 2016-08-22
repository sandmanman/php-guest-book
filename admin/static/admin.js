/*
	admin js
	08.22.2016
 */

(function(){
	"use strict";

	$(function(){

		// 删除操作
        $('.js-del').each(function() {
            var cid = $(this).closest('.mail-contnet').data('cid');
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
                                        fontawesome : 'fa fa-spin fa-cog'
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
        } // End 删除操作


        // 回复操作
        $(document).on(function(){

        	$('.js-reply').each(function() {
	        	var cid = $(this).closest('.mail-contnet').data('cid');
	        	var reply_id = $(this).attr('href');

	        	// 输入内容需要过滤HTML等
	        	var content = $(reply_id).find('textarea').val(); 

	        	$(this).click(function() {
	        	
	        		$(reply_id).load('reply.html');
	        		console.log(content);
	        	});
	        });

        });
        


    });

})();