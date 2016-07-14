{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/1/25--}}
{{--Time: 14:04--}}
@extends('qiyun.layouts.layoutHome')

@section('title','添加教研评课')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/addEvaluation.css') }}">
@endsection

@section('content')
    <!--添加评课页开始 -->
    <div class="clear"></div>
    <div class="main_list" ng-controller="addEvaluationCtrl">
        <div class="main_head">
            <div class="clear"></div>
            <div class="posi">
                <a href="">
                    <div class="li_home"></div>
                </a>
                <a href="">
                    <div class="li_nxt"> 教研备课 > 添加教研评课</div>
                </a>
            </div>
            <div class="main_banner">
                <a href="#"><img src="/image/qiyun/research/addEvaluation/banner.png"/></a>
            </div>
            <div class="main_bott">
                <div class="main_bott_left">发起评课</div>
            </div>
        </div>
        <!-- 线下部分 -->
        <div style="height:25px;"></div>
        <form action="" method="">
        <div class="main_form">
            <div class="main_form_first">
                <div class="first_name">课题名称</div>
                <div class="first_input"><input type="text" ng-model="postdata.evaluatName" name="evaluatName" ng-blur="isOnly();"/></div>
                <div class="first_text" ng-bind="errorMsg.onlyMsg"></div>
            </div>
            <div class="clear"></div>
            <div class="main_form_image">
                <div class="first_name">评课封面</div>
                <div class="first_input">
                    <div id="file_upload"></div>
                    <div class="uploadarea_bar_r_msg"></div>
                    {{--<input type="text" ng-model="postdata.evaluatPic" name="evaluatPic" />--}}
                </div>
            </div>
            <div class="clear"></div>
            <div class="main_form_second">
                <div class="first_name">所属分类</div>
                <div class="second_type">
                    <select ng-model="postdata.evaluatType" name="evaluatType" class="restype" ng-options="x.id as x.evaluatTypeName for x in evaluattype" ng-change="select(5,postdata.evaluatType)">
                        <option value="">请选择类型</option>
                    </select>
                </div>
            </div>
            <div class="clear"></div>
            <div class="main_form_third">
                <div class="first_name">授课时间</div>
                <div class="third_text">
                    <div class="third_input">
                        <input type="text" name="lessonTime" onclick="WdatePicker()"/>
                        <div class="third_img"></div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>
            <div class="main_form_four">
                <div class="four_name">评课开放时间</div>
                <div class="four_time">
                    <div class="four_input">
                        <input type="text" name="begin" onclick="WdatePicker()"/>
                        <div class="four_img"></div>
                    </div>
                </div>
                <div class="four_zhi">至</div>
                <div class="four_time">
                    <div class="four_input1">
                        <input type="text" name="end" onclick="WdatePicker()"/>
                        <div class="four_img1"></div>
                    </div>
                </div>
            </div>
            {{--<img src="/image/qiyun/research/addEvaluation/1.png"/>--}}
            <div class="clear"></div>
            <div class="main_form_five">
                <div class="five_name">授课人</div>
                <div class="five_text">
                    <div class="five_img">
                        <input type="radio" id="choose" value="" ng-model="postdata.evaluatAuthor" name="evaluatAuthor" /><span>选择一个主备人</span></div>
                    <div class="five_checkbox">
                        <div class="five_checkbox1">
                            <input type="radio" value="a" checked id="myis" ng-model="postdata.evaluatAuthor" name="evaluatAuthor" /><span>我自己是主备人</span>
                        </div>
                    </div>
                </div>
            </div>
            {{--选择评课自备人--}}
            <div class="shadow"></div>
            <div class="selectMainMan hide" name="selectMainMan">
                <div style="height:20px;"></div>
                <div class="content">
                    <div class="selector">
                        <span>分类查询：</span>
                        <span>
                            <select class="selector_first" ng-model="evaluatAuthor.countyScope" name="countyScope" ng-options="x.id as x.county_name for x in conditionCounty" ng-change="author(1,evaluatAuthor.countyScope)">
                                <option value="">请选择区域</option>
                            </select>
                            <select ng-model="evaluatAuthor.countySchool" name="countySchool" ng-options="x.id as x.schoolName for x in conditionSchool" ng-change="author(2,evaluatAuthor.countySchool)">
                                <option value="">请选择学校</option>
                            </select>
                            <select ng-model="evaluatAuthor.countySubject" name="countySubject" ng-options="x.id as x.subjectName for x in conditionSubject">
                                <option value="">请选择学科</option>
                            </select>
                        </span>
                        <span class="selector_last" ng-click="likeQuery(evaluatAuthor.countyScope,evaluatAuthor.countySchool,evaluatAuthor.countySubject);">查询</span>
                    </div>
                    <div style="height:20px;"></div>
                        <div class="accurateSelect">
                            <span>精确查询：</span>
                            <input name="accurateInput" type="text" ng-model="teacherName.username" placeholder="请输入教师账户" />
                            <span class="accurate_third" ng-click="exactQuery(teacherName.username);">查询</span>
                            <span class="button_btn_span" name="resetReturn">取消选择</span>
                        </div>
                    <hr style="width:88%; margin-top:20px;"/>
                    <div class="name_option">
                        <div class="name_option_first">
                            <span ng-bind="teacherMsg"></span>
                            <div ng-repeat="t in teacherList" class="div_span_radio1"><input type="radio" value="{[t.id]}" name="user" ng-click="chooseTeacher(t.id,t.realname);" />&nbsp;&nbsp;&nbsp;<span ng-bind="t.username"></span>&nbsp;&nbsp;&nbsp;<span ng-bind="t.realname" title="{[t.realname]}"></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>
            <div class="main_form_six">
                <div class="first_name">所属分类</div>
                <div class="six_type">
                    <!-- 学段 -->
                    <select ng-model="postdata.evaluatSection" name="evaluatSection" class="ressection" ng-options="x.id as x.sectionName for x in studysection" ng-change="select(1,postdata.evaluatSection)">
                        <option value="">请选择学段</option>
                    </select>
                </div>
                <div class="six_type1">
                    <!-- 学科 -->
                    <select ng-model="postdata.evaluatSubject" name="evaluatSubject" class="ressubject" ng-options="x.id as x.subjectName for x in studysubject" ng-change="select(2,postdata.evaluatSubject)">
                        <option value="">请选择学科</option>
                    </select>
                </div>
                <div class="six_type1">
                    <!-- 版本 -->
                    <select ng-model="postdata.evaluatEdition" name="evaluatEdition" class="resedition" ng-options="x.id as x.editionName for x in studyedition" ng-change="select(3,postdata.evaluatEdition)">
                        <option value="">请选择版本</option>
                    </select>
                </div>
                <div class="six_type1">
                    <!-- 册别 -->
                    <select ng-model="postdata.evaluatGrade" name="evaluatGrade" class="resgrade"   ng-options="x.id as x.gradeName for x in studygrade" ng-change="select(4,postdata.evaluatGrade)">
                        <option value="">年级&nbsp;册别</option>
                    </select>
                </div>
                <div class="six_type2">
                    <select ng-model="postdata.evaluatChapter" name="evaluatChapter" class="chapter"   ng-options="x.id as x.chapterName for x in studychapter" ng-change="select(5,postdata.evaluatChapter)">
                        <option value="">请选择教材</option>
                    </select>
                </div>
            </div>

            <div class="clear"></div>
            <div class="main_form_seven">
                <div class="four_name">选择评课模板</div>
                <div class="seven_temp"><input type="radio" id="default" value="1" name="evaluatTmpId" ng-model="postdata.evaluatTmpId" /><span>默认模板</span></div>
                <div class="seven_temp1"><input type="radio" id="mytpl" value="" ng-model="postdata.evaluatTmpId" name="evaluatTmpId" /><span class="chooseTpl">+选择模板</span></div>
            </div>

            <div class="clear"></div>
            <div class="main_form_seven  area_width">
                <div class="four_name">主要评课方向</div>
                <div class="eight_area">
                    <textarea cols="75" name="evaluatDirection" style="resize: none" ng-model="postdata.evaluatDirection" rows="10" placeholder="选填，请输入建议或意见"></textarea>
                </div>

            </div>

            <div class="clear"></div>
            <div class="main_form_nine">
                <div class="invite">
                    <input type="radio" id="invite" ng-model="postdata.isOpen" value="1" name="isOpen" />
                    <img style="display: none" class="invite_second" src="/image/qiyun/research/addEvaluation/11.png"/>
                    <img class="invite_third" src="/image/qiyun/research/addEvaluation/10.png"/>
                    <img class="invite_last" src="/image/qiyun/research/addEvaluation/6.png"/>
                </div>
                <div class="allopen">
                    <input type="radio" id="allOpen" ng-model="postdata.isOpen" value="0" name="isOpen" />
                    <img style="display: none" class="allopen_second" src="/image/qiyun/research/addEvaluation/11.png"/>
                    <img class="allopen_third" src="/image/qiyun/research/addEvaluation/10.png"/>
                    <img class="allopen_last" src="/image/qiyun/research/addEvaluation/7.png"/>
                </div>
                {{--<img src="/image/qiyun/research/addEvaluation/11.png"/>--}}
                {{--<img src="/image/qiyun/research/addEvaluation/11.png"/>--}}
            </div>

            <div class="clear"></div>
            <div class="main_form_ten">
                <button id="btnSub" ng-click="insert(postdata.evaluatName,postdata.evaluatType,postdata.evaluatAuthor,postdata.evaluatGrade,postdata.evaluatTmpId,postdata.evaluatDirection,postdata.isOpen);">创建</button>
                <button id="btnRes" type="reset">取消</button>
            </div>
        </div>
        </form>


    {{-- ============ 选择模板的DIV =============== --}}
    <div class="main_list_link">
        <div class="main_link">
            <div class="close"><span>x</span></div>
            <div class="main_link_template">
                <div class="invite">
                    <input type="radio" id="invite_tpl" ng-model="postdata.isOpen" value="1" ng-click="chooseTpl();" name="isOpen" />
                    <img class="invite_second" style="display: none" src="/image/qiyun/research/addEvaluation/11.png"/>
                    <img class="invite_third" src="/image/qiyun/research/addEvaluation/10.png"/>
                    <img class="invite_last" src="/image/qiyun/research/chooseTpl/9.png"/>
                </div>
                <div class="allopen">
                    <input type="radio" id="allOpen_tpl" ng-model="postdata.isOpen" value="0" name="isOpen"/>
                    <img class="allopen_second" style="display: none" src="/image/qiyun/research/addEvaluation/11.png"/>
                    <img class="allopen_third" src="/image/qiyun/research/addEvaluation/10.png"/>
                    <img class="allopen_last" src="/image/qiyun/research/chooseTpl/3.png"/>
                </div>
            </div>
            <div class="main_line">
                <div class="main_line_avg">
                    <div class="main_line_avg1">客观评课项平均分</div>
                    <div class="main_line_avg2">100</div>
                </div>
                <div class="main_line_div">
                </div>
            </div>
        </div>
    </div>
    {{-- ============ 选择模板的DIV =============== --}}

    {{-- ============ 自定义模板的DIV =============== --}}
    <div class="main_list_name">
        <span class="main_list_name_close">x</span>
        <div class="main_head_name">
            <div class="main_bott_name">
                <div class="main_bott_left_name">自定义模板添加</div>
            </div>
        </div>
        <!-- 线下部分 -->
        <div class="main_link_name">
            <div class="main_lesson_name">
                <div class="main_shancha_name">注:选择已有模板 / 添加新模板名称</div>
                <div class="main_shouke_name">
                    <form>
                        <div class="main_image_name">
                            模板名称<input type="text" name="evaluatTmpName" ng-model="insertTpl.evaluatTmpName" placeholder="限定在20字以内" maxlength="20" required /><button ng-click="insertTplName();">+添加</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="main_line_name">
                <span ng-bind="tplNameFalseMsg"></span>
                <div class="tplNameFalse" ng-repeat="a in arr">
                    <span ng-click="delTplName(a.id);">x</span>
                    <button ng-bind="a.evaluatTmpName" ng-click="getContent(a.id);"></button>
                </div>
            </div>
        </div>
    </div>
    {{-- ============ 自定义模板的DIV =============== --}}

    {{-- ============ 自定义模板内容的DIV =========== --}}
    <div class="main_list_content">
        <div class="main_head_content">
            <div class="main_bott_content">
                <div class="main_bott_left_content">评课模板设置</div>
            </div>
        </div>
        <!-- 线下部分 -->
        <div class="main_link_content">
            <div class="main_lesson_content">
                <div class="main_shancha_content">注:评分项可根据需要添加，每一个评分项可单独设置分值，设置后不显示分值数字，以五星显示，评课总分为100分。</div>
                <div class="main_shouke_content">
                    <span ng-bind="'模板名称：' + name.evaluatTmpName"></span>
                    <form>
                        <div class="main_image_content">
                            设置评分项内容<input type="text" name="evaluatTmpContentName" ng-model="tplName.evaluatTmpContentName" placeholder="限定在20字以内" maxlength="20" required /><button ng-click="addTplName(name.id);">+添加</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="main_line_content">
                <div class="main_line_avg_content">
                    <div class="main_line_avg1_content">客观评课项平均分</div>
                    <div class="main_line_avg2_content">100</div>
                </div>
                <div class="main_line_div_content">
                    <div class="main_line_div1_content">
                        <div class="main_line_div1_right_content">
                            <span class="promptMsg" ng-bind="msg"></span>
                            <div class="contentTpl" ng-repeat="c in content">
                                <span ng-bind="$index + 1 + '.'" class="contentTpl_first"></span><span ng-bind="c.evaluatTmpContentName" class="contentTpl_second"></span><span class="contentTpl_third"><img src='/image/qiyun/research/mark/4.png'/><img src='/image/qiyun/research/mark/4.png'/><img src='/image/qiyun/research/mark/4.png'/><img src='/image/qiyun/research/mark/4.png'/><img src='/image/qiyun/research/mark/4.png'/></span><span class="contentTpl_fouth" ng-click="edit(c.id,c.evaluatTmpContentName);">√修改</span><span class="contentTpl_last" ng-click="del(c.id,name.id);">×删除</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_form_ten_content">
                <button id="btnSub_content" ng-click="useThis(name.id,name.evaluatTmpName);">使用此模板</button>
                <button id="btnRes_content" ng-click="resetThis();">取消</button>
            </div>
        </div>
    </div>
    <div class="edit_content">
        <div><span class="edit_content_first">修改评分项内容</span><input type="text" name="editname" class="edit_content_last" ng-model="tplContent.evaluatTmpContentName" maxlength="20" /></div>
        <div class="edit_content_last_div"><span class="main_submit_content" ng-click="update();">修改</span><span class="main_reset_content">取消</span></div>
    </div>
    {{-- ============ 自定义模板内容的DIV =========== --}}

    {{-- =============邀请评课弹窗================ --}}
        <div class="inviteMan hide" name="inviteMan">
            <div style="height:20px;"></div>
            <div class="content_inviteMan">
                <div class="selector_inviteMan">
                    <span>分类查询：</span>
                        <span>
                            <select class="selector_inviteMan_first" ng-model="evaluatAuthor.countyScope" name="countyScope" ng-options="x.id as x.county_name for x in conditionCounty" ng-change="author(1,evaluatAuthor.countyScope)">
                                <option value="">请选择区域</option>
                            </select>
                            <select ng-model="evaluatAuthor.countySchool" name="countySchool" ng-options="x.id as x.schoolName for x in conditionSchool" ng-change="author(2,evaluatAuthor.countySchool)">
                                <option value="">请选择学校</option>
                            </select>
                            <select ng-model="evaluatAuthor.countySubject" name="countySubject" ng-options="x.id as x.subjectName for x in conditionSubject">
                                <option value="">请选择学科</option>
                            </select>
                        </span>
                    <span class="selector_inviteMan_last" ng-click="likeQuery(evaluatAuthor.countyScope,evaluatAuthor.countySchool,evaluatAuthor.countySubject);">查询</span>
                </div>
                <div style="height:20px;"></div>
                <div class="accurateSelect_inviteMan">
                    <span>精确查询：</span>
                    <input name="accurateInput" type="text" ng-model="teacherName.username" placeholder="请输入教师账户" />
                    <span class="accurateSelect_inviteMan_last" ng-click="exactQuery(teacherName.username);">查询</span>
                </div>
                <hr style="width:88%; margin-top:20px;"/>
                <div class="name_option_inviteMan">
                    <div class="name_option_first_inviteMan">
                        <span ng-bind="teacherMsg"></span>
                        <div ng-repeat="t in teacherList" class="div_span_radio1"><input type="checkbox" value="{[t.id]}" name="inviteUser" />&nbsp;&nbsp;&nbsp;<span ng-bind="t.username"></span>&nbsp;&nbsp;&nbsp;<span ng-bind="t.realname"></span></div>
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
@endsection

@section('js')
    <script language="javascript" type="text/javascript" src="{{ URL::asset('js/DatePicker/WdatePicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/addEvaluationController.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/addEvaluation.js') }}"></script>
@endsection