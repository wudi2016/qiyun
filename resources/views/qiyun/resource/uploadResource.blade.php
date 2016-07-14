@extends('qiyun.layouts.layoutHome')

@section('title','上传资源')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/resource/postResource.css') }}">
@endsection

@section('content')
      <div class="body" ng-controller="uploadResourceController">

            <div class="fbzy">发布资源</div>
            <div class="dotline"><hr></div>
            <!-- <form action="/resource/douploadResource" method="post" enctype="multipart/form-data"> -->
            <form>
                <input type="hidden" name="MAX_FILE_SIZE" value="50000000">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="uploadarea">
                   
                        <div class="uploadarea_bar">
                              <div class="uploadarea_bar_l">*上传资源</div>
                              <div class="uploadarea_bar_r" >
                                    <img src="{{url('/image/qiyun/resource/up.png')}}" class="upload">

                                    <!-- <input type="file" name="resource" id="resource"  onchange="MyCtrl.prototype.setFile(this)">
                                    <div class="uploadarea_bar_r_msg">资源发布成功，所有用户可以查看</div> -->

                                    <input id="file_upload" name="file_upload" type="file" multiple="true" value="" />
                                    <div class="uploadarea_bar_r_msg"></div>

                                    <!-- <input type="file" name="resource" id="resource"  onchange="MyCtrl.prototype.setFile(this)"> -->
                                    <!-- <div class="uploadarea_bar_r_msg"  ng-bind="theFile"></div> -->
                              </div>
                        </div>

                        <div style="width:100%;clear:both"></div>

                        <div class="uploadarea_bar">
                              <div class="uploadarea_bar_l">*上传封面</div>
                              <div class="uploadarea_bar_r" >
                                    <img src="{{url('/image/qiyun/resource/upPic.png')}}" class="upload">

                                    <input id="file_uploada" name="file_upload" type="file" multiple="true" value="" />
                                    <div class="uploadarea_bar_r_msg"></div>

                                    <div class="img_pre"><img src="{{url('/image/qiyun/resource/pre.png')}}" ></div>
                              </div>
                        </div>

                        <div style="width:100%;clear:both"></div>

                        <div class="uploadarea_bar">
                            <div class="uploadarea_bar_l">*拓展资源</div>
                            <div class="uploadarea_bar_r" >
                                <div style="width：100%;height:5px;"></div>
                                <input type="radio" name="isexpand" ng-model="postdata.isexpand" value="1" /> No
                                <input type="radio" name="isexpand" ng-model="postdata.isexpand" value="2" /> Yes
                            </div>
                        </div>

                    <div style="width:100%;height:25px;clear:both"></div>

                    <div class="uploadarea_bar">
                              <div class="uploadarea_bar_l">*资源名称</div>
                              <div class="uploadarea_bar_r">
                              <input type="text" class="resname" name="resname" ng-model="postdata.resourceTitle">
                              </div>
                        </div>          

                        <div style="width:100%;height:25px;clear:both"></div>

                        <div class="uploadarea_bar">
                              <div class="uploadarea_bar_l">*资源类型</div>
                              <div class="uploadarea_bar_r">

                              <!-- 类型 -->
                              <select ng-model="postdata.resourceType" name="resourceType" class="restype" ng-options="x.id as x.resourceTypeName for x in resourcetype" ng-change="select(5,postdata.resourceType)">
                                    <option value="">请选择类型</option>
                              </select>

                              </div>
                        </div> 

                        <div style="width:100%;height:25px;clear:both"></div>

                        <div class="uploadarea_bar">
                              <div class="uploadarea_bar_l">*标签</div>
                              <div class="uploadarea_bar_r">

                              <!-- 学段 -->
                              <select ng-model="postdata.resourceSection" name="resourceSection" class="ressection" ng-options="x.id as x.sectionName for x in studysection" ng-change="select(1,postdata.resourceSection)">
                                    <option value="">请选择学段</option>
                              </select>

                              <!-- 学科 -->
                              <select ng-model="postdata.resourceSubject" ng-if="postdata.isexpand == 1" name="resourceSubject" class="ressubject" ng-options="x.id as x.subjectName for x in studysubject" ng-change="select(2,postdata.resourceSubject)">
                                    <option value="">请选择学科</option>
                              </select>

                              <!-- 拓展类别 -->
                              <select ng-model="postdata.expandId" ng-if="postdata.isexpand == 2" name="resourceSubject" class="ressubject" ng-options="x.id as x.selName for x in expandSels" >
                                  <option value="">请选拓展类别</option>
                              </select>

                              <img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic hide subjectLoading" alt="">

                              <!-- 版本 -->
                              <select ng-model="postdata.resourceEdition" ng-if="postdata.isexpand == 1" name="resourceEdition" class="resedition" ng-options="x.id as x.editionName for x in studyedition" ng-change="select(3,postdata.resourceEdition)">
                                    <option value="">请选择版本</option>
                              </select>

                              <img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic hide editionLoading" alt="">

                              <!-- 册别 -->
                              <select ng-model="postdata.resourceGrade" ng-if="postdata.isexpand == 1" name="resourceGrade" class="resgrade"   ng-options="x.id as x.gradeName for x in studygrade" ng-change="select(4,postdata.resourceGrade)">
                                    <option value="">请选择册别</option>
                              </select>

                              <img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic hide gradeLoading" alt="">

                              </div>
                        </div>   

                        <div style="width:100%;height:25px;clear:both"></div>

                        <div class="uploadarea_bar" ng-if="postdata.isexpand == 1">
                              <div class="uploadarea_bar_l">*章节</div>
                              <div class="uploadarea_bar_r">
                                    <!-- 章节 -->
                                    <!-- <textarea name="" id="" cols="77" rows="10"></textarea> -->
                                    <!-- <select name="" id="" class="chapter">
                                          <option value="">请选择章节</option>
                                    </select> -->
                                    <select ng-model="postdata.resourceChapter" name="resourceChapter" class="chapter"   ng-options="x.id as x.chapterName for x in studychapter" ng-change="select(5,postdata.resourceChapter)">
                                          <option value="">请选择章节</option>
                                    </select>

                                    {{--<img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic  chapterLoading" alt="">--}}

                              </div>
                        </div>   


                        <div style="width:100%;height:25px;clear:both"></div>

                        <div class="uploadarea_bar">
                              <div class="uploadarea_bar_l">资源描述</div>
                              <div class="uploadarea_bar_r">
                              <textarea name="" id="" cols="77" rows="10" style="resize:none" ng-model="postdata.resourceIntro"></textarea>
                              </div>
                        </div>   

                        <div style="width:100%;height:75px;clear:both"></div>
                </div>
                <div class="body_foot">
                  <div class="article"><input type="checkbox" name="" ng-model="serviceArticle">&nbsp;我已阅读并同意<span>发布资源条款</span></div>
                  <div class="body_foot_btn"><button ng-class="{disable : !serviceArticle}" ng-click="post()">完成并上传</button>&nbsp;&nbsp;<button type="reset">取消</button></div>
                </div>
            </form>

      </div>
      <div style="height:70px;"></div>
@endsection

@section('js')
      <script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/qiyun/resource/postResource.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('/js/qiyun/angular/controller/uploadResourceController.js') }}"></script>
@endsection