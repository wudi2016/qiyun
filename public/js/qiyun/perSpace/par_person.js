 $(function(){
            $("li[name='click_btn_1']").click(function() {
                $(this).attr('id','teach_hide').siblings().removeAttr('id');
                $("div[name='person']").removeClass('hide');
                $("div[name='shoucang']").addClass('hide');
          

        })
            $("li[name='click_btn_2']").click(function() {
                $(this).attr('id','teach_hide').siblings().removeAttr('id');
                $("div[name='shoucang']").removeClass('hide');
                $("div[name='person']").addClass('hide');
        })
            var $tab_li = $('.main_nav').children();
                $tab_li.click(function(){
                $(this).addClass("selected").siblings().removeClass('selected');
                });


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
                'uploader' : '/perSpace/editUserPic',
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
                // img = "<img width='89px' style='margin:10px auto;' src='"+data+"'> <input  type='hidden' name='pic' value='"+data+"'>";
                img = "<img width='89px' style='margin:10px auto;' src='"+data+"'>";
                        
                $('#imgs').html(img);
               
            }
        });

     //Ajax提交，发送_token
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     //验证修改手机号为唯一
     if(!$("input[name='phone']").val()){
         $('.main1-error-info').html('* 手机号已被绑定');
         $('.bind').attr('disabled','disabled');
         var time=2;
         var timer = setInterval(function() {
             time--;
             if(time == 0){
                 $('.main1-error-info').html('');
                 clearInterval(timer);
             }
         }, 1000);
     }

     $(".main1-3-17-2").keyup(function(){
         var phone = $("input[name='phone']").val();
         if(!phone.match(/^[1][358][0-9]{9}$/) && !phone.match(/^[1][7][07][0-9]{8}$/)){
             $('.main1-error-info').html('手机号不符合规则');
             $('.bind').attr('disabled','disabled');
             $("#stubutn").attr('disabled','disabled');
             return false;
         }
         if(phone.length == 11){
             $.ajax({
                 type: "post",
                 url: "/perSpace/telphone",
                 data: 'phone=' + phone,
                 dataType: 'json',

                 success: function (result) {
                     if(result.status == true){
                         $('.main1-error-info').html(result.info);
                         $('.bind').attr('disabled','disabled');
                         $("#stubutn").attr('disabled','disabled');
                         return false;
                     }else{
                         $('.main1-error-info').html(result.info);
                         $('.bind').removeAttr('disabled','disabled');
                         $("#stubutn").removeAttr('disabled','disabled');
                     }
                 }
             });
         }

     })
     //绑定
     $('.main1-3-20-3 button').click(function(){
         $('.main1-code').removeClass('hide');
         var phone = $("input[name='phone']").val();
         var key_1 = 2;
         var key_2 = 1;
         if(phone){
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
         }else{
             return false;
         }
         //点击绑定，发送验证码
         $.ajax({
             type: "get",
             url: "/perSpace/getMessage/"+phone+"/"+key_1+"/"+key_2,
             dataType: 'json',

             success: function (data) {
                 if(data.type== true){
                     code = data.info;
                 }else{
                     code = data.info;
                 }
             }
         });
     })

     $(".main1-code-input").keyup(function(){
         var message = $(".main1-code-input").val();
         if(message.length > 5){
             if(message == code){
                 $(".code-code").html("验证码已通过");
                 $('#stubutn').removeAttr('disabled','disabled');
             }else{
                 $(".code-code").html("验证码未通过或已失效");
                 $('#stubutn').attr('disabled','disabled');
                 return;
             }
         }

     })


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

 })