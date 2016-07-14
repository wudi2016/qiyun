@extends('qiyun.layouts.layoutHome')

@section('title','协作组详细信息')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/techGroupInfo.css') }}">
@endsection

@section('content')
    <div class="clear"></div>
    <div class="posi">
        <a href="">
            <div class="li_home"></div>
        </a>
        <a href="">
            <div class="li_nxt"> 教研备课 > 教研协作组列表 > 我的协作组 </div>
        </a>
    </div>
    <div style="height:15px"></div>
    <!-- 主图div -->
    <div ng-controller="techGroupInfoCtrl">
        <div class="zhutu">
            <!-- 左侧div -->
            <div class="zhutu_left">
                {{--<img src="/image/qiyun/research/techGroupInfo/2.png" class="zhutu_left_img" alt="">--}}
                <img src={[techGpInfo.pic]} width="344" height="207" class="zhutu_left_img" alt="">
            </div>
            <!--  右侧div-->
            <div class="zhutu_right">
                <span class="zhutu_right_span1" ng-bind="techGpInfo.techResearchName"></span>
                <div class="zhutu_right_div1">
                    <div class="right_div1">
                        <img src="/image/qiyun/research/techGroupInfo/10.png" alt="">
                        <span ng-bind=" '创建人: ' + techGpInfo.author"></span>
                    </div>
                    <div class="right_div2">
                        <img src="/image/qiyun/research/techGroupInfo/11.png" alt="">
                        <span ng-bind=" '成员数:' + techGpInfo.member"></span>
                    </div>
                    <div class="right_div3">
                        <img src="/image/qiyun/research/techGroupInfo/12.png" alt="">
                        <span ng-bind=" '创建日期: ' + techGpInfo.created_at "></span>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:50px"></div>
        <!-- 主内容main -->
        <div class="main">
            <!-- 左main -->

            <div class="main_left">

                <div class="zunei">
                    <span class="main_left_title_spanzunei">组内活动</span>
                </div>

                <div style="height:20px"></div>
                <div class="main_left_title">
                    <span class="main_left_title_span1" id="tab_span1">备课活动</span>
                    {{--<span class="main_left_title_span11" id="tab_span2">评课活动</span>--}}
                    <a href=""><span class="main_left_title_span2"></span></a>
                </div>


                <div class="tab_control" id="tab_control1">
                    <!-- 组织总内容1 -->
                    <div class="main_left_content1">
                        <div class="main_left_content1_left1" ng-repeat="s in subjectActivity">
                            <div style="height:27px"></div>
                            <div class="main_left_content1_left1_img1">
                                <a href="/research/lessonDetail/{[s.id]}"><img ng-src="{[s.pic]}" width="160px" height="120px" alt=""/></a>
                            </div>
                            <div class="main_left_content1_left1_div1">
                                <a href="/research/lessonDetail/{[s.id]}" style="color: black"><div class="content1_left1_div1" ng-bind="s.lessonSubjectName" title="{[s.lessonSubjectName]}"></div></a>
                                    <div class="content1_left1_div2" ng-bind="s.lessonSubjectTarget"></div>
                            </div>
                            <div style="height:27px"></div>
                        </div>
                        <h2 ng-bind="errorMsg" style="display: block;padding: 100px 0px;"></h2>
                    </div>
                </div>
                <div style="height:27px"></div>
            </div>


            <!-- 右main -->
            <div class="main_right">
                <div class="main_right_title">
                    <span class="main_right_title_span1">成员</span>
                    <div class="img_yaoqing" style="cursor: pointer;" ng-click="inviteMember();"><img class="img_yaoqingtu" src="/image/qiyun/research/yaoqing.png"></div>
                    <!-- <a href=""><div class="makeGroup_contentBlock_title_button">+ 邀请教研组成员</div></a> -->
                    <a href=""><span class="main_right_title_span2"></span></a>
                </div>
                <div style="height:17px"></div>

                <!-- 右侧成员内容 -->
                <div class="main_right_content">
                    <div class="main_right_content_top">
                        <div class="main_right_content_top_info" ng-class="{disable: memberListblock}"
                             ng-repeat="m in memberList">
                            <img ng-src={[m.headPic]} width="70px" height="65px" alt="">
                            <span class="main_right_content_span1" ng-bind="m.name"></span>
                        </div>
                        <div class="spinner" style=" padding:70px 0px;" ng-class="{disable: memberList}">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                        <div id="errorMessage" ng-class="{disable: memberListmsg}">数据加载失败，请尝试 <a
                                    ng-click="reload('memberList');">刷新</a> 一下
                        </div>
                        <div style="text-align: left" ng-class="{disable: memberListMsg}">没有成员信息</div>
                    </div>

                </div>
                <div class="clear"></div>
                <div style="height:37px"></div>
                <!-- 协作组简介 -->
                <div class="main_right_xiezuo">
                    <span class="main_right_xiezuo1">协作组简介</span>
                </div>
                <div class="main_right_xiezuo_xiahuaxian"></div>
                <!-- 协作组简介内容 -->
                <div class="main_right_wulijie" ng-bind="techGpInfo.description">
        
                </div>
                <div class="clear"></div>
                <div style="height:30px"></div>
                <!-- 友邻协作组 -->
                <div class="main_right_youlin">友邻协作组
                    <!-- <span class="main_right_xiezuo1">友邻协作组</span> -->
                </div>
                <div class="main_right_xiezuo_xiahuaxian"></div>
                <!-- 暂无友邻组 -->
                <div class="main_right_wulijie">暂无友邻组
                    <!-- <span class="main_right_wulijie3">暂无友邻组</span> -->
                </div>
                <div style="height:10px"></div>
            </div>
        </div>
        <!-- 弹出层 -->
        <div class="shadow"></div>
        <div class="inviteMan hide" name="inviteMan">
            <div style="height:20px;"></div>
            <div class="content_inviteMan">
                <div class="selector_inviteMan">
                    <span>分类查询：</span>
                        <span>
                            <select ng-model="evaluatAuthor.countyScope" name="countyScope"
                                    ng-options="x.id as x.county_name for x in conditionCounty"
                                    ng-change="author(1,evaluatAuthor.countyScope)">
                                <option value="">请选择区域</option>
                            </select>
                            <select ng-model="evaluatAuthor.countySchool" name="countySchool"
                                    ng-options="x.id as x.schoolName for x in conditionSchool"
                                    ng-change="author(2,evaluatAuthor.countySchool)">
                                <option value="">请选择学校</option>
                            </select>
                            <select ng-model="evaluatAuthor.countySubject" name="countySubject"
                                    ng-options="x.id as x.subjectName for x in conditionSubject">
                                <option value="">请选择学科</option>
                            </select>
                        </span>
                    <span ng-click="likeQuery(evaluatAuthor.countyScope,evaluatAuthor.countySchool,evaluatAuthor.countySubject);">查询</span>
                </div>
                <div style="height:20px;"></div>
                <div class="accurateSelect_inviteMan">
                    <span>精确查询：</span>
                    <input name="accurateInput" type="text" ng-model="teacherName.username" placeholder="请输入教师账户"/>
                    <span ng-click="exactQuery(teacherName.username);">查询</span>
                </div>
                <hr style="width:88%; margin-top:20px;"/>
                <div class="name_option_inviteMan">
                    <div class="name_option_first_inviteMan">
                        <span ng-bind="teacherMsg"></span>
                        <div ng-repeat="t in teacherList" class="div_span_radio1_inviteMan"><input type="checkbox" value="{[t.id]}" ng-click="chooseUser(t.id);" id="inviteUser{[t.id]}" name="inviteUser"/>&nbsp;&nbsp;&nbsp;<span ng-bind="t.username"></span>&nbsp;&nbsp;&nbsp;<span ng-bind="t.realname" title={[t.realname]}></span></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="inviteMan_choice">
                    <span class="button_btn_span_inviteMan_1" ng-click="chooseMember();">确定选择</span>
                    <span class="button_btn_span_inviteMan" name="inviteManReturn">取消选择</span>
                </div>
            </div>
        </div>
    </div>
    <!-- 主体部分结束 -->
@endsection

@section('js')
    <script src="{{ URL::asset('js/qiyun/angular/controller/techGroupInfoController.js') }}"></script>
    <script type="text/javascript">
        //取消  选择自备人 按钮
        $('#tab_span1').click(function () {
            $('#tab_control1').show();
            $('#tab_control2').hide();
            $('#tab_span1').css("color", '#52CAEC');
            $("#tab_span2").removeAttr("style");
        });

        $('#tab_span2').click(function () {
            $('#tab_control2').show();
            $('#tab_control1').hide();
            $('#tab_span2').css("color", '#52CAEC');
            $("#tab_span1").removeAttr("style");
        });
    </script>

@endsection