// 登陆界面用户类型选项卡
// $('.register_content_title_block').click(function(){
//     $(this).addClass("register_content_title_block_active")            
//            .siblings().removeClass("register_content_title_block_active");

//     $(this).children('.register_content_title_block_person').addClass('register_content_title_block_person_active');
//     $(this).siblings().children('.register_content_title_block_person').removeClass('register_content_title_block_person_active')
    

//     var index =  $('.register_content_title_block').index(this);  

//     $(this).parents(".register_content_title").siblings(".register_content_form")    
//           .eq(index).show()   
//           .siblings('.register_content_form').hide(); 
// });

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


//上传头像
var img = '';
$('#file_upload').uploadify({
    	'swf'      : '/image/qiyun/member/register/uploadify.swf',
    	'uploader' : '/member/addImg',
    	'buttonText' : '头像上传',
        'post_params' : {
            '_token' : $('meta[name="csrf-token"]').attr('content')
        },
        'file_size_limit' : '5MB',
        'file_types' : " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;*.gif ",
        'overrideEvents'  : ['onSelectError'],
        'onSelectError' : uploadify_onSelectError,
    	'onUploadSuccess' : function(file, data, response) {
         // alert(data);
        img = "<img width='89px' src='"+data+"'> <input  type='hidden' name='pic' value='"+data+"'>";
	            
        $('#imgs').html(img);
       
	}
}); 




//验证码

var a = Math.ceil(Math.random()*100);
var b = Math.ceil(Math.random()*100);
var sum = a + b;
code = ' ';

$('.yzm').html(a+'+'+b+'=?');

var reloadyzm = function(){
	a = Math.ceil(Math.random()*100);
	b = Math.ceil(Math.random()*100);
	sum = a + b;
	$('.yzm').html(a+'+'+b+'=?');
	$('.yzmts').removeClass('block').addClass('disable');
}

$('.yzm').click(function(){
	reloadyzm();
})


 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });


var sendMessage = function(){

    var phone = $('.form_phone').val();
    if (phone.match(/^1(3|5|8|7){1}[0-9]{9}$/)) {

        $.ajax({
            type: "get",
            url: "/member/getPhones/"+phone,
            dataType: 'json',

            success: function (data) {
                if(data == 1){
                    $('.form_phone_msg').html('该号码已被注册！');
                }else if(data == 0){
                    var phone = $("input[name='phone']").val();
                    var key_1 = 2;
                    var key_2 = 1;
                    //点击绑定，发送验证码
                    $.ajax({
                        type: "get",
                        url: "/api/qiyun/getMessage/"+phone+"/"+key_1+"/"+key_2,
                        dataType: 'json',

                        success: function (data) {
                            if(data.type== true){
                                code = data.info;
                            }else{
                                code = data.info;
                            }
                        }
                    });

                    var countdown = 90;

                    $(".bind").attr({ disabled: "disabled"});//重新发送按钮 不能点击
                    var myTime = setInterval(function() {
                        countdown--;
                        $('.bind').html(countdown); // 通知视图模型的变化
                        if(countdown == 0){
                            $('.bind').html('重发').removeAttr("disabled");//重新发送按钮 可以点击
                            clearInterval(myTime);
                        }
                    }, 1000);
                }
            }
        });

    }else{
        $('.form_phone_msg').html('号码格式错误');
        return false;
    }
}


var postcheck = function(para){
    // alert(para);
    if($('.'+para+'sum').val() != sum){
        // 提示验证码错误
        $('.'+para).removeClass('disable').addClass('block');
        return false;
    }  

    var name = $('.form_name').val();
    var realname = $('.form_realname').val();
    var password = $('.form_password').val();
    var message = $('.form_message').val();
    var phone = $('.form_phone').val();
    var IDcard = $('.form_IDcard').val();
    var email = $('.form_email').val();



    // if (!name.match(/^[\u4E00-\u9FA50-9A-Za-z]{6,20}$/)) {
    if (!name.match(/^\S{6,20}$/)) {
        $('.form_name_msg').html('请填写正确用户名，6-20位字符');
        return false;
    }
    if (!realname.match(/^[\u4E00-\u9FA5A-Za-z]{2,10}$/)) {
        $('.form_realname_msg').html('请填写正确名字，2—10个汉字、字母');
        return false;
    }
    if (!password.match(/^[0-9A-Za-z]{6,16}$/)) {
        $('.form_password_msg').html('请填写正确密码，6—16个数字、字母');
        return false;
    }
    if (!phone.match(/^1(3|5|8|7){1}[0-9]{9}$/)) {
        $('.form_phone_msg').html('号码格式错误');
        return false;
    }
    // if (!message) {
    //     $('.form_message_msg').html('短信验证码错误！');
    //     return false;        
    // };
    if (message != code) {
        $('.form_message_msg').html('短信验证码错误！');
        return false;        
    };
    if (!IDcard.match(/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[a-zA-Z])$/)) {
        $('.form_IDcard_msg').html('身份证号码格式错误');
        return false;
    };
    if (!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/ )) {
        $('.form_email_msg').html('邮箱格式错误');
        return false;
    };

}

var postcheckb = function(para){
    // alert(para);
    if($('.'+para+'sum').val() != sum){
        // 提示验证码错误
        $('.'+para).removeClass('disable').addClass('block');
        return false;
    }  

    var name = $('.form_name').val();
    var realname = $('.form_realname').val();
    var stunum = $('.form_stunum').val();
    var password = $('.form_password').val();
    var message = $('.form_message').val();
    var phone = $('.form_phone').val();
    var IDcard = $('.form_IDcard').val();
    var email = $('.form_email').val();
    // alert(message);
    // console.log(stunum);
    // return false;


    // if (!name.match(/^[\u4E00-\u9FA50-9A-Za-z]{6,20}$/)) {
    if (!name.match(/^\S{6,20}$/)) {
        $('.form_name_msg').html('请填写正确用户名，6-20位字符');
        return false;
    }
    if (!realname.match(/^[\u4E00-\u9FA5A-Za-z]{2,10}$/)) {
        $('.form_realname_msg').html('请填写正确名字，2—10个汉字、字母');
        return false;
    }
    if (!stunum.match(/^[0-9A-Za-z]{2,20}$/)) {
        $('.form_stunum_msg').html('请填写正确学号，2—20个数字、字母');
        return false;
    }    
    if (!password.match(/^[0-9A-Za-z]{6,16}$/)) {
        $('.form_password_msg').html('请填写正确密码，6—16个数字、字母');
        return false;
    }
    if (!phone.match(/^1(3|5|8|7){1}[0-9]{9}$/)) {
        $('.form_phone_msg').html('号码格式错误');
        return false;
    }
    // if (!message) {
    //     $('.form_message_msg').html('短信验证码错误！');
    //     return false;        
    // };
    if (message != code) {
        $('.form_message_msg').html('短信验证码错误！');
        return false;        
    }
    if (!IDcard.match(/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[a-zA-Z])$/)) {
        $('.form_IDcard_msg').html('身份证号码格式错误');
        return false;
    };
    if (!email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/ )) {
        $('.form_email_msg').html('邮箱格式错误');
        return false;
    };
} 




$('.form_name').focus(function () {
    $('.form_name_msg').html('');
});
$('.form_realname').focus(function () {
    $('.form_realname_msg').html('');
});
$('.form_password').focus(function () {
    $('.form_password_msg').html('');
});
$('.form_stunum').focus(function () {
    $('.form_stunum_msg').html('');
});
$('.form_message').focus(function () {
    $('.form_message_msg').html('');
});
$('.form_phone').focus(function () {
    $('.form_phone_msg').html('');
});



//添加学生账号
$('#addChild').click(function(){

    if($(this).parent().siblings('.register_content_form_block_right').size() < 4){
        var obja = $(this).parent();
        var objb = obja.clone();
        objb.find('#removeChild').removeClass('disable');
        objb.find('#addChild').addClass('disable');
        objb.find('input[type=text]').val(' ');
        obja.before(objb);       
    }else{
        return false;
    }
});

//删除学生账号
$('#removeChild').live('click',function(){
    // alert('11111');
    var objn = $(this).parent();
    objn.remove();
});