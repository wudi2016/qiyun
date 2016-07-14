/**
 * Created by Mr.H on 2016/1/27.
 */
/*
 * 服务器地址,成功返回,失败返回参数格式依照jquery.ajax习惯;
 * 其他参数同WebUploader
 */
var url = window.location.href;
var param = url.split('/');
var lessonId = param[param.length-1];
$('#test').diyUpload({
    url:'/research/insertSubjectImage/' + lessonId,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    },
    success:function( data ) {
        if(data.status == '1'){
            window.location.href = '/research/subjectInfo/' + lessonId;
        }else if(data.status == '2') {
            alert('上传失败！');
        }else if(data.status == '3'){
            alert('请先登录！');location.href = '/';
        }
    },
    error:function( err ) {
//                console.info( err );
    }
});
