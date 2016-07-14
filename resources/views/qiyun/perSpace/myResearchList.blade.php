@extends('qiyun.layouts.layoutHome')

@section('title','个人中心更多列表')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/perSpace/myResourceList.css') }}">
@endsection

@section('content')
  <div class="body"  ng-controller="getMyListListController">
      <input type="hidden" name="hidden" value="{{$module}}"/>
          <div class="clear"></div>
          <div class="posi">
             <a href=""><div class="li_home">></div></a>
             <a href=""><div class="li_nxt">{{$title}}&nbsp;&nbsp; <strong>>></strong></div></a>
             <a href=""><div class="li_nxt resType">列表页</div></a>
          </div>
      <div class="clear"></div>
      <div class="listPage">
            <div class="listPage-row">
                @if($module == 'myResearchList')
                    <div class="listPage-items" ng-repeat="i in res">

                            <a href="{{url('/research/techGroupInfo/{[i.id]}')}}">
                                <div class="items-img">
                                    <img src="{{url('{[i.pic]}')}}" width=128 height=111>

                                </div>
                                <div class="items-txt">
                                    <div><span>教研协助组名：</span><span ng-bind="i.techResearchName"></span></div>
                                    <div ng-bind=" '创建：'+i.realname "></div>
                                    <div ng-bind=" '描述：'+(i.description?i.description:'无') "></div>
                                    <div ng-bind=" '发布时间：'+(i.created_at?i.created_at:'无') "></div>
                                </div>
                            </a>
                    </div>
                @elseif($module == 'myPrepareLessonList')
                    <div class="listPage-items" ng-repeat="i in res">
                            <a href="{{url('/research/lessonDetail/{[i.id]}')}}">
                                <div class="items-img">
                                    <img src="{{url('{[i.pic]}')}}" width=128 height=111>

                                </div>
                                <div class="items-txt">
                                    <div><span>备课主题：</span></span><span ng-bind="i.lessonSubjectName"></span></div>
                                    <div ng-bind="i.sectionName+(i.subjectName?i.subjectName:'')+i.gradeName"></div>
                                    <div ng-bind=" '创建：'+i.realname +'&nbsp;&nbsp;&nbsp;&nbsp;'+'教研组：'+ (i.techResearchName?i.techResearchName:'无') "></div>
                                    <div ng-bind=" '发布时间：'+i.created_at "></div>
                                </div>
                            </a>
                    </div>
                @elseif($module == 'myEvaluatList')
                    <div class="listPage-items" ng-repeat="i in res">
                        <a href="{{url('/research/evaluationInfo/{[i.id]}')}}">
                            <div class="items-img">
                                <img src="{{url('{[i.evaluatPic]}')}}" width=128 height=111>

                            </div>
                            <div class="items-txt">
                                <div><span>评课名称：</span></span><span ng-bind="i.evaluatName"></span></div>
                                <div ng-bind="'描述：'+ (i.evaluatDirection?i.evaluatDirection:'无')"></div>
                                <div ng-bind=" '创建：'+i.realname +'&nbsp;&nbsp;&nbsp;&nbsp;'+'授课时间：'+ (i.beginTime?i.beginTime:'无') "></div>
                                <div ng-bind=" '发布时间：'+i.created_at "></div>
                            </div>
                        </a>
                    </div>
                @elseif($module == 'myThemeList')
                    <div class="listPage-items" ng-repeat="i in res">
                        <a href="{{url('/research/subjectInfo/{[i.id]}')}}">
                            <div class="items-img">
                                <img src="{{url('{[i.pic]}')}}" width=128 height=111>

                            </div>
                            <div class="items-txt">
                                <div><span>教研主题：</span></span><span ng-bind="i.name"></span></div>
                                <div ng-bind="'描述：'+ (i.describe?i.describe:'无')"></div>
                                <div ng-bind=" '创建：'+ i.realname +'&nbsp;&nbsp;&nbsp;&nbsp;'+'参与人数：'+ (i.peoplenum?i.peoplenum:'无') "></div>
                                <div ng-bind=" '发布时间：'+i.create_at "></div>
                            </div>
                        </a>
                    </div>
                @endif

                </div>
              <div style="clear:both"></div>

              <div class="body_left_con body_left_con_now">
                  <div class="li_page" >
                      <tm-pagination conf="paginationConf"></tm-pagination>
                  </div>
              </div>

          </div>

    </div>

 @endsection
@section('js')
    <script src="{{ URL::asset('js/qiyun/angular/controller/getMyListListController.js') }}"></script>
    <script type="text/javascript">
        var module = $("input[name='hidden']").val();
//        console.log(module);
    </script>
@endsection