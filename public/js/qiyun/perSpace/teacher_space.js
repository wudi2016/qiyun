$(function () {



    var selectMenu = $("div#selectMenu li");
    var nodes = $("div[name='selectName']");
    for (var i = 0; i < selectMenu.length; i++) {
        $(selectMenu[i]).attr("flag", i + "");
    }
    for (var i = 0; i < selectMenu.length; i++) {
        $(selectMenu[i]).click(function () {
            var j = $(this).attr("flag") - 0;
            for (var k = 0; k < nodes.length; k++) {
                $(nodes[k]).addClass('hide');
            }
            if (j == 4) {
                $("div.main1").addClass('hei_min');
            } else {
                $("div.main1").removeClass("hei_min");

            }
            $(nodes[j]).removeClass("hide");
            $("div#selectMenu li").removeAttr("id");
            $(this).attr('id', "teach_hide");

        });

    }


    var selectNav = $("div#selectNav li");
    $("div#selectNav li").first().css({background: "#24cbff", color: "white"});
    for (var i = 0; i < selectNav.length; i++) {
        $(selectNav[i]).click(function () {
            $("div#selectNav li").css({
                background: '',
                color: '#4ED6FE'
            });
            $(this).css({background: "#24cbff", color: "white"});
        })
    }


    var selectWeike = $("div#selectWeike li");
    $("div#selectWeike li").first().css({background: "#24cbff", color: "white"});
    for (var i = 0; i < selectWeike.length; i++) {
        $(selectWeike[i]).click(function () {
            $("div#selectWeike li").css({
                background: '',
                color: '#4ED6FE'
            });
            $(this).css({background: "#24cbff", color: "white"});
        })
    }


    var $tab_li = $('.main_nav').children();
    $tab_li.click(function () {
        $(this).addClass("selected").siblings().removeClass('selected');
    });


//上传头像
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

    var img = '';
    $('#file_upload').uploadify({
        'swf': '/image/qiyun/member/register/uploadify.swf',
        'uploader': '/perSpace/editUserPic',
        'buttonText': '头像上传',
        'file_size_limit' : '5MB',
        'file_types': " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;*.gif ",
        'overrideEvents'  : ['onSelectError'],
        'onSelectError' : uploadify_onSelectError,
        'post_params' : {
            '_token' : $('meta[name="csrf-token"]').attr('content')
        },
        'onUploadSuccess': function (file, data, response) {
            // alert(data);
            // img = "<img width='89px' style='margin:10px auto;' src='" + data + "'> <input  type='hidden' name='pic' value='" + data + "'>";
            img = "<img width='89px' style='margin:10px auto;' src='" + data + "'>";

            $('#imgs').html(img);

        }
    });

    //Ajax提交，发送_token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //层级联动（市级）
    $("#province").change(function () {
        $('.loadingPic').addClass('hide');
        $('.cityLoading').removeClass('hide');
        $('.schoolLoading').removeClass('hide');

        $('#city').html('<option value="">-城市-</option>');
        $('#county').html('<option value="">-县区-</option>');
        $('#school').html('<option value="">-学校-</option>');
        $('#department').html('<option value="">-学校部门-</option>');
        $('#grade').html('<option value="">-年级-</option>');
        $('#class').html('<option value="">-班级-</option>');
        $('#subject').html('<option value="">-学科-</option>');
        var provinceId = $("#province").val();
        $.ajax({
            type: "post",
            url: "/perSpace/province",
            data: 'provinceId=' + provinceId,
            dataType: 'json',

            success: function (result) {
                var str = '<option value="">-城市-</option>';
                var str1 = '<option value="">-学校-</option>';
                if (result.status === true) {
                    $.each(result.city, function (i, val) {
                        str += '<option value="' + val.id + '">' + val.city_name + '</option>';
                    })
                    $('#city').html(str);
                    $('.cityLoading').addClass('hide');
                }else{
                    $('.cityLoading').addClass('hide');
                }

                if (result.statusTwo === true) {
                    $.each(result.school, function (i, val) {
                        str1 += '<option value="' + val.schoolId + '">' + val.schoolName + '</option>';
                    })
                    $('#school').html(str1);
                    $('.schoolLoading').addClass('hide');
                }else{
                    $('.schoolLoading').addClass('hide');
                }
            }
        });
    })
    //市级联动
    $("#city").change(function () {
        $('.loadingPic').addClass('hide');
        $('.countyLoading').removeClass('hide');
        $('.schoolLoading').removeClass('hide');

        $('#county').html('<option value="">-县区-</option>');
        $('#school').html('<option value="">-学校-</option>');
        $('#department').html('<option value="">-学校部门-</option>');
        $('#grade').html('<option value="">-年级-</option>');
        $('#class').html('<option value="">-班级-</option>');
        $('#subject').html('<option value="">-学科-</option>');
        var cityId = $("#city").val();
        $.ajax({
            type: "post",
            url: "/perSpace/city",
            data: 'cityId=' + cityId,
            dataType: 'json',

            success: function (data) {
                var str = '<option value="">-县区-</option>';
                var str1 = '<option value="">-学校-</option>';

                if (data.status === true) {
                    $.each(data.county, function (i, val) {
                        str += '<option value="' + val.id + '">' + val.county_name + '</option>';
                    })
                    $('#county').html(str);
                    $('.countyLoading').addClass('hide');

                }else{
                    $('.countyLoading').addClass('hide');
                }

                if(data.statusTwo === true){
                    $.each(data.school, function (i, val) {
                        str1 += '<option value="' + val.schoolId + '">' + val.schoolName + '</option>';
                    })
                    $('#school').html(str1);
                    $('.schoolLoading').addClass('hide');
                }else{
                    $('.schoolLoading').addClass('hide');
                }
            }
        });
    })
    //县区联动
    $("#county").change(function () {
        $('.loadingPic').addClass('hide');
        $('.schoolLoading').removeClass('hide');

        $('#school').html('<option value="">-学校-</option>');
        $('#department').html('<option value="">-学校部门-</option>');
        $('#grade').html('<option value="">-年级-</option>');
        $('#class').html('<option value="">-班级-</option>');
        $('#subject').html('<option value="">-学科-</option>');
        var countyId = $("#county").val();
        $.ajax({
            type: "post",
            url: "/perSpace/county",
            data: 'countyId=' + countyId,
            dataType: 'json',

            success: function (result) {
                var str = '<option value="">-学校-</option>';
                if (result.status === true) {
                    $.each(result.school, function (i, val) {
                        str += '<option value="' + val.schoolId + '">' + val.schoolName + '</option>';
                    })
                    $('#school').html(str);
                    $('.schoolLoading').addClass('hide');
                }else{
                    $('.schoolLoading').addClass('hide');
                }
            }
        });
    })

    //县区联动
    $("#school").change(function () {
        $('.loadingPic').addClass('hide');
        $('.gradeLoading').removeClass('hide');
        $('.departLoading').removeClass('hide');

        $('#grade').html('<option value="">-年级-</option>');
        $('#department').html('<option value="">-学校部门-</option>');
        $('#class').html('<option value="">-班级-</option>');
        $('#subject').html('<option value="">-学科-</option>');
        var schoolId = $("#school").val();
        $.ajax({
            type: "post",
            url: "/perSpace/school",
            data: 'schoolId=' + schoolId,
            dataType: 'json',

            success: function (result) {
                var str = '<option value="">-年级-</option>';
                var str1 = '<option value="">-学校部门-</option>';

                if (result.status === true) {
                    $.each(result.grade, function (i, val) {
                        str += '<option value="' + val.gradeId + '">' + val.gradeName + '</option>';
                    })

                    $('#grade').html(str);
                    $('.gradeLoading').addClass('hide');
                }else{
                    $('.gradeLoading').addClass('hide');
                }

                if (result.stat === true) {
                    $.each(result.depart, function (i, val) {
                        str1 += '<option value="' + val.departId + '">' + val.departName + '</option>';
                    })

                    $('#department').html(str1);
                    $('.departLoading').addClass('hide');
                }else{
                    $('.departLoading').addClass('hide');
                }
            }
        });
    })

    //年级联动
    $("#grade").change(function () {
        $('.loadingPic').addClass('hide');
        $('.classLoading').removeClass('hide');
        $('.subjectLoading').removeClass('hide');

        $('#class').html('<option value="">-班级-</option>');
        $('#subject').html('<option value="">-学科-</option>');
        var gradeId = $("#grade").val();
        $.ajax({
            type: "post",
            url: "/perSpace/grade",
            data: 'gradeId=' + gradeId,
            dataType: 'json',

            success: function (result) {
                var str = '<option value="">-班级-</option>';
                var str1 = '<option value="">-学科-</option>';
                if (result.status === true) {
                    $.each(result.schoolclass, function (i, val) {
                        str += '<option value="' + val.schoolclassId + '">' + val.schoolclassName + '</option>';
                    })

                    $('#class').html(str);
                    $('.classLoading').addClass('hide');
                }else{
                    $('.classLoading').addClass('hide');
                }

                if (result.statusTwo === true) {
                    $.each(result.subject, function (i, val) {
                        str1 += '<option value="' + val.subjectId + '">' + val.subjectName + '</option>';

                    })

                    $('#subject').html(str1);
                    $('.subjectLoading').addClass('hide');
                }else{
                    $('.subjectLoading').addClass('hide');
                }
            }
        });
    })
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

    $(".main1-3-20-2-five").keyup(function(){
        var phone = $(this).val();
        if(!phone.match(/^[1][358][0-9]{9}$/) && !phone.match(/^[1][7][07][0-9]{8}$/)){
            $('.main1-error-info').html('手机号不符合规则');
            $('.bind').attr('disabled','disabled');
            $("#stubutn").attr('disabled','disabled');
            return;
        }
        if(phone.length == 11){
            $.ajax({
                type: "post",
                url: "/perSpace/telphone",
                data: 'phone=' + phone,
                dataType: 'json',

                success: function (result) {
                    if(result.status === true){
                        $('.main1-error-info').html(result.info);
                        $(".bind").attr('disabled','disabled');
                        $("#stubutn").removeAttr('disabled','disabled');
                        return;
                    }else{
                        $('.main1-error-info').html(result.info);
                        $(".bind").removeAttr('disabled','disabled');
                        $("#stubutn").removeAttr('disabled','disabled');
                    }
                }
            });
        }

    })
    //绑定
    $('.main1-3-20-3-five button').click(function(){
        var phone = $('.main1-3-20-2-five').val();
        $('.main1-code').removeClass('hide');
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
        if(message.length >5){
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

})  