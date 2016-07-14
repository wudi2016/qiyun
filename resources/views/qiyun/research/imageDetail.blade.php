@extends('qiyun.layouts.layoutHome')

@section('title','备课资源详情')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/resource/resourceDetail.css') }}">
@endsection

@section('content')
    <div class="body" ng-controller="resourceDetailController">
      <div class="clear"></div>
      <div class="posi">
         <a href=""><div class="li_home"></div></a>
         <a href=""><div class="li_nxt"> 教研备课 > 备课图片详情</div></a>
      </div>

      <div class="de_con">
         <div class="de_con_l">
             <div class="info">
                  <div class="info_l" >上传时间: {{$resDetail->create_at}}</div>
                  <div class="info_l" >大小:{{$resDetail->size}}</div>
                  <div class="info_l" >贡献者: {{$resDetail->resourceAuthor}}</div>
             </div>
             <br />
             {{--<div class="de_con_l_des">简介: {{$resDetail->describe}}</div>--}}
             
             <div class="de_con_l_con">
                @if (in_array($type,['.mp4','.avi','.rmvb','.wmv','.3gp','.flv','.mpg']))
                  <video src="{{ URL::asset($resDetail->resourceurl) }}" width="100%" height="100%" controls="controls" preload>您的浏览器不支持 video 标签。</video>
                @elseif(in_array($type,['.jpg','.jpeg','.gif','.png','.bmp']))
                <div style="width:100%;height:100%;overflow:auto">
                  <img src="{{ URL::asset($resDetail->resourceurl) }}" style="max-width:100%;">
                </div>
                @else
                  <iframe src="{{ URL::asset($resDetail->resourceurl) }}" width="100%" height="100%"></iframe>
                @endif
             </div>
         </div>

         <div class="de_con_r" style="float:right">

            <div class="de_con_r_tj">相关备课推荐:</div>

            <div class="vde_con_r_con" ng-repeat="i in data.other">
               <a href=" {{url('/research/lessonDetail/{[i.id]}')}}">
                   <div class="vde_con_r_con_t" ng-bind="i.lessonSubjectName"></div>
               </a>
               <div class="vde_con_r_con_b">
                    <div class="vde_con_r_con_b_ll" ng-bind=" '浏览:' + i.lessonView"></div>
                    <div class="vde_con_r_con_b_rq" style="float: right" ng-bind=" i.created_at"></div>
               </div>
            </div>

            <div class="spinner" style="margin: 150px auto -0;" ng-class="{disable: loading.other}">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div>
    
            <div  id="errorMessage" style="margin: 150px auto;" ng-class="{disable: error.other}">数据加载失败，<br>请尝试 <a class="click" ng-click="reload('other');">刷新</a> 一下</div>
            <div  id="errorMessage" style="margin: 150px auto;" ng-class="{disable: empty.other}">没有找到相关备课！</div>

         </div>
      </div>
    </div>
@endsection

@section('js')
	<script type="text/javascript" src="{{ URL::asset('/js/qiyun/angular/controller/imageDetailController.js') }}"></script>
@endsection