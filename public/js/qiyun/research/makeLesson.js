/**
 * Created by Mr.H on 2016/2/27.
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
	$('.uploadarea_bar_r_msg').html('备课封面上传成功');
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
		boxcontent.show('normal');
	});


	//结束  选择自备人 按钮
	$('#choose').click(function () {
		$(this).next().css('backgroundColor', '#41A6EE');
		$('#myis').next().css('backgroundColor', '#ccc');
		$(".shadow").css('display', 'block');
		var boxcontent = $(".selectMainMan[name='selectMainMan']");
		//boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
		//boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
		//选择评课自备人弹窗
		boxcontent.css('display', 'block');
	});
	$('#chooseGroup').click(function () {
		$(".shadow").css('display', 'block');
		var boxcontent = $('.chooseGroup');
		//boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
		//boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
		//选择评课自备人弹窗
		boxcontent.css('display', 'block');
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
		$('.shadow').css('display', 'block')
		var boxcontent = $('.main_link');
		//boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
		//boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
		boxcontent.slideDown('normal');
		$('#default').next().css('backgroundColor', '#ccc');
		$(this).next().css('backgroundColor', '#41A6EE');
	});
	$('#invite').click(function () {
		$(this).next().css('display', 'block');
		$('#allOpen').next().css('display', 'none');
	});
	$('#allOpen').click(function () {
		$(this).next().css('display', 'block');
		$('#invite').next().css('display', 'none');
	});
	$('.close').children('span').click(function (){
		$('.main_link').css('display','none');
		$('.shadow').css('display','none');
	})

	var begin = $("input[name='begin']");
	var end = $("input[name='end']");
	end.blur(function (){
		if(data_to_unix(end.val()) < data_to_unix(begin.val())){
			end.val('');
			alert('结束时间应大于开始时间');
		}
	})
});

