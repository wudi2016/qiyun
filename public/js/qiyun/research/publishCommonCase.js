/**
 * Created by Mr.H on 2016/2/27.
 */
//上传文件
var evaluatPic = '';

var addMsg = function(){
    $('.form_div1_span').html('资源发布成功，所有用户可以查看');
}

var uploadify_onSelectError = function(file, errorCode, errorMsg) {  
        var msgText = "上传失败\n";  
        switch (errorCode) {  
            case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:  
                //this.queueData.errorMsg = "每次最多上传 " + this.settings.queueSizeLimit + "个文件";  
                msgText += "每次最多上传 " + this.settings.queueSizeLimit + "个文件";  
                break;  
            case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:  
                msgText += "文件大小超过限制( " + this.settings.file_size_limit + " )";  
                break;  
            case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:  
                msgText += "文件大小为0";  
                break;  
            case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:  
                msgText += "文件格式不正确，仅限 " + this.settings.file_types;  
                break;  
            default:  
                msgText += "错误代码：" + errorCode + "\n" + errorMsg;  
        }  
        alert(msgText);  
    }; 

$('#file_upload').uploadify({
    'swf'      : '/image/qiyun/member/register/uploadify.swf',
    'uploader' : '/research/doUpload',
    'buttonText' : '',
    'post_params' : {
        '_token' : $('meta[name="csrf-token"]').attr('content')
    },
    'file_types' : " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;*.txt;*.mp4;*.mp3;",
    'overrideEvents'  : ['onSelectError'],
    'onSelectError' : uploadify_onSelectError,
    'onUploadSuccess' : function(file, data, response) {
        if(data == 1){
            alert('请登录!');
        }else if(data == 2){
            alert('您不是教师,不能发布资源');
        }else if(data == 0){
            alert('没有文件上传');
        }else{
            evaluatPic = data;
            $("input[name='evaluatPath']").val(data);
            setTimeout('addMsg()',4000);
        }
    }
});
