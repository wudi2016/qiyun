@extends('qiyun.layouts.layoutHome')

@section('title','资源首页')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/resource/resource.css') }}">
@endsection

@section('content')
    <div class="body" ng-controller="resourceController">
		<div class="mid">
			<div class="mid_l">
                            <div class="menu_title">
                                   教育资源
                            </div>
                            <ul>
                                   {{--小初高--}}
                                   @foreach ($sections as $key => $section)
                                          <li>
                                                 <!-- 学段 -->
                                                 <div class="fir_m"><span class="{{'a'.$key}}"></span><a href="{{url('/resource/resourceList/'.$section->id)}}"><span class="mb">{{$section->sectionName}}教育&nbsp;&nbsp;&nbsp;></span></a></div>
                                                 <div class="nav_more" style="display:none">
                                                        
                                                               @foreach ($section->subjects as $subject)
                                                                      <div class="more_con">
                                                                               <!-- 学科 -->
                                                                               <a href="{{url('/resource/resourceList/'.$section->id.'/'.$subject->id)}}"><div class="more_con_l">{{$subject->subjectName}}</div></a>
                                                                               <div class="more_con_r">
                                                                                       <!-- 版本 -->
                                                                                       @foreach ($subject->editions as $edition)
                                                                                           <a href="{{url('/resource/resourceList/'.$section->id.'/'.$subject->id.'/'.$edition->id)}}"><span class="cont">{{$edition->editionName}}</span></a>
                                                                                       @endforeach
                                                                               </div>
                                                                      </div>
                                                                      <div class="clear"></div>
                                                               @endforeach
                                                        
                                                 </div>
                                          </li>                                       
                                   @endforeach
                                   {{--拓展--}}
                                    <li>
                                        <div class="fir_m"><span class="a3"></span><a href="{{url('/resource/expandResourceList/1')}}"><span class="mb">拓展教育&nbsp;&nbsp;&nbsp;></span></a></div>
                                        <div class="nav_more" style="display:none">
                                            @foreach ($expands as $k => $sec)
                                            <div class="more_con">
                                                <a href="{{url('/resource/expandResourceList/1/'.$sec->id)}}"><div class="more_con_l">{{$sec->sectionName}}</div></a>
                                                  <div class="more_con_r">
                                                       @foreach($sec -> types as $type)
                                                          <a href="{{url('/resource/expandResourceList/1/'.$sec->id.'/'.$type->id)}}"><span class="cont">{{$type -> selName}}</span></a>
                                                       @endforeach
                                                  </div>
                                            </div>
                                            <div class="clear"></div>
                                            @endforeach

                                        </div>
                                    </li>

       				<!-- <li>
       				       <div class="fir_m"><span class="bb"></span><span class="mb">初中教育&nbsp;&nbsp;&nbsp;></span></div>
       					<div class="nav_more" style="display:none">
       					       <a href="{{url('/resource/resourceList/2')}}">
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">语文</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">鲁教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">语文A版</span>
                                                        	  	   <span class="cont">语文S版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">语文S版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">浙教版</span>
                                                        	  	   <span class="cont">鄂教版</span>
                                                        	  	   <span class="cont">湘教版</span>
                                                        	  	   <span class="cont">教科版</span>

                                                        	  </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">数学</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">沪教版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  	   <span class="cont">西师大版</span>

                                                        	  </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">英文</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">沪教版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  	   <span class="cont">西师大版</span>

                                                        	  </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">科学</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">沪教版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  	   <span class="cont">西师大版</span>

                                                        	  </div>
                                                        </div>
                                                 </a>
       					</div>
       				</li> -->

       				<!-- <li>
       				       <div class="fir_m"><span class="cc"></span><span class="mb">高中教育&nbsp;&nbsp;&nbsp;></span></div>
       					<div class="nav_more" style="display:none">
       					       <a href="{{url('/resource/resourceList/3')}}">
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">语文</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">鲁教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">语文A版</span>
                                                        	  	   <span class="cont">语文S版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">语文S版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">浙教版</span>
                                                        	  	   <span class="cont">鄂教版</span>
                                                        	  	   <span class="cont">湘教版</span>
                                                        	  	   <span class="cont">教科版</span>
                                                        	  </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">数学</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">沪教版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">英文</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">沪教版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">科学</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">沪教版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  </div>
                                                        </div>
                                                 </a>
       					</div>
       				</li> -->

       				<!-- <li>
       				       <div class="fir_m"><span class="dd"></span><span class="mb">拓展教育&nbsp;&nbsp;&nbsp;></span></div>
       					<div class="nav_more" style="display:none">
       					       <a href="{{url('/resource/resourceList')}}">
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">语文</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">鲁教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">语文A版</span>
                                                        	  	   <span class="cont">语文S版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">语文S版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">浙教版</span>
                                                        	  	   <span class="cont">鄂教版</span>
                                                        	  	   <span class="cont">湘教版</span>
                                                        	  	   <span class="cont">教科版</span>
                                                        	  	   <span class="cont">教科版</span>
                                                        	  	   <span class="cont">教科版</span>
                                                        	  </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">数学</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">沪教版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">英文</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">沪教版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div class="more_con">
                                                        	  <div class="more_con_l">科学</div>
                                                        	  <div class="more_con_r">
                                                        	  	   <span class="cont">人教版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">北京版</span>
                                                        	  	   <span class="cont">冀教版</span>
                                                        	  	   <span class="cont">北师大版</span>
                                                        	  	   <span class="cont">苏教版</span>
                                                        	  	   <span class="cont">沪教版</span>
                                                        	  	   <span class="cont">青岛版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  	   <span class="cont">西师大版</span>
                                                        	  </div>
                                                        </div>
                                                 </a>
       					</div>
       				</li> -->

       		       </ul>
			</div>
			<div class="mid_m">
			</div>
			<div class="mid_r">
				<!-- <div class="mid_r_l">
					<sapn class="clo">12,820</sapn>个空间
				</div> -->
				<div class="mid_r_m">
					<sapn class="clo">{{$resNum}}</sapn>个资源
				</div>
				<div class="mid_r_n">
					<sapn class="clo">{{$weekResNum}}</sapn>份本周更新
				</div>
				<a href="{{url('/resource/uploadResource')}}"><div class="scwd"></div></a>
				<div class="des">交流分享你的优质资源</div>
			</div>
		</div>
		<div class="bar"></div>
		<div class="ziyuan">
			<div class="ziyuan_l">
                         <!-- 小学资源 -->
       			<div class="ziyuan_l_con">

       				<div class="ziyuan_l_con_top">
       				 	<div class="ziyuan_l_con_top_l">小学教育资源</div>
       				 	<div class="ziyuan_l_con_top_m ziyuan_l_con_top_m_1">
       				 		 <div class="cls_nm select">语文</div>
       				 		 <div class="cls_nm ">数学</div>
       				 		 <div class="cls_nm ">英文</div>
       				 	</div>
       				 	<a href="{{url('/resource/resourceList/1')}}"><div class="ziyuan_l_con_top_r" style="color:#000000">更多</div></a>
       				</div>

       				<div class="ziyuan_l_con_body" ng-if="sblock">
       					<div class="ziyuan_l_con_body_l">
       			                   <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in schinese">
       			                        <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
       			                        </div>
       			                        <div class="ziyuan_l_con_body_t_r">
       			                          <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
       			                        </div>
       			                   </div>
       			                   <div class="ziyuan_l_con_body_b">
       			                        <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in schinese">
       			                           <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
       			                        </div>
       			                        <!-- <div class="ziyuan_l_con_body_b_c">
       			                           <a href="#">一年级语文下册教案...</a>
       			                        </div>
       			                        <div class="ziyuan_l_con_body_b_c">
       			                           <a href="#">一年级语文下册教案...</a>
       			                        </div>
       			                        <div class="ziyuan_l_con_body_b_c">
       			                           <a href="#">一年级语文下册教案...</a>
       			                        </div> -->                        
       			                   </div>
       			              </div>
       					<div class="ziyuan_l_con_body_r">
       			                   <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in schinese">
       			                        <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
       			                        </div>
       			                        <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
       			                        </div>
       			                   </div>
       			                   <div class="ziyuan_l_con_body_b">
       			                        <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in schinese">
                                                       <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
       			                        </div>
       			                        <!-- <div class="ziyuan_l_con_body_b_c">
       			                           <a href="#">一年级语文下册教案...</a>
       			                        </div>
       			                        <div class="ziyuan_l_con_body_b_c">
       			                           <a href="#">一年级语文下册教案...</a>
       			                        </div>
       			                        <div class="ziyuan_l_con_body_b_c">
       			                           <a href="#">一年级语文下册教案...</a>
       			                        </div> -->                        
       			                   </div>
       			              </div>
       				</div>

       			       <div class="ziyuan_l_con_body hide" ng-if="sblock">
       			              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in smath">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
       			                   <div class="ziyuan_l_con_body_b">
                                                     <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in smath">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                     </div>
       			                        <!-- <div class="ziyuan_l_con_body_b_c">
       			                           <a href="#">一年级数学下册教案...</a>
       			                        </div> -->                      
       			                   </div>
       			              </div>
       			              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in smath">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
       			                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index >5" effet-a ng-repeat="i in smath">
                                                       <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
       			                        <!-- <div class="ziyuan_l_con_body_b_c">
       			                           <a href="#">一年级数学下册教案...</a>
       			                        </div> -->
       			                      
       			                   </div>
       			              </div>
       			       </div>

       			       <div class="ziyuan_l_con_body hide" ng-if="sblock">
       			              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in senglish">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
                                               <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in senglish">
                                                 <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                               </div>                                                      
       			                   <!-- <div class="ziyuan_l_con_body_b">
       			                        <div class="ziyuan_l_con_body_b_c">
       			                           <a href="#">一年级英文下册教案...</a>
       			                        </div>                      
       			                   </div> -->
       			              </div>
       			              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in senglish">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
       			                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in senglish">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                                       
       			                        <!-- <div class="ziyuan_l_con_body_b_c">
       			                           <a href="#">一年级英文下册教案...</a>
       			                        </div> -->
       			                   </div>
       			              </div>
       			       </div>

                                   <div class="spinner" style=" padding:120px 0px;" ng-if="sloading">
                                          <div class="bounce1"></div>
                                          <div class="bounce2"></div>
                                          <div class="bounce3"></div>
                                   </div>

                                   <div id="errorMessage" style="padding:120px 0px;"  ng-if="smsg">数据加载失败，请尝试 <a ng-click="reload('getPrimaryRes');">刷新</a> 一下</div>
                                   <div id="errorMessage" style="padding:120px 0px;"  ng-if="sempty">没有找到相关资源！</div>
                                   
       			</div>
                        <!-- 初中资源 -->
       		       <div class="ziyuan_l_con">
       		              <div class="ziyuan_l_con_top">
              		              <div class="ziyuan_l_con_top_l ziyuan_l_con_top_l_bg_b">初中教育资源</div>
              		              <div class="ziyuan_l_con_top_m ziyuan_l_con_top_m_2">
              		                 <div class="cls_nm">语文</div>
              		                 <div class="cls_nm">数学</div>
              		                 <div class="cls_nm">英文</div>
              		              </div>
              		              <a href="{{url('/resource/resourceList/2')}}"><div class="ziyuan_l_con_top_r" style="color:#000000">更多</div></a>
       		              </div>

       		              <div class="ziyuan_l_con_body" ng-if="mblock">
              		              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in mchinese">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in mchinese">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div> 
                                                    <!-- <div class="ziyuan_l_con_body_b_c">
                                                       <a href="#">一年级语文下册教案...</a>
                                                    </div> -->                        
              		                   </div>
              		              </div>
              		              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in mchinese">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in mchinese">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                  
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级语文下册教案...</a>
              		                        </div>  -->                      
              		                   </div>
              		              </div>
       		              </div>

       		              <div class="ziyuan_l_con_body hide" ng-if="mblock">
              		              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in mmath">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in mmath">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                  
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">初一数学下册教案...</a>
              		                        </div>  -->                     
              		                   </div>
              		              </div>
              		              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in mmath">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in mmath">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                    
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">初一级数学下册教案...</a>
              		                        </div> -->
              		                      
              		                   </div>
              		              </div>
       		              </div>

       		              <div class="ziyuan_l_con_body hide" ng-if="mblock">
              		              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in menglish">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in menglish">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                  
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级英文下册教案...</a>
              		                        </div> -->                      
              		                   </div>
              		              </div>
              		              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in menglish">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in menglish">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                  
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级英文下册教案...</a>
              		                        </div> -->
              		                      
              		                   </div>
              		              </div>
       		              </div>

                                   <div class="spinner" style=" padding:120px 0px;" ng-if="mloading">
                                          <div class="bounce1"></div>
                                          <div class="bounce2"></div>
                                          <div class="bounce3"></div>
                                   </div>

                                   <div id="errorMessage" style="padding:120px 0px;"  ng-if="mmsg">数据加载失败，请尝试 <a ng-click="reload('getJuniorRes');">刷新</a> 一下</div>
                                   <div id="errorMessage" style="padding:120px 0px;"  ng-if="mempty">没有找到相关资源！</div>

       		       </div>

                        <!-- 高中资源 -->
       		       <div class="ziyuan_l_con">
       		              <div class="ziyuan_l_con_top">
              		              <div class="ziyuan_l_con_top_l ziyuan_l_con_top_l_bg_c">高中教育资源</div>
              		              <div class="ziyuan_l_con_top_m ziyuan_l_con_top_m_3">
              		                 <div class="cls_nm">语文</div>
              		                 <div class="cls_nm">数学</div>
              		                 <div class="cls_nm">英文</div>
              		              </div>
              		              <a href="{{url('/resource/resourceList/3')}}"><div class="ziyuan_l_con_top_r" style="color:#000000">更多</div></a>
       		              </div>

       		              <div class="ziyuan_l_con_body" ng-if="hblock">
              		              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in hchinese">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in hchinese">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                         
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级语文下册教案...</a>
              		                        </div> -->                      
              		                   </div>
              		              </div>
              		              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in hchinese">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in hchinese">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                         
              		                       <!--  <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级语文下册教案...</a>
              		                        </div> -->                      
              		                   </div>
              		              </div>
       		              </div>

       		              <div class="ziyuan_l_con_body hide" ng-if="hblock">
              		              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in hmath">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in hmath">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                          
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级数学下册教案...</a>
              		                        </div>  -->                     
              		                   </div>
              		              </div>
              		              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in hmath">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in hmath">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                        
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级数学下册教案...</a>
              		                        </div> -->
              		                      
              		                   </div>
              		              </div>
       		              </div>

       		              <div class="ziyuan_l_con_body hide" ng-if="hblock">
              		              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in henglish">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in henglish">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                        
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级英文下册教案...</a>
              		                        </div> -->                      
              		                   </div>
              		              </div>
              		              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in henglish">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in henglish">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                        
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级英文下册教案...</a>
              		                        </div> -->
              		                   </div>
              		              </div>
       		              </div>


                                   <div class="spinner" style=" padding:120px 0px;" ng-if="hloading">
                                          <div class="bounce1"></div>
                                          <div class="bounce2"></div>
                                          <div class="bounce3"></div>
                                   </div>

                                   <div id="errorMessage" style="padding:120px 0px;"  ng-if="hmsg">数据加载失败，请尝试 <a ng-click="reload('getSeniorRes');">刷新</a> 一下</div>
                                   <div id="errorMessage" style="padding:120px 0px;"  ng-if="hempty">没有找到相关资源！</div>

       		       </div>
                        <!-- 拓展资源 -->
       		       <div class="ziyuan_l_con">
       		              <div class="ziyuan_l_con_top">
              		              <div class="ziyuan_l_con_top_l ziyuan_l_con_top_l_bg_d">拓展资源</div>
              		              <div class="ziyuan_l_con_top_m ziyuan_l_con_top_m_4">
              		                 <div class="cls_nm">小学</div>
              		                 <div class="cls_nm">初中</div>
              		                 <div class="cls_nm">高中</div>
              		              </div>
              		              <div class="ziyuan_l_con_top_r"><a href="{{url('/resource/expandResourceList')}}" style="color:#000000">更多</a></div>
       		              </div>

       		              <div class="ziyuan_l_con_body" ng-if="eblock">
              		              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in echinese">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in echinese">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                                 
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级语文下册教案...</a>
              		                        </div> -->                      
              		                   </div>
              		              </div>
              		              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in echinese">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in echinese">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                                
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级语文下册教案...</a>
              		                        </div> -->                     
              		                   </div>
              		              </div>
       		              </div>

       		              <div class="ziyuan_l_con_body hide" ng-if="eblock">
              		              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in emath">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in emath">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                                 
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级数学下册教案...</a>
              		                        </div> -->                      
              		                   </div>
              		              </div>
              		              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in emath">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in emath">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                                
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级数学下册教案...</a>
              		                        </div> -->
              		                      
              		                   </div>
              		              </div>
       		              </div>

       		              <div class="ziyuan_l_con_body hide" ng-if="eblock">
              		              <div class="ziyuan_l_con_body_l">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==0"  ng-repeat="i in eenglish">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
                                               <div class="ziyuan_l_con_body_b_c" ng-if="$index >= 1 && $index<=4" effet-a ng-repeat="i in eenglish">
                                                    <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                               </div>                                                
              		                   <!-- <div class="ziyuan_l_con_body_b">
              		                        <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级英文下册教案...</a>
              		                        </div>                      
              		                   </div> -->
              		              </div>
              		              <div class="ziyuan_l_con_body_r">
                                               <div class="ziyuan_l_con_body_t" ng-if="$index==5"  ng-repeat="i in eenglish">
                                                    <div class="ziyuan_l_con_body_t_l">
                                                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="155" height="105" alt="">
                                                    </div>
                                                    <div class="ziyuan_l_con_body_t_r">
                                                      <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>
                                               </div>
              		                   <div class="ziyuan_l_con_body_b">
                                                    <div class="ziyuan_l_con_body_b_c" ng-if="$index > 5" effet-a ng-repeat="i in eenglish">
                                                        <a href="{{url('/resource/resourceDetail/{[i.id]}')}}" ng-bind="i.resourceTitle"></a>
                                                    </div>                                               
              		                        <!-- <div class="ziyuan_l_con_body_b_c">
              		                           <a href="#">一年级英文下册教案...</a>
              		                        </div> -->
              		                      
              		                   </div>
              		              </div>
       		              </div>

                                   <div class="spinner" style=" padding:120px 0px;" ng-if="eloading">
                                          <div class="bounce1"></div>
                                          <div class="bounce2"></div>
                                          <div class="bounce3"></div>
                                   </div>

                                   <div id="errorMessage" style="padding:120px 0px;"  ng-if="emsg">数据加载失败，请尝试 <a ng-click="reload('getExpandRes');">刷新</a> 一下</div>
                                   <div id="errorMessage" style="padding:120px 0px;"  ng-if="eempty">没有找到相关资源！</div>


       		       </div>
			</div>
			<div class="ziyuan_r">
                     <!-- 最新资源列表 -->
		          <div class="order">
		             <div class="order_bor">
		                <div class="order_t_new"><span class="tt">最新资源排行</span> <span class="lj"><a href="" class="mor">更多</a></span></div>

		                <div class="order_body" effet-b ng-repeat="i in newstRes" ng-if="newstblock">
		                     <a href="{{url('/resource/resourceDetail/{[i.id]}')}}"><span class="order_body_n" ng-bind="$index+1+'&nbsp;&nbsp;&nbsp;'+i.resourceTitle "></span></a>
		                </div>

                              <div class="spinner" style=" padding:143px 0px;" ng-if="newstloading">
                                   <div class="bounce1"></div>
                                   <div class="bounce2"></div>
                                   <div class="bounce3"></div>
                              </div>
                              <div id="errorMessage" style="padding:143px 0px;"  ng-if="newstmsg">数据加载失败，请尝试 <a ng-click="reload('newstRes');">刷新</a> 一下</div>
                              <div id="errorMessage" style="padding:143px 0px;"  ng-if="newstempty">没有找到相关资源！</div>

		             </div>
		          </div>
                       
                     <!-- 热门资源排行 -->
		          <div class="order">
		             <div class="order_bor">
		                <div class="order_t_hot"><span class="tt">热门资源排行</span> <span class="lj"><a href="" class="mor">更多</a></span></div>

                              <div class="order_body" effet-b ng-repeat="i in hotRes" ng-if="hotblock">
                                   <a href="{{url('/resource/resourceDetail/{[i.id]}')}}"><span class="order_body_n" ng-bind="$index+1+'&nbsp;&nbsp;&nbsp;'+i.resourceTitle "></span></a>
                              </div>   

                              <div class="spinner" style=" padding:143px 0px;" ng-if="hotloading">
                                   <div class="bounce1"></div>
                                   <div class="bounce2"></div>
                                   <div class="bounce3"></div>
                              </div>
                              <div id="errorMessage" style="padding:145px 0px;"  ng-if="hotmsg">数据加载失败，请尝试 <a ng-click="reload('hotRes');">刷新</a> 一下</div>
                              <div id="errorMessage" style="padding:145px 0px;"  ng-if="hotempty">没有找到相关资源！</div>

		             </div>
		          </div>
                     <!-- 教师贡献排行 -->
		          <div class="order">
		              <div class="order_bor">
       		              <div class="order_t_tec"><span class="tt">教师贡献排行</span> <span class="lj"><a href="" class="mor">更多</a></span></div>
       		              
                                   <div class="order_body" ng-repeat="i in teaName" ng-if="teablock">
                                         <div class="order_body_l">
                                               <span class="order_body_n" ng-bind=" $index+1+'&nbsp;&nbsp;&nbsp;'+i.realname "></span>
                                         </div>
                                         <div class="order_body_r" ng-bind="i.resNum+'篇'"></div>
                                   </div>

                                   <!-- <div class="order_body">
       		                    <div class="order_body_l">
       		                      <span class="order_body_n">1</span>&nbsp;&nbsp;&nbsp;孙俪祥
       		                    </div>
       		                    <div class="order_body_r">34.125篇</div>
       		              </div> -->		                
	                		     
                                   <div class="spinner" style=" padding:143px 0px;" ng-if="tealoading">
                                          <div class="bounce1"></div>
                                          <div class="bounce2"></div>
                                          <div class="bounce3"></div>
                                   </div>
                                   <div id="errorMessage" style="padding:145px 0px;"  ng-if="teamsg">数据加载失败，请尝试 <a ng-click="reload('teaName');">刷新</a> 一下</div>
                                   <div id="errorMessage" style="padding:145px 0px;"  ng-if="teaempty">没有找到相关数据！</div>


		              </div>
		          </div>
		    </div>
		</div>
	</div>
@endsection


@section('js')
<script>
      var status = {!! session('status') !!};

      var delay = setInterval("msg()",1000);
      var msg = function(){
             if(status == 1){
               if(confirm('请登录！'))
               window.location.href="/";
             }else if(status ==2){
               alert('抱歉，您不是教师！');
             }       
             clearInterval(delay);
      }

      if(status == 0){
              window.location.href="/";
      }
</script>
<script type="text/javascript" src="{{ URL::asset('js/qiyun/resource/resource.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/qiyun/angular/controller/resourceController.js') }}"></script>
@endsection