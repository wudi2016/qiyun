@extends('qiyun.layouts.layoutAdmin')
@section('content')

<style>
        .uploadarea_bar_r_msg{
                position: relative;
                top:-20px;
        }

        #path{
            width:163px;
            height:30px;
            position:relative;
            top:-38px;
            left:17px;
            opacity: 0;
        }
        #logo{
            width:163px;
            height:30px;
            position:relative;
            top:-38px;
            left:17px;
            opacity: 0;
        }

        /*
        Uploadify
        Copyright (c) 2012 Reactive Apps, Ronnie Garcia
        Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
        */

        .uploadify {
            position: relative;
            margin-bottom: 1em;
        }
        .uploadify-button {
            background-color: #41A6EE;
            background-position: center top;
            background-repeat: no-repeat;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            border-radius: 30px;
            border: 2px solid #41A6EE;
            color: #FFF;
            font: bold 12px Arial, Helvetica, sans-serif;
            text-align: center;
            text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
            width: 100%;
        }
        .uploadify:hover .uploadify-button {
            background-color: #1590ED;
            background-position: center bottom;
        }
        .uploadify-button.disabled {
            background-color: #D0D0D0;
            color: #808080;
        }
        .uploadify-queue {
            margin-bottom: 1em;
        }
        .uploadify-queue-item {
            background-color: #F5F5F5;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            font: 11px Verdana, Geneva, sans-serif;
            margin-top: 5px;
            max-width: 350px;
            padding: 10px;
        }
        .uploadify-error {
            background-color: #FDE5DD !important;
        }
        .uploadify-queue-item .cancel a {
            background: url('./uploadify-cancel.png') 0 0 no-repeat;
            float: right;
            height: 16px;
            text-indent: -9999px;
            width: 16px;
        }
        .uploadify-queue-item.completed {
            background-color: #E5E5E5;
        }
        .uploadify-progress {
            background-color: #E5E5E5;
            margin-top: 10px;
            width: 100%;
        }
        .uploadify-progress-bar {
            background-color: #0099FF;
            height: 3px;
            width: 1px;
        }

        /*必选样式*/
        .lessonName_verify{
            color:red;
            line-height:28px;
        }


</style>

    <div class="page-content">
        <div class="page-header">
            <h1>
                微课管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    微课添加页面
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form action="{{url('admin/microlesson/addmicrosub')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
{{--
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input type="hidden" name="logo" value="{{$data->logo}}">
--}}                 
                   <div id="micPath"></div>
                   <div id="micLogo"></div>
                    


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">上传微课</label>
                        <div class="col-sm-9">
                            <img src="{{url('/image/qiyun/microLesson/weike.png')}}" class="upload">
                            <span class="lessonName_verify">(必选 *)</span>
                            <input id="path" name="path" type="file" multiple="true" value="" />
                            <div class="uploadarea_bar_r_msg"></div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">微课logo</label>
                        <div class="col-sm-9">
                            <img src="{{url('/image/qiyun/microLesson/uplogo.png')}}" class="upload">
                            <span class="lessonName_verify">(必选 *)</span>
                            <input id="logo" name="logo" type="file" multiple="true" value="" />
                            <div class="uploadarea_bar_r_msg1"></div>
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课名称 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="lessonName" id="form-field-1" placeholder="微课名称" class="col-xs-10 col-sm-5" value="" />
                            <span class="lessonName_verify">(必选 *)</span>
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课主题 </label>

                        <div class="col-sm-9">
                            <input type="text" name="lessonTitle" id="form-field-1" placeholder="微课主题" class="col-xs-10 col-sm-5" value="" />
                            <span class="lessonName_verify">(必选 *)</span>
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课简介 </label>

                        <div class="col-sm-9">
                            <input type="text" name="lessonDes" id="form-field-1" placeholder="微课简介" class="col-xs-10 col-sm-5" value="" />
                            <span class="lessonName_verify">(必选 *)</span>
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  学段 </label>
                        <div class="col-sm-9">
                            <select name="section" id="section" class="col-xs-10 col-sm-5" >
                                <option value="" selected>--学段--</option>
                                @foreach($section as $sections)
                                <option value="{{$sections->id}}">{{$sections->sectionName}}</option>
                                @endforeach
                            </select>
                            <span class="lessonName_verify">(必选 *)</span>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  年级 </label>
                        <div class="col-sm-9">
                            <select name="grade" id="grade" class="col-xs-10 col-sm-5" >
                                <option value="" selected>--年级--</option>
                               
                                <option value=""></option>
                            
                            </select>
                             <span class="lessonName_verify">(必选 *)</span>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  学科 </label>
                        <div class="col-sm-9">
                            <select name="subject" id="subject" class="col-xs-10 col-sm-5" >
                                <option value="" selected>--学科--</option>
                               
                                <option value=""></option>
                            
                            </select>
                             <span class="lessonName_verify">(必选 *)</span>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  发布作者 </label>
                        <div class="col-sm-9">
                            <select name="author" id="author" class="col-xs-10 col-sm-5" >
                                <option value="" selected>--发布作者--</option>
                                @foreach($userinfo as $userinfos)
                                <option value="{{$userinfos->id}}">{{$userinfos->realname}}</option>
                                @endforeach
                            </select>
                             <span class="lessonName_verify">(必选 *)</span>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课点击数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="viewNum" id="form-field-1" placeholder="微课点击数" class="col-xs-10 col-sm-5"  />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课点赞数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="likeNum" id="form-field-1" placeholder="微课点赞数" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  微课状态 </label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="col-xs-10 col-sm-5" >
                                <option value="0">发布</option>
                                <option value="1">未审核</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  微课类型 </label>
                        <div class="col-sm-9">
                            <select name="type" id="type" class="col-xs-10 col-sm-5" >
                                <option value="0">拍摄</option>
                                <option value="1">录制音频</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group" id="hint_all_info" style="display:none;">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>

                        <div class="col-sm-9"  >
                            <font color="red">*请填写全部必选信息</font>
                        </div>
                    </div>

                  
                   



                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button id="buttonconfirm" class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                提交
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('js')

<script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>
 
<script>
        // alert($('meta[name="csrf-token"]').attr('content'));
        var resourcePath = '';
        var resourcePic = '';

        var addMsg = function(){
            $('.uploadarea_bar_r_msg').html('发布成功，所有用户可以查看');
        }

        $('#path').uploadify({
                'swf'      : '/image/qiyun/member/register/uploadify.swf',
                'uploader' : '/admin/microlesson/doAddmicrolesson',
                'buttonText' : '',
                'post_params' : {
                    '_token' : '{{csrf_token()}}'
                },
                'file_types' : " *.mp4;",
                // 'fileSizeLimit' : 20000000,
                'onUploadSuccess' : function(file, data, response) {
                             resourcePath = data;
                             $('#micPath').html( ' <input type="hidden" name="path" value='+data+' /> ' );
                             setTimeout('addMsg()',4000);                   
                }
        }); 



        var addMsg1 = function(){
            $('.uploadarea_bar_r_msg1').html('发布成功，所有用户可以查看');
        }

          $('#logo').uploadify({
            'swf'      : '/image/qiyun/member/register/uploadify.swf',
            'uploader' : '/admin/microlesson/doAddmicrolesson',
            'buttonText' : '',
            'post_params' : {
                '_token' : '{{csrf_token()}}'
            },
            'file_size_limit' : '5MB',
             'file_types' : " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;",
            'onUploadSuccess' : function(file, data, response) {
                resourcePath = data;
                $('#micLogo').html('<input type="hidden" name="logo" value='+data +' >'  );
                        setTimeout('addMsg1()',4000);

            }
        });

</script>

    <script language="javascript" type="text/javascript">
        //年级
        $(function(){
            $('#section').change(function(){
            var sectionid = $('#section').val();
            // alert(sectionid);
                $.ajax({
                    type:'get',
                    data:{'id':sectionid},
                    url:'{{url('admin/microlesson/sectiongrade')}}',
                    success:function(data){
                        // alert(data);
                        var str = '<option value="">---年级---</option>';
                        $.each(data,function(i,val){
                            str += '<option value="'+val.id+'">'+val.gradeName+'</option>';
                        })
                        $('#grade').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })

            // 学科
            $('#grade').change(function(){
                var gradeid = $('#grade').val();
                // alert(gradeid);
                $.ajax({
                    type:'get',
                    data:{'id':gradeid},
                    url:'{{url('admin/microlesson/gradesubject')}}',
                    success:function(data){
                        var str = '<option value="">---学科---</option>';
                        $.each(data,function(i,val){
                            str += '<option value="'+val.id+'">'+val.subjectName+'</option>';
                        })
                        $('#subject').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })



            $('#buttonconfirm').click(function(){
                if( ($("input[name='lessonName']").val() == '') || ($("input[name='lessonTitle']").val() == '') || ($("input[name='lessonDes']").val() == '') || ($("select[name='author'] option:checked").val() == '') ||  ($("select[name='section'] option:checked").val() == '') || ($("select[name='grade'] option:checked").val() == '')  || ($("select[name='subject'] option:checked").val() == '')  || ($('.uploadarea_bar_r_msg1').html() == '') || ($('.uploadarea_bar_r_msg').html() == '')  ){ 
                    $('#hint_all_info').show();                  
                    return false;
                }
            })




        })
    
    </script>

  



    <script type="text/javascript" src="{{ URL::asset('/js/qiyun/angular/controller/admin/resourceAddController.js') }}"></script>

@endsection