/*
	admin js
	08.22.2016
 */

(function(){
	"use strict";

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
    
})();