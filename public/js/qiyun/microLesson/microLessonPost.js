$(function (){
	// 下拉小图标控制
	// alert($("div[class=div4_nav2]").find('div').length);
	// 	if($("div[class=div4_nav2]").find('div').length>8){
	// 		//alert("true");
	// 		$("#nav2_img").show();
	// 	}else{
	// 		$("#nav2_img").hide();
	// 	}

	// 	if($("div[class=div4_nav3]").find('div').length>8){
	// 		$("nav3_img").show();
	// 	}else{
	// 		$("nav3_img").hide();
	// 	}

	// // 显示、隐藏 效果
	// $("#nav2_img").click(function(){
	// 	if($('.div4_nav2_hide').css("display") == "none"){
	// 		$('.div4_nav2_hide').show();
	// 	}else{
	// 		$('.div4_nav2_hide').hide();
	// 	}
	// 	//增加div宽度方式实现效果
	// 	if($(".div4_nav").css('height','130')){
	// 		$(".div4_nav").css('height','150');
	// 	}else{
	// 		$(".div4_nav").css('height','100');
	// 	}
	// 	//隐藏小图标
	// 	$("#nav2_img_hide").hide();
	// });




	// $("#nav3_img").click(function(){
	// 	if($('.div4_nav3_hide').css("display") == "none"){
	// 		$('.div4_nav3_hide').show();
	// 	}else{
	// 		$('.div4_nav3_hide').hide();
	// 	}
	// 	//增加div宽度方式实现效果
	// 	if($(".div4_nav").css('height','130')){
	// 		$(".div4_nav").css('height','150');
	// 	}else{
	// 		$(".div4_nav").css('height','100');
	// 	}
	// 	//隐藏小图标
	// 	$("#nav3_img_hide").hide();
	// });



	// // tab选项卡
	// //var $div_div = $("#div4_nav div div");
	// ////console.log($div_div);
	// //$div_div.hover(function(){
	// //	$(this).addClass('nav1_c').siblings().removeClass('nav1_c');
	// //	var index = $div_div.index(this);
	// //	$('.div4_nav2').eq(index).show().siblings().hide();
	// //});
	// $(".div4_nav1").children('div').hover(function(){
	// 	$(this).addClass('selected').siblings().removeClass('selected');
	// })
	// $("#nav1_b").hover(function(){
	// 	$("div[name='xiaoxue']").removeClass('hide');
	// 	$("div[name='chuzhong']").addClass('hide');
	// 	$("div[name='gaozhong']").addClass('hide');
	// })
	// $("#nav1_c").hover(function(){
	// 	$("div[name='xiaoxue']").addClass('hide');
	// 	$("div[name='chuzhong']").removeClass('hide');
	// 	$("div[name='gaozhong']").addClass('hide');
	// })
	// $("#nav1_d").hover(function(){
	// 	$("div[name='xiaoxue']").addClass('hide');
	// 	$("div[name='chuzhong']").addClass('hide');
	// 	$("div[name='gaozhong']").removeClass('hide');
	// })



// 下拉小图标控制
	// alert($("div[class=div4_nav2]").find('div').length);
		if($("div[class=div4_nav2]").find('div').length>8){
			//alert("true");
			$("#nav2_img").show();
		}else{
			$("#nav2_img").hide();
		}

		if($("div[class=div4_nav3]").find('div').length>8){
			$("nav3_img").show();
		}else{
			$("nav3_img").hide();
		}

	// 显示、隐藏 效果
	$("#nav2_img").click(function(){
		if($('.div4_nav2_hide').css("display") == "none"){
			$('.div4_nav2_hide').show();
		}else{
			$('.div4_nav2_hide').hide();
		}
		//增加div宽度方式实现效果
		if($(".div4_nav").css('height','130')){
			$(".div4_nav").css('height','150');
		}else{
			$(".div4_nav").css('height','100');
		}
		//隐藏小图标
		$("#nav2_img_hide").hide();
	});




	$("#nav3_img").click(function(){
		if($('.div4_nav3_hide').css("display") == "none"){
			$('.div4_nav3_hide').show();
		}else{
			$('.div4_nav3_hide').hide();
		}
		//增加div宽度方式实现效果
		if($(".div4_nav").css('height','130')){
			$(".div4_nav").css('height','150');
		}else{
			$(".div4_nav").css('height','100');
		}
		//隐藏小图标
		$("#nav3_img_hide").hide();
	});




});

$(function(){
	//$('.div4_nav>.div4_nav1>div').mouseover(function(){
	//	$('.div4_nav>.div4_nav1>div').css('color','');//清除全部字体颜色
	//	$(this).css('color','#41A6EC');//添加当前字体颜色
	//	$('.div4_nav>.div4_nav2').css('display','none');//隐藏全部的年级
	//	$('.div4_nav>.div4_nav2:eq('+$(this).index()+')').css('display','block');
	//	$('.div4_nav>.div4_nav3').css('display','none');//隐藏全部的科目
	//	$('.div4_nav>.div4_nav3:eq('+$(this).index()+')').css('display','block');
	//});
});







    //重载报错方法
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
	var micLessonPath = '';
	var headPic = '';
	var coverPic = '';


	$('#file_upload').uploadify({
		'swf'      : '/image/qiyun/member/register/uploadify.swf',
		'uploader' : '/microLesson/doMicroLessonPost',
		'buttonText' : '微课上传',
		// 'file_size_limit' : '1K',
		// 'file_types' : " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;*.txt;*.mp4;*.mp3;",
		'file_types' : "*.mp4;",
		//'file_types' : " *.wmv;*.mp4;*.avi;*.rmvb;*.3gp;*.mod;*.mpeg;*.mpg;*.swf;*.flv;",
		'post_params' : {
	        '_token' : $('meta[name="csrf-token"]').attr('content')
	    },
		'overrideEvents'  : ['onSelectError'],
	    'onSelectError' : uploadify_onSelectError,
		'onUploadSuccess' : function(file, data, response) {
			if(data == 1){
				alert('请登录!');
			}else if(data == 2){
				alert('您不是教师,不能发布微课');
			}else if(data == 0){
				alert('没有上传微课');
			}else{
				micLessonPath = data;
				$('.micLessonPath').attr("href",data);
				setTimeout($('.main_div1').html('微课上传成功'),4000);
			}
		}
	});


	$('#file_uploada').uploadify({
		'swf'      : '/image/qiyun/member/register/uploadify.swf',
		'uploader' : '/microLesson/doMicroLessonPicPost',
		'buttonText' : '',
		// 'file_size_limit' : '1K',
		'file_size_limit' : '5MB',
		'file_types' : " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;",
		'post_params' : {
	        '_token' : $('meta[name="csrf-token"]').attr('content')
	    },
		'overrideEvents'  : ['onSelectError'],
	    'onSelectError' : uploadify_onSelectError,
		'onUploadSuccess' : function(file, data, response) {
			if(data == 1){
				alert('请登录!');
			}else if(data == 2){
				alert('您不是教师,不能发布微课');
			}else if(data == 0){
				alert('没有上传微课');
			}else{
				headPic = data;
				$('.div5_img').html("<img width='160px' src='"+data+"'>");
			}
		}
	});

	$('#file_uploadb').uploadify({
		'swf'      : '/image/qiyun/member/register/uploadify.swf',
		'uploader' : '/microLesson/doMicroLessonPicPost',
		'buttonText' : '',
		// 'file_size_limit' : '1K',
		'file_size_limit' : '5MB',
		'file_types' : " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;",
		'post_params' : {
	        '_token' : $('meta[name="csrf-token"]').attr('content')
	    },
		'overrideEvents'  : ['onSelectError'],
	    'onSelectError' : uploadify_onSelectError,
		'onUploadSuccess' : function(file, data, response) {
			if(data == 1){
				alert('请登录!');
			}else if(data == 2){
				alert('您不是教师,不能发布微课');
			}else if(data == 0){
				alert('没有上传微课');
			}else{
				coverPic = data;
				$('.div6_img').html("<img width='160px' src='"+data+"'>");
			}
		}
	});


