@extends('qiyun.layouts.layoutHome')

@section('title','资源列表')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/perSpace/myResourceList.css') }}">
@endsection

@section('content')
  <div class="body"  ng-controller="myResourceListController">
          <div class="clear"></div>
          <div class="posi">
             <a href=""><div class="li_home">></div></a>
             <a href=""><div class="li_nxt">我的资源&nbsp;&nbsp; <strong>>></strong></div></a>
             <a href=""><div class="li_nxt resType"></div></a>
          </div>
      <div class="clear"></div>
      <div class="listPage">
            <div class="listPage-row">
                
                <div class="listPage-items" ng-repeat="i in res">
                <a href="{{url('/resource/resourceDetail/{[i.id]}')}}">
                    <div class="items-img">
                        <img src="{{url('{[i.resourcePic]}')}}" width=128 height=111>

                        <!-- <img src="/image/qiyun/perSpace/16.png"> -->
                    </div>
                    <div class="items-txt">
                        <div><span>资源名：</span><span ng-bind="i.resourceTitle"></span></div>
                        <div ng-bind=" '点赞量：'+i.resourceClick "></div>
                        <div ng-bind=" '浏览量：'+i.resourceView "></div>
                        <div ng-bind=" '发布时间：'+i.created_at "></div>
                    </div>
                </a>
                </div>

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
    <script>
        var resType = {{ $rt }};
        var type = '';
        if(resType == 2){
            type='教案';
        }else if(resType == 3){
            type='课件';
        }else if(resType == 4){
            type='习题';
        }else if(resType == 5){
            type='素材';
        }else if(resType == 6){
            type='资源包';
        }else if(resType == 7){
            type='其他';
        }
        $('.resType').html(type);
    </script>
    <script src="{{ URL::asset('js/qiyun/angular/controller/myResourceListController.js') }}"></script>
@endsection