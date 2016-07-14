/**
 * Created by Mr.H on 2016/1/25.
 */
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
//上传文件
var evaluatPic = '';

var addMsg = function(){
    $('.uploadarea_bar_r_msg').html('封面上传成功');
}


$('#file_upload').uploadify({
    'swf'      : '/image/qiyun/member/register/uploadify.swf',
    'uploader' : '/research/doUpload',
    'buttonText' : '上传图片',
    'file_types' : " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;*.gif ",
    'post_params' : {
        '_token' : $('meta[name="csrf-token"]').attr('content')
    },
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
            setTimeout('addMsg()',4000);
        }
    }
});
function data_to_unix(data){
    data = data.replace(/-/g,'/');
    var timestamp = new Date(data).getTime();
    return timestamp;
}
// 选择模板的JS
$(function(){
    $('#invite_tpl').click(function(){
        $(this).next().css('display','block');
        $('#allOpen_tpl').next().css('display','none');
    });
    $('#allOpen_tpl').click(function(){
        $(this).next().css('display','block');
        $('#invite_tpl').next().css('display','none');
        $('.main_link').css('display','none');
        var boxcontent = $('.main_list_name');
        //boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
        //boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
        boxcontent.slideDown('fast');
    });

    var codeList = new Array();
    //赋值
    codeList['a'] = '1.课程设计';
    codeList['b'] = '2.课标分析';
    codeList['c'] = '3.教材分析';
    codeList['d'] = '4.学情分析';
    codeList['e'] = '5.教学分析';
    codeList['f'] = '6.评测练习';
    codeList['g'] = '7.效果分析';
    codeList['h'] = '8.观评记录';
    codeList['i'] = '9.课后反思';
    //for创建view标签
    for (var item in codeList) {
        var node = $("<div><span>" + codeList[item] + "</span><span id='" + item + "'></span></div>");
        $('div.main_line_div').append(node);
    }
    //设置编号并执行
    for (var item in codeList) {
        var str = '';
        for (var i = 0; i < 5; i++) {
            str += "<img src='/image/qiyun/research/mark/4.png' item=" + item + " sid=" + i + " />";
        }
        $("#" + item + "").html(str);
    }


    //结束  选择自备人 按钮
    $('#choose').click(function () {
        $(this).next().css('backgroundColor', '#41A6EE');
        $('#myis').next().css('backgroundColor', '#ccc');
        $(".shadow").css('display', 'block');
        var boxcontent = $(".selectMainMan[name='selectMainMan']");
        //boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
        //boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
        //选择评课自备人弹窗
        boxcontent.slideToggle('fast');
    });
    $('#myis').click(function () {
        $('#choose').next().css('backgroundColor', '#ccc');
        $('#choose').next().html('选择一个主备人');
        $(this).next().css('backgroundColor', '#41A6EE');

    });
    $('#default').click(function () {
        $(this).next().css('backgroundColor', '#41A6EE');
        $('#mytpl').next().css('backgroundColor', '#ccc');
        $('#mytpl').next().html('+选择模板');
    });
    $('#mytpl').click(function () {
        $('.shadow').css('display', 'block');
        var boxcontent = $('.main_link');
        //boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
        //boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
        boxcontent.slideDown('normal');
        $('#default').next().css('backgroundColor', '#ccc');
        $(this).next().css('backgroundColor', '#41A6EE');
    });

    //取消  选择自备人 按钮
    $('#invite').click(function () {
        $(this).next().css('display', 'block');
        $('#allOpen').next().css('display', 'none');
        $('.shadow').css('display', 'block');
        var boxcontent = $(".inviteMan[name='inviteMan']");
        //boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
        //boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
        //选择评课自备人弹窗
        boxcontent.slideToggle('fast');
    });
    $('#allOpen').click(function () {
        $(this).next().css('display', 'block');
        $('#invite').next().css('display', 'none');
    });

    $('.main_list_name_close').click(function (){
        $('.main_list_name').css('display', 'none');
        $('.shadow').css('display', 'none');
        var boxcontent = $('.main_link');
        //boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
        //boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
        boxcontent.slideDown('fast');
    })
    var lessonTime = $("input[name='lessonTime']");
    var begin = $("input[name='begin']");
    var end = $("input[name='end']");
    begin.blur(function (){
        if(data_to_unix(begin.val()) < data_to_unix(lessonTime.val())){
            begin.val('');
            alert('评课时间应大于授课时间');
        }
    })
    end.blur(function (){
        if(data_to_unix(end.val()) < data_to_unix(begin.val())){
            end.val('');
            alert('结束时间应大于开始时间');
        }
    })
});
