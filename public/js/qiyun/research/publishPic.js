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
//alert(lessonId);
$('#test').diyUpload({
    url:'/research/insertPic/' + lessonId,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    },
    success:function( data ) {
        if(data.status == '1'){
            window.location.href = '/research/lessonDetail/' +　lessonId;
        }else if(data.status == '2'){
            alert('上传失败！');window.location.href = '/research/publishPic/' +　lessonId;
        }else if(data.status == '3'){
            alert('请先登录！');window.location.href = '/';
        }
    },
    error:function( err ) {
//                console.info( err );
    }
});

$('#as').diyUpload({
    url:'/research/insertPic/',
    success:function( data ) {
        console.info( data );
    },
    error:function( err ) {
        console.info( err );
    },
    buttonText : '选择文件',
    chunked:true,
    // 分片大小
    chunkSize:512 * 1024,
    //最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
    fileNumLimit:50,
    fileSizeLimit:50000000000000000 * 1024,
    fileSingleSizeLimit:50000000000000 * 1024,
    accept: {}
});