@extends('qiyun.layouts.layoutHome')

@section('title', '家长个人主页')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/qiyun/perSpace/par_collection.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/member/uploadify.css') }}">

@endsection

@section('content')
    <div style="height:30px; "></div>
        <div class="main">
        <div class="main1" ng-controller="parPerSpaceCtrl">
            <!-- 头像-->
            <div class="main1-1">
                <div style="width:120px;height:134px;margin-left:12px;"><img ng-src="{{asset('{[parInfo.pic]}')}}" style="margin-top:25px;width:119px;height:130px;"></div>
            </div>
            
            
            <div class="main1-2">
                <div><span>{{Auth::user()->realname}}</span>&nbsp;&nbsp;<span>{{Auth::user()->sex?'女士':'男士'}}</span></div>
                <!-- <div class="main1-2-1"><a href="#"><img src="{{asset('image/qiyun/perSpace/29.png')}}"/>&nbsp;&nbsp;编辑头像</a></div> -->
            </div>
            <div class="main1-3">
                <div class="main1-31">
                    <!-- 选项卡-->
                    <div class="main1-32">
                         <li id="teach_hide" name="click_btn_1">个人设置</li>
                        <li name="click_btn_2" ng-click="getMyCollect()">我的收藏</li>
                    </div>
              <!-- 基本信息 -->
               <div class="main1-3-1" name="person">    
                    <div class="main1-33" style="clear: both">
                            <li>基本信息</li>
                    </div>
                    <!-- 正文开始 -->
                    <form action="{{url('/perSpace/editUserInfo')}}" method="post" name="parForm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                       <div class="main1-3-11">
                        <!-- part1 -->
                        <div class="main1-3-12">
                            <!-- left部分 -->
                            <div class="main1-3-14">
                                <!-- 账户名 -->
                                <div class="main1-3-15">
                                    <span class="main1-3-15-1">*账户名</span>
                                    <span class="main1-3-15-2" ng-bind="parInfo.username"></span>
                                </div>
                                <!-- 真实姓名 -->
                                <div class="main1-3-16">
                                    <span class="main1-3-16-1">*真实姓名</span>
                                    <input class="main1-3-16-2" name="realname" ng-model="parInfo.realname">
                                    <!-- <select name="minzu" class="main1-3-16-3">
                                        <option value="">汉族</option>
                                    </select> -->
                                   
                                </div>
                                <!-- 孩子账号 -->
                                <div class="main1-3-100">
                                    <div class="register_content_form_block_left">*孩子账号</div>
                                    @if($data)
                                        @foreach($data as $key => $item)
                                            @if($key == 0)
                                                <div class="register_content_form_block_right">
                                                    <input type="text" name="childNick[]" value="{{$item->childNick}}" >&nbsp;&nbsp;<button id="addChild" class="childNum" type="button">+</button><button id="removeChild" class="childNum disable" type="button">-</button>
                                                    <span></span>
                                                </div>
                                            @else
                                                <div class="register_content_form_block_right">
                                                    <input type="text" name="childNick[]" value="{{$item->childNick}}" >&nbsp;&nbsp;<button id="addChild" class="childNum disable" type="button">+</button><button id="removeChild" class="childNum " type="button">-</button>
                                                    <span></span>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="register_content_form_block_right">
                                            <input type="text" name="childNick[]" value="" >&nbsp;&nbsp;<button id="addChild" class="childNum" type="button">+</button><button id="removeChild" class="childNum disable" type="button">-</button>
                                            <span></span>
                                        </div>
                                    @endif
                                </div>
                                <!-- mima -->
                                {{--<div style="width:100%;"></div>--}}
                                 {{--<div class="main1-3-17">--}}
                                    {{--<span class="main1-3-17-1">*修改密码</span>--}}
                                    {{--<input class="main1-3-17-2" type="password" name="password" placeholder="请输入修改密码" size="35" style="height:35px;"/>--}}
                                   {{----}}
                                {{--</div>--}}
                                {{--<!-- chongfumima -->--}}
                                 {{--<div class="main1-3-18">--}}
                                    {{--<span class="main1-3-18-1">*重复密码</span>--}}
                                    {{--<input class="main1-3-18-2" type="password" name="password_confirmation" placeholder="请确认登录密码" size="35" style="height:35px;"/>--}}
                                    {{----}}
                                {{--</div>--}}
                               <div class="main1-3-17">
                                   <span class="main1-3-17-1">民族</span>
                                   <select name="nationId" id="">
                                        <option value="">请选择</option>
                                       @foreach($info->nations as $nation)
                                           <option value="{{$nation->id}}" ng-selected="parInfo.nationId == {{$nation->id}}">{{$nation->nation}}</option>
                                       @endforeach
                                   </select>
                               </div>
                                <!-- 性别 -->
                                <div class="main1-3-19">
                                    <span class="main1-3-19-1">*性别</span>
                                    <span class="main1-3-19-2">
                                        <input type="radio" name="sex" value=" 0" ng-checked="parInfo.sex == 0">男&nbsp;
                                        <input type="radio" name="sex" value="1" ng-checked="parInfo.sex == 1">女&nbsp;
                                        {{--<input type="radio" name="sex" value="2" ng-checked="parInfo.sex == 2">保密--}}
                                    </span>
                              
                                </div>
                                <!-- 手机 -->
                                <div class="main1-3-20">
                                    <span class="main1-3-20-1">*手机</span>
                                    <input class="main1-3-17-2 changeWidth" type="text" name="phone" ng-model="parInfo.phone"/>
                                    <span class="main1-3-20-3"><button type="button" class="bind">修改</button></span>
                                   <span class="main1-error-info"></span>
                                </div>

                                <div class="main1-code hide">
                                    <span class="main1-code-text">验证码</span>
                                    <input class="main1-code-input" type="text"
                                           placeholder="请输入手机验证码" size="35" style="height:35px;"/>
                                    <span class="code-code"></span>
                                </div>
                            <!-- 身份证号 -->
                                <div class="main1-3-21">
                                    <span class="main1-3-21-1">身份证件号码</span>
                                    @if($info->checks)
                                        <input class="main1-3-21-2" name="IDcard" ng-model="parInfo.IDcard">
                                    @elseif($info->checks == 0)
                                        <input class="main1-3-21-2" name="IDcard" ng-model="parInfo.IDcard" readonly>
                                    @endif
                                </div>
                                <div class="main1-3-22">
                                    <span class="main1-3-22-button"><button id="stubutn">修改</button></span>
                                </div>
    
                            
                            </div>
                            <!-- 头像部分 -->
                            <div class="main1-3-right">
                                <div id="imgs">
                                    <img width="120" height="130" style="margin-top: 15px;" ng-src="{{asset('{[parInfo.pic]}')}}">
                                </div>
                                <input id="file_upload"  name="file_upload" type="file" multiple="true" value="" />
                            </div>
                        </div>
                        
                    </div>
                   </form>
                    <!-- 正文结束 -->
               </div>

               
               <!-- 家长——我的收藏 -->
                    <!-- 蓝色条 -->
                <div name="shoucang" class="hide">
                    <div class="blue_line">
                        <div class="blue_line_1">我的收藏</div>
                        {{--<div class="blue_line_2">>>更多</div>--}}
                    </div>
                    <!-- 删除 资讯 -->
                    <div class="delete_zx">
                    <form>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="delete_del" ng-if="collect">
                        <button class="delete_span1" type="button"  ng-click="mutidelCollect()">删除</button>
                    </div>
                        <!-- 核心div -->
                        <div class="core">
                            <div class="title_1">
                                <div class="title_1_1"><input type="checkbox" name="checkbox" ng-click="checkAll(collect)" ng-model="checkall" class="title_checkbox" ></div>
                                <div class="title_1_2">
                                    <span class="title_span1">名称</span>
                                </div>
                                <div class="title_1_3">
                                    <span class="title_span2">类型</span>
                                </div>
                                
                                <div class="title_1_6">
                                    <span class="title_span5">时间</span>
                                </div>
                                <div class="title_1_7">
                                    <span class="title_span6">操作</span>
                                </div>
                            </div>

                            <!-- --收藏-- -->
                            <div class="title_2" ng-if="content" ng-repeat="i in collect">
                                <div class="title_2_1">
                                    <input type="checkbox" name="ids" ng-model="ids[i.id]"  class="title_checkbox1">
                                </div>
                                <div class="title_2_2">
                                    {{--<span class="title2_span1"><a href="{[i.url]}" ng-bind="i.title"></a></span>--}}
                                    <span class="title2_span1" ng-click="collectDetail(i.url,i.isdel)" ng-bind="i.title"> </span>
                                </div>
                                <div class="title_2_3">
                                    <span class="title2_span2" ng-bind="i.type"></span>
                                </div>
                                
                                <div class="title_2_6">
                                    <span class="title2_span5" ng-bind="i.time"></span>
                                </div>
                                <div class="title_2_7">
                                    <span class="title2_span7"><a ng-click="delCollect(i.id)">删除</a></span>
                                </div>
                            </div>

                            <div class="spinner" style="float: right; padding:150px 0px;" ng-if="loading">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>

                            <div id="errorMessage" style="padding:150px 0px;"  ng-if="reload">数据加载失败，请尝试 <a ng-click="reloadfunc('collect');">刷新</a> 一下</div>
                            <div id="errorMessage" style="padding:150px 0px;"  ng-if="errormeg">没有收藏内容，快去 <a href="">添加收藏</a> 吧</div>
                        

                        </div>
                        </form>
                    </div>
                
                    </div>
                    <!-- content结束 -->
                </div>
                 <!-- 通知 -->
                    <div class="main1-42">
                        <div class="main1-43">
                            <label><img src="{{asset('image/qiyun/perSpace/12.png')}}" style="margin:1px 0 -5px 0;"/>&nbsp;&nbsp;消息通知</label>
                        </div>
                        <div class="main1-44">
                            <!-- 通知part-1 -->
                            <div class="main1-45" ng-repeat="m in msg">
                                <div class="main1-45-1" style="margin-top:5px;">
                                    <div style="float:left;"><img ng-src="{[m.pic]}" width="50" height="45" /></div>
                                    <div class="main1-45-1-1">
                                        <span style="font-size:16px;margin-left:20px;" ><strong ng-bind="m.realname"></strong></span>
                                        <span style="font-size:12px;" ng-bind="'创建了' + m.resourceType"></span>
                                        <div class="main1-45-1-2" ng-bind="m.messageTitle"></div>
                                    </div>
                                    <div class="main1-45-1-3">
                                        <div style="padding:5px;margin-top:10px;">
                                            <div style="margin-left:10px;" ng-bind="'主持人：' + m.author"></div>
                                            <div class="main1-45-1-3-1">
                                                <span style="cursor: pointer" class="main1-45-1-3-2" ng-click="insert(m.id,m.resourceType,m.url,m.resourceCheck);">我要参与</span>
                                            </div>
                                            <div style="margin-left:10px;" ng-bind="'创建时间：' + m.addTime"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>

	<script src="{{ URL::asset('js/qiyun/perSpace/par_person.js') }}"></script>
    <script src="{{ URL::asset('js/qiyun/angular/controller/parPerSpaceController.js') }}"></script>
@endsection
		