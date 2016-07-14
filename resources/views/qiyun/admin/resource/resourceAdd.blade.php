@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <style>
        #file_upload{
            width:163px;
            height:42px;
            position:relative;
            top:-38px;
            left:17px;
            opacity: 0;
        }
        .uploadarea_bar_r_msg{
            position: relative;
            top:-20px;
        }

        #file_uploada{
            width:163px;
            height:42px;
            position:relative;
            top:-37px;
            left:15px;
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
    </style>

    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="{{url('admin/index')}}">首页</a>
            </li>
            <li class="active">控制台</li>
        </ul><!-- .breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                    <i class="icon-search nav-search-icon"></i>
                                </span>
            </form>
        </div><!-- #nav-search -->
    </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="page-content" ng-controller="resourceAddController">
        <div class="page-header">
            <h1>
                资源管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加资源
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form  class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {{--<form name="test_form" ng-controller="TestCtrl">--}}

                        {{--<input type="radio" name="a" ng-model="a" value="1" /> 一般资源--}}

                        {{--<input type="radio" name="a" ng-model="a" value="2" /> 拓展资源--}}

                        {{--<span>{[ a ]}</span>--}}



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">上传资源</label>
                        <div class="col-sm-9">
                            <img src="{{url('/image/qiyun/resource/up.png')}}" class="upload">
                            <input id="file_upload" name="file_upload" type="file" multiple="true" value="" />
                            <div class="uploadarea_bar_r_msg"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">上传封面</label>
                        <div class="col-sm-9">
                            <img src="{{url('/image/qiyun/resource/upPic.png')}}" class="upload">
                            <input id="file_uploada" name="file_upload" type="file" multiple="true" value="" />
                            <!-- <div class="uploadarea_bar_r_msg"></div> -->
                            <div class="img_pre"><img src="{{url('/image/qiyun/resource/pre.png')}}" ></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">拓展资源</label>
                        <div class="col-sm-9">
                            <input type="radio" name="isexpand" ng-model="postdata.isexpand" value="1" /> No

                            <input type="radio" name="isexpand" ng-model="postdata.isexpand" value="2" /> Yes
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属学段</label>
                        <div class="col-sm-9">
                            <!-- 学段 -->
                            <select ng-model="postdata.resourceSection"  class="col-xs-10 col-sm-5" ng-options="x.id as x.sectionName for x in section" ng-change="select(1,postdata.resourceSection)">
                                <option value="">请选择学段</option>
                            </select>      
                        </div>
                    </div>

                    <div class="form-group" ng-if="postdata.isexpand == 1">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属学科</label>
                        <div class="col-sm-9">
                            <!-- 学科 -->
                            <select ng-model="postdata.resourceSubject"  class="col-xs-10 col-sm-5" ng-options="x.id as x.subjectName for x in studysubject" ng-change="select(2,postdata.resourceSubject)">
                                <option value="">请选择学科</option>
                            </select>   
                        </div>
                    </div>


                    <div class="form-group" ng-if="postdata.isexpand == 1">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属版本</label>
                        <div class="col-sm-9">
                            <!-- 版本 -->
                            <select ng-model="postdata.resourceEdition"  class="col-xs-10 col-sm-5" ng-options="x.id as x.editionName for x in studyedition" ng-change="select(3,postdata.resourceEdition)">
                                <option value="">请选择版本</option>
                            </select> 
                        </div>
                    </div>


                    <div class="form-group" ng-if="postdata.isexpand == 1">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属册别</label>
                        <div class="col-sm-9">
                            <!-- 册别 -->
                              <select ng-model="postdata.resourceGrade"  class="col-xs-10 col-sm-5"   ng-options="x.id as x.gradeName for x in studygrade" ng-change="select(4,postdata.resourceGrade)">
                                    <option value="">请选择册别</option>
                              </select>
                        </div>
                    </div>


                    <div class="form-group" ng-if="postdata.isexpand == 1">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属章节</label>
                        <div class="col-sm-9">
                            <!-- 章节 -->
                            <select ng-model="postdata.resourceChapter"  class="col-xs-10 col-sm-5"   ng-options="x.id as x.chapterName for x in studychapter" ng-change="select(5,postdata.resourceChapter)">
                                  <option value="">请选择章节</option>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group" ng-if="postdata.isexpand == 2">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">拓展类型</label>
                        <div class="col-sm-9">
                            <!-- 学科 -->
                            <select ng-model="postdata.expandId"  class="col-xs-10 col-sm-5" ng-options="x.id as x.selName for x in expandSels" >
                                <option value="">请选择拓展类型</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">资源类型</label>
                        <div class="col-sm-9">
                            <!-- 类型 -->
                            <select ng-model="postdata.resourceType"  class="col-xs-10 col-sm-5" ng-options="x.id as x.resourceTypeName for x in resourcetype" ng-change="select(5,postdata.resourceType)">
                                  <option value="">请选择类型</option>
                            </select>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">资源标题</label>

                        <div class="col-sm-9">
                            <input type="text"  id="form-field-1" placeholder="resourceTitle" class="col-xs-10 col-sm-5" ng-model="postdata.resourceTitle"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">资源描述</label>

                        <div class="col-sm-9">
                            <textarea  id="" cols="70" rows="5" class="col-xs-10 col-sm-5" ng-model="postdata.resourceIntro"></textarea>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" ng-click="post()">
                                <i class="icon-ok bigger-110"></i>
                                提交
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset" check-status ng-click="reset()">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>

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
            $('.uploadarea_bar_r_msg').html('资源发布成功！');
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
                'uploader' : '/admin/resource/doAddResource',
                'buttonText' : '',
                'post_params' : {
                    '_token' : '{{csrf_token()}}'
                },
                // 'fileSizeLimit' : 20000000,
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
                        resourcePath = data;
                        setTimeout('addMsg()',4000);
                    }
                }
        }); 

        $('#file_uploada').uploadify({
            'swf'      : '/image/qiyun/member/register/uploadify.swf',
            'uploader' : '/admin/resource/doAddResourcePic',
            'buttonText' : '',
            'post_params' : {
                '_token' : '{{csrf_token()}}'
            },
            'file_size_limit' : '5MB',
            'file_types' : " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;",
            'overrideEvents'  : ['onSelectError'],
            'onSelectError' : uploadify_onSelectError,
            'onUploadSuccess' : function(file, data, response) {
                // if(data == 1){
                //  alert('请登录!');
                // }else if(data == 2){
                //  alert('您不是教师,不能发布微课');
                // }else if(data == 0){
                //  alert('没有上传文件');
                // }else{
                //  resourcePic = data;
                //  $('.img_pre').html("<img width='170px' src='"+data+"'>");
                // }
                

                if(data == 0){
                    alert('没有上传文件');
                }else{
                    resourcePic = data;
                    $('.img_pre').html("<img width='170px' src='"+data+"'>");
                }       
            }
        });
  </script>
  <script type="text/javascript" src="{{ URL::asset('/js/qiyun/angular/controller/admin/resourceAddController.js') }}"></script>


@endsection

