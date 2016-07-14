@extends('qiyun.layouts.layoutAdmin')
@section('content')
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
    <div class="page-content" ng-controller="chapterAddController">
        <div class="page-header">
            <h1>
                资源分类
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加教材目录
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form  class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属学段</label>
                        <div class="col-sm-9">
                            <!-- 学段 -->
                            <select ng-model="postdata.resourceSection"  class="col-xs-10 col-sm-5" ng-options="x.id as x.sectionName for x in section" ng-change="select(1,postdata.resourceSection)">
                                <option value="">请选择学段</option>
                            </select>      
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属学科</label>
                        <div class="col-sm-9">
                            <!-- 学科 -->
                            <select ng-model="postdata.resourceSubject"  class="col-xs-10 col-sm-5" ng-options="x.id as x.subjectName for x in studysubject" ng-change="select(2,postdata.resourceSubject)">
                                <option value="">请选择学科</option>
                            </select>   
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属版本</label>
                        <div class="col-sm-9">
                            <!-- 版本 -->
                            <select ng-model="postdata.resourceEdition"  class="col-xs-10 col-sm-5" ng-options="x.id as x.editionName for x in studyedition" ng-change="select(3,postdata.resourceEdition)">
                                <option value="">请选择版本</option>
                            </select> 
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属册别</label>
                        <div class="col-sm-9">
                            <!-- 册别 -->
                              <select ng-model="postdata.resourceGrade"  class="col-xs-10 col-sm-5"   ng-options="x.id as x.gradeName for x in studygrade" ng-change="select(4,postdata.resourceGrade)">
                                    <option value="">请选择册别</option>
                              </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属章节</label>
                        <div class="col-sm-9">
                            <!-- 章节 -->
                            <select ng-model="postdata.resourceChapter"  class="col-xs-10 col-sm-5"   ng-options="x.id as x.chapterName for x in studychapter" ng-change="select(5,postdata.resourceChapter)">
                                  <option value="">一级目录</option>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">章节名称</label>

                        <div class="col-sm-9">
                            <input type="text"  id="form-field-1" placeholder="chapterName" class="col-xs-10 col-sm-5" ng-model="postdata.chapterName"/>
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
                            <button class="btn" type="reset" ng-click="reset()">
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
  <script type="text/javascript" src="{{ URL::asset('/js/qiyun/angular/controller/admin/chapterAddController.js') }}"></script>
@endsection

