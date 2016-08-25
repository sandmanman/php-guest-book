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
                                        fontawesome : 'fa fa-circle-o-notch fa-spin'
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
    	$('.js-reply').each(function() {
        	var cid = $(this).closest('.mail-contnet').data('cid');
        	var reply_id = $(this).attr('href');

        	$(this).click(function() {
        	
        		$(reply_id).load('reply.html', function(){
        			
	        		var send_btn = $(reply_id).find('.js-send-reply');
	        		var textarea = $(reply_id).find('textarea');

	        		textarea.focus();

	        		send_btn.on('click', function(){

	        			// 输入内容需要过滤html,js等特殊字符，防止存入数据发生严重错误！
	        			var content = textarea.val();

	        			send_btn.attr('disabled','disabled').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
	        			
	        			$.ajax({
	        				url: 'reply.php?cid=' + cid + '&content=' + content,
	        				type: 'post',
	        				dataType: 'json',
	        				data: {
	        					cid: 'cid',
	        					content: 'content'
	        				}
	        			})
	        			.done(function(data) {
	        				if ( data == 1 ) {
	        					console.log("success");
	        					textarea.val('');
	        					send_btn.removeAttr('disabled').html('回复');
	        					$(reply_id).collapse('hide');

	        					// 提示成功
	        					$.toast({
						            heading: '回复成功！',
						            position: 'top-center',
						            loaderBg:'transparent',
						            icon: 'success',
						            hideAfter: 3500, 
						            stack: 6
						        });
                                window.location.reload(true);
	        				}
	        			})
	        			.fail(function(data) {
	        				console.log("error");
	        				// 提示失败
        					$.toast({
					            heading: '出了点错误！',
					            position: 'top-center',
					            loaderBg:'transparent',
					            icon: 'error',
					            hideAfter: 3500, 
					            stack: 6
					        });
	        				send_btn.removeAttr('disabled').html('回复');
	        			}); // ajax End
	        			
	        		});
	        		
        		});

        		
        	});
        });

        


    });

})();