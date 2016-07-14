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


      //Ajax提交，发送_token
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      //省市县联动
      $("#province").change(function () {
          $('.loadingPic').addClass('hide');
          $('.cityLoading').removeClass('hide');
          $('.schoolLoading').removeClass('hide');

          $('#city').html('<option value="">-城市-</option>');
          $('#county').html('<option value="">-县区-</option>');
          $('#school').html('<option value="">-学校-</option>');
          $('#grade').html('<option value="">-年级-</option>');
          $('#class').html('<option value="">-班级-</option>');
          $('#subject').html('<option value="">-学科-</option>');
          $('#reportId').html('<option value="">-年度-</option>');
          $('#termHide').html('<option value="">-学期-</option>');
          var provinceId = $("#province").val();
          $.ajax({
              type: "post",
              url: "/perSpace/province",
              data: {'provinceId': provinceId},
              dataType: 'json',

              success: function (result) {
                  var str = '<option value="">-城市-</option>';
                  var str1 = '<option value="">-学校-</option>';
                  if (result.status === true) {
                      //console.log(result.city);
                      $.each(result.city, function (i, val) {
                          str += '<option value="' + val.id + '">' + val.city_name + '</option>';
                      })
                      $('#city').html(str);
                      $('.cityLoading').addClass('hide');
                  }else{
                      $('.cityLoading').addClass('hide');
                  }

                  if(result.statusTwo === true){
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
          $('#grade').html('<option value="">-年级-</option>');
          $('#class').html('<option value="">-班级-</option>');
          $('#subject').html('<option value="">-学科-</option>');
          $('#reportId').html('<option value="">-年度-</option>');
          $('#termHide').html('<option value="">-学期-</option>');
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
//                            console.log(data.county);
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
          $('#grade').html('<option value="">-年级-</option>');
          $('#class').html('<option value="">-班级-</option>');
          $('#subject').html('<option value="">-学科-</option>');
          $('#reportId').html('<option value="">-年度-</option>');
          $('#termHide').html('<option value="">-学期-</option>');
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
      //县区联动
      $("#school").change(function () {
          $('.loadingPic').addClass('hide');
          $('.gradeLoading').removeClass('hide');
          $('.yearLoading').removeClass('hide');

          $('#grade').html('<option value="">-年级-</option>');
          $('#class').html('<option value="">-班级-</option>');
          $('#subject').html('<option value="">-学科-</option>');
          $('#reportId').html('<option value="">-年度-</option>');
          $('#termHide').html('<option value="">-学期-</option>');
          var schoolId = $("#school").val();
          $.ajax({
              type: "post",
              url: "/perSpace/school",
              data: 'schoolId=' + schoolId,
              dataType: 'json',

              success: function (result) {
                  var str = '<option value="">-年级-</option>';
                  var str1 = '<option value="">-年度-</option>';
                  if (result.status === true) {
                      $.each(result.grade, function (i, val) {
                          str += '<option value="' + val.gradeId + '">' + val.gradeName + '</option>';
                      })
                      $('#grade').html(str);
                      $('.gradeLoading').addClass('hide');
                  }else{
                      $('.gradeLoading').addClass('hide');
                  }
                  if(result.statusTwo === true){
                      $.each(result.report,function(i, val) {
                          str1 += '<option value="' + val.id + '">' + val.reportName + '</option>';
                      })
                      $('#reportId').html(str1);
                      $('.yearLoading').addClass('hide');
                  }else{
                      $('.yearLoading').addClass('hide');
                  }
              }
          });
      })

      //年度联动
      $("#reportId").change(function () {
          $('.loadingPic').addClass('hide');
          $('.termLoading').removeClass('hide');

          $('#termHide').html('<option value="">-学期-</option>');
          var yearId = $(this).val();
          $.ajax({
              type: "post",
              url: "/perSpace/report",
              data: 'yearId=' + yearId,
              dataType: 'json',

              success: function (result) {
                  var str = '<option value="">-学期-</option>';
                  if (result.status === true) {
                      $.each(result.term,function(i, val) {
                          str += '<option value="' + val.id + '">' + val.termName + '</option>';
                      })
                      $('#termHide').html(str);
                      $('.termLoading').addClass('hide');
                  }else{
                      $('.termLoading').addClass('hide');
                  }
              }
          });
      })

      //年级联动
      $("#grade").change(function () {
          $('.loadingPic').addClass('hide');
          $('.classLoading').removeClass('hide');

          $('#class').html('<option value="">-班级-</option>');
          var gradeId = $("#grade").val();
          $.ajax({
              type: "post",
              url: "/perSpace/grade",
              data: 'gradeId=' + gradeId,
              dataType: 'json',

              success: function (result) {
                  var str = '<option value="">-班级-</option>';
                  if (result.status === true) {
                      $.each(result.schoolclass, function (i, val) {
                          str += '<option value="' + val.schoolclassId + '">' + val.schoolclassName + '</option>';
                      })
                      $('#class').html(str);
                      $('.classLoading').addClass('hide');
                  }else{
                      $('.classLoading').addClass('hide');
                  }
              }
          });
      })


      //初始化手机绑定信息
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
      //验证修改手机号为唯一
      $(".main1-3-20-2").keyup(function(){
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
                  return false;
              }
          }

      })
  })


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


  // 搜索下拉列表
  //$("div#inputInfo").mousemove(function() {
  //    $(".subway").css('display','block');
  //    $('.input').click(function () {
  //        $(this).next('#sub').show();
  //        $('#sub li').click(function () {
  //            $('.input').html($(this).text());
  //            $('#sub').hide();
  //        });
  //    });
  //    $('#sub').find("li").mouseover(function () {
  //        $(this).css({"background-color": "#E8E6E7", "color": "#225697"});
  //    });
  //    $('#sub').find("li").mouseout(function () {
  //        $(this).css({"background-color": "#ffffff", "color": "#626262"});
  //    });
  //})

  // 搜索下拉列表
  $('.input').click(function () {
      $(this).next('#sub').show();
      $('#sub li').click(function () {
          $('.input').html($(this).text());
          $('.subway').hide();
          //$('.hidden_value').html("<input type='hidden' name='searchType' value='"+$(this).text()+"' >");
      });
  });
  $('.subway').find("li").mouseover(function(){
      $(this).css({"background-color":"#E8E6E7","color":"#225697"});
  });
  $('.subway').find("li").mouseout(function(){
      $(this).css({"background-color":"#ffffff","color":"#626262"});
  });
