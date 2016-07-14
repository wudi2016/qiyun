<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested. controller
|
*/

Route::get('/', 'qiyun\indexController@index');
// Route::get('/', 'qiyun\indexController@index');
Route::get('/error', 'qiyun\indexController@indexs');
//认证路由
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');


//  首页数据路由组
Route::group(["prefix" => "/index", "namespace" => "qiyun"], function () {
    //搜索
    Route::get('/search', 'indexController@search');
    Route::post('/searchNews', 'indexController@searchNews');
    Route::post('/searchResorces', 'indexController@searchResorces');
    Route::post('/searchMicLessons', 'indexController@searchMicLessons');

    //获取用户所属学校相关信息
    Route::get('/getSchoolInfo', 'indexController@getSchoolInfo');

    //  获取用户资源 微课 教研 数量 接口
    Route::get('/getNUm', 'indexController@getNUm');
    //  教育咨询和政策发布数据接口
    Route::get('/getNews/{type}', 'indexController@getNews');
    //  微课视频数据接口
    Route::get('/getMicroVideo', 'indexController@getMicroVideo');
    //  个人空间数据接口
    Route::get('/getPersonalSpace', 'indexController@getPersonalSpace');
    //  教研信息数据接口
    Route::get('/getResearch', 'indexController@getResearch');
    //  资源信息数据接口
    Route::get('/getResource', 'indexController@getResource');
    //  优质资源信息数据接口
    Route::get('/getFavResource', 'indexController@getFavResource');

    // 获取教师协作组接口
    Route::get('/getTechResearch', 'indexController@getTechResearch');
    // 获取协同备课接口
    Route::get('/getLessonSubject', 'indexController@getLessonSubject');
    // 获取评课议课接口
    Route::get('/getEvaluta', 'indexController@getEvaluta');
    // 获取主题讨论接口
    Route::get('/getDepartmentTheme', 'indexController@getDepartmentTheme');

});


//  会员路由组
Route::group(['prefix' => '/member', 'namespace' => 'qiyun\member'], function () {
    //  会员注册
    Route::get('/register', 'memberController@register');
    //找回密码
    Route::get('/retrievePassword', 'memberController@retrievePassword');
    //判断手机号是否存在 接口
    Route::get('/getPhones/{phone}', 'memberController@getPhones');
    //修改密码 接口
    Route::post('/changePassword', 'memberController@changePassword');

    // 学生
    Route::get('/registerstu', function () {
        return view('qiyun/member/registerstu');
    });
    // 家长
    Route::get('/registerpar', function () {
        return view('qiyun/member/registerpar');
    });

    //  处理会员注册
    Route::post('/addMember', 'memberController@addMember');

    //头像上传接口
    Route::post('addImg', 'memberController@addImg');

    //服务条款
    Route::get('/terms', function () {
        return view('qiyun/member/terms');
    });
});


//  教研路由组
Route::group(['prefix' => '/research', 'namespace' => 'qiyun\research'], function () {
    //  教研首页
    Route::get('/', 'researchController@index');
    //  备课数据接口
    Route::get('/getSubject', 'researchController@getSubject');
    //  评课议课数据接口
    Route::get('/getEvaluation', 'researchController@getEvaluation');
    //  主题研讨数据接口
    Route::get('/getTheme', 'researchController@getTheme');

    //  唯一性验证
    Route::post('/isOnlyThis', 'researchController@isOnlyThis');

    //  判断是否是教师，公共接口（这是第三次消失了）
    Route::get('/isTeacher', 'researchController@isTeacher');
    //  判断是否是成员
    Route::post('/isMember', 'researchController@isMember');
    //  创建教研组页面
    Route::get('/makeGroup', 'researchController@makeGroup');
    //  添加教研组
    Route::post('/addGroup', 'researchController@addGroup');
    //  教研组列表页
    Route::get('/groupList', 'researchController@groupList');
    //  教研组列表数据接口
    Route::post('/getGroupList', 'researchController@getGroupList');
    //  教研组详情页
    Route::get('/techGroupInfo/{id}', 'researchController@techGroupInfo');
    //  教研组详细信息数据接口
    Route::get('/getTechGroupInfo/{id}', 'researchController@getTechGroupInfo');
    //  是否是教研组的创建人
    Route::post('/isGroupAuthor', 'researchController@isGroupAuthor');
    //  教研组数据接口
    Route::get('/getGroup', 'researchController@getGroup');
    //  添加教研组成员接口
    Route::post('/insertTeachGruop', 'researchController@insertTeachGruop');
    //  判断是否已经是成员 或 已经发送邀请
    Route::post('/isRealMember/{id}', 'researchController@isRealMember');
    //  判断是否是管理员（the second time）
    Route::post('/isManager/{id}', 'researchController@isManager');
    //  申请加入教研组接口
    Route::post('/applyGroup', 'researchController@applyGroup');
    //  教研组详细信息数据接口
    Route::get('/intraActivity/{id}', 'researchController@intraActivity');



    //  创建备课主题页
    Route::get('/makeLesson', 'researchController@makeLesson');
    //  协同备课列表页
    Route::get('/lessonList', 'researchController@lessonList');
    //  协同备课详情页
    Route::get('/lessonDetail/{id}', 'researchController@lessonDetail');
    //  获取协同备列表页数据接口
    Route::post('/getLessonList', 'researchController@getLessonList');
    //  申请加入协同备课接口
    Route::post('/applyLesson', 'researchController@applyLesson');
    //共案发布
    Route::get('/publishCommonCase/{id}', 'researchController@publishCommonCase');
    Route::post('/doPublishCommonCase', 'researchController@doPublishCommonCase');
    Route::get('/doDownloadCommonCase/{id}', 'researchController@doDownloadCommonCase');
    //  发布协同备课
    Route::post('/insertLessonSubject', 'researchController@insertLessonSubject');
    //  协同备课添加文章
    Route::post('/insertArticle', 'researchController@insertArticle');
    //  协同备课发布图片页面
    Route::get('/publishPic/{id}', 'researchController@publishPic');
    //  协同备课添加图片
    Route::post('/insertPic/{id}', 'researchController@insertPic');
    //  协同备课发布音频页面
    Route::get('/publishAudio/{id}', 'researchController@publishAudio');
    //  协同备课添加图片
    Route::post('/insertAudio', 'researchController@insertAudio');
    //  协同备课发布音频页面
    Route::get('/publishResource/{id}', 'researchController@publishResource');
    //  协同备课添加图片
    Route::post('/insertResource', 'researchController@insertResource');
    //  协同备课发表话题
    Route::post('/insertTopic', 'researchController@insertTopic');
    //  相关备课
    Route::get('/getRelevantSubject', 'researchController@getRelevantSubject');
    //  备课资源列表页
    Route::get('/lessonResourseList/{id}', 'researchController@lessonResourseList');
    Route::post('/getLessonResourseList', 'researchController@getLessonResourseList');
    //  备课资源列表页
    Route::get('/lessonVideoList/{id}', 'researchController@lessonVideoList');
    Route::post('/getLessonVideoList', 'researchController@getLessonVideoList');
    //  备课话题列表页
    Route::get('/lessonTopicList/{id}', 'researchController@lessonTopicList');
    Route::post('/getLessonTopicList', 'researchController@getLessonTopicList');


    //  教研评课列表数据接口
    Route::post('/getEvaluationList', 'researchController@getEvaluationList');
    //  教研评课详情页数据接口
    Route::post('/getEvaluationInfo/{id}', 'researchController@getEvaluationInfo');
    //  教研评课列表页
    Route::get('/evaluationList', 'researchController@evaluationList');
    //  教研评课详情页
    Route::get('/evaluationInfo/{id}', 'researchController@evaluationInfo');
    //  添加教研评课页
    Route::get('/addEvaluation', 'researchController@addEvaluation');
    //  获取所属分类下拉框的值（发起评课）数据接口
    Route::get("/getEvaluatType", "researchController@getEvaluatType");
    //  获取学段接口
    Route::get("/getStudySection", "researchController@getStudySection");
    //  获取学科接口
    Route::get("/getStudySubject/{id}", "researchController@getStudySubject");
    //  获取版本接口
    Route::get("/getStudyEdition/{id}", "researchController@getStudyEdition");
    //  获取册别接口
    Route::get("/getStudyGrade/{id}", "researchController@getStudyGrade");
    //  获取教材目录接口
    Route::get("/getStudyChapter/{id}", "researchController@getStudyChapter");
    //  添加教研评课信息接口
    Route::post('/insertEvaluation', 'researchController@insertEvaluation');
    //  我要评分页面
    Route::get('/mark/{id}', 'researchController@mark');
    //  判断评分次数
    Route::post('/iMark', 'researchController@iMark');
    //  获取评分页相关信息
    Route::get('/getMarkInfo/{id}', 'researchController@getMarkInfo');
    //  评分添加接口
    Route::post('/addMark','researchController@addMark');
    //  各项平均分内容接口
    Route::get('/avgContent/{id}','researchController@avgContent');
    //  评分模板内容接口
    Route::get('/tmpContent/{id}','researchController@tmpContent');
    //  评课详情页评论
    Route::post('/addEvaluatComment', 'researchController@addEvaluatComment');
    //  是否是创建人或授课人
    Route::get('/isAuthor/{id}', 'researchController@isAuthor');
    //  上传课件页面
    Route::get('/uploadCourse/{id}', 'researchController@uploadCourse');
    //  课件浏览页
    Route::get('/evaluatCourse/{id}', 'researchController@evaluatCourse');
    //  课件列表页
    Route::get('/evaluatCourseList/{id}', 'researchController@evaluatCourseList');
    Route::post('/getEvaluatCourseList', 'researchController@getEvaluatCourseList');
    //  相关教研
    Route::get('/getRelevantEvaluat', 'researchController@getRelevantEvaluat');
    //  添加上传课件
    Route::post('/insertCourse', 'researchController@insertCourse');
    //  添加自定义模板内容
    Route::post('/insertTplName', 'researchController@insertTplName');
    //  获取自定义模板名称接口
    Route::get('/getTplName', 'researchController@getTplName');
    //  删除自定义模板
    Route::get('/delTplName/{id}', 'researchController@delTplName');
    //  选择协作组
    Route::post('/selectGroup', 'researchController@selectGroup');
    //  选择评课自备人页面( 精确查询 )
    Route::post('/selectMainMan','researchController@selectMainMan');
    //  选择自备人（按区查找）
    Route::get('/conditionCounty','researchController@conditionCounty');
    //  选择自备人（按学校查找）
    Route::get('/conditionSchool/{id}','researchController@conditionSchool');
    //  选择自备人（按学科查找）
    Route::get('/conditionSubject/{id}','researchController@conditionSubject');
    //  选择自备人（按查询条件查找）
    Route::post('/conditionSelect','researchController@conditionSelect');
    //  获取自定义模板内容项的条数
    Route::get('/getCountTpl/{id}','researchController@getCountTpl');
    //  添加自定义模板内容
    Route::post('/insertMyTpl/{id}', 'researchController@insertMyTpl');
    //  获取自定义模板评分项接口
    Route::get('/getTplContent/{id}', 'researchController@getTplContent');
    //  删除自定义模板评分项接口
    Route::post('/delTplContent/{id}', 'researchController@delTplContent');
    //  修改自定义模板评分项接口
    Route::post('/editTplContent/{id}', 'researchController@editTplContent');



    //  主题研讨列表页
    Route::get('/subjectList', 'researchController@subjectList');
    //  主题研讨列表信息接口
    Route::post('/getSubjectList', 'researchController@getSubjectList');
    //  添加主题研讨页
    Route::get('/addSubject', 'researchController@addSubject');
    //  添加主题研讨
    Route::post('/insertSubject', 'researchController@insertSubject');
    //  主题研讨详细页面
    Route::get('/subjectInfo/{id}', 'researchController@subjectInfo');
    //  主题研讨详细信息接口
    Route::get('/getSubjectInfo/{id}', 'researchController@getSubjectInfo');
    //  主题研讨图片列表页
    Route::get('/getSubjectImage/{id}', 'researchController@getSubjectImage');
    //  主题研讨文章信息页
    Route::get('/articleInfo/{id}','researchController@articleInfo');
    //  主题研讨文章信息页数据接口
    Route::get('/getArticleInfo/{id}','researchController@getArticleInfo');
    //    //  主题研讨文章信息列表数据接口
    //    Route::get('/getArticleList/{id}','researchController@getArticleList');
    //  主题研讨话题信息页
    Route::get('/topicInfo/{id}','researchController@topicInfo');
    //  主题研讨话题信息页数据接口
    Route::get('/getTopicInfo/{id}','researchController@getTopicInfo');
    //    //  主题研讨话题信息列表数据接口
    //    Route::post('/getTopicList/{id}','researchController@getTopicList');
    //  主题研讨添加图片页
    Route::get('/subjectImage/{id}', 'researchController@subjectImage');
    //  主题研讨添加文章页
    Route::get('/subjectArticle/{id}', 'researchController@subjectArticle');
    //  主题研讨添加视频页
    Route::get('/subjectAudio/{id}', 'researchController@subjectAudio');
    //  主题研讨添加资源页
    Route::get('/subjectResource/{id}', 'researchController@subjectResource');
    //  主题研讨添加图片接口
    Route::post('/insertSubjectImage/{id}', 'researchController@insertSubjectImage');
    //  主题研讨添加文章接口
    Route::post('/insertSubjectArticle', 'researchController@insertSubjectArticle');
    //  主题研讨添加视频接口
    Route::post('/insertSubjectAudio', 'researchController@insertSubjectAudio');
    //  主题研讨添加资源接口
    Route::post('/insertSubjectResource', 'researchController@insertSubjectResource');
    //  发表主题话题(主题研讨详情页面)
    Route::post('/insertSubjectTopic', 'researchController@insertSubjectTopic');
    //  主题话题展示(主题研讨详情页面)
    Route::get('/showTopic/{id}', 'researchController@showTopic');
    //  上传插件的接口
    Route::post('/doUpload','researchController@doUpload');
    //  主题视频详情
    Route::get('/subjectVideoDetail/{id}', 'researchController@subjectVideoDetail');
    //  相关主题
    Route::get("/getRelevantDepartment", "researchController@getRelevantDepartment");
    //  主题资源详情
    Route::get('/subjectResourceDetail/{id}', 'researchController@subjectResourceDetail');
    //  主题资源列表页
    Route::get('/subjectResourceList/{id}', 'researchController@subjectResourceList');
    Route::post('/getSubjectResourceList', 'researchController@getSubjectResourceList');
    //  主题视频列表页
    Route::get('/subjectVideoList/{id}', 'researchController@subjectVideoList');
    Route::post('/getSubjectVideoList', 'researchController@getSubjectVideoList');
    //  主题话题列表页
    Route::get('/subjectTopicList/{id}', 'researchController@subjectTopicList');
    Route::post('/getSubjectTopicList', 'researchController@getSubjectTopicList');
    //  主题文章列表页
    Route::get('/subjectArticleList/{id}', 'researchController@subjectArticleList');
    Route::post('/getSubjectArticleList', 'researchController@getSubjectArticleList');
});


//  备课详情数据 接口 及 路由
Route::group(["prefix" => "/lessonDetail", "namespace" => 'qiyun\research'], function () {
    //  共案列表数据接口
    Route::get("/getCommomCase/{id}", "lessonDetailController@getCommomCase");
    //  个案列表数据接口
    Route::get("/getSingleCase/{id}", "lessonDetailController@getSingleCase");
    //  内容数据接口
    Route::get("/getContent/{id}", "lessonDetailController@getContent");
    //  文章数据接口
    Route::get("/getRealArticle/{id}", "lessonDetailController@getRealArticle");
    //  资源数据接口
    Route::get("/getArticle/{id}", "lessonDetailController@getArticle");
    //  图片数据接口
    Route::get("/getImage/{id}", "lessonDetailController@getImage");
    Route::get("/imageList/{id}", "lessonDetailController@imageList");
    //  视频数据接口
    Route::get("/getVideo/{id}", "lessonDetailController@getVideo");
    //  话题数据接口
    Route::get("/getTopic/{id}", "lessonDetailController@getTopic");
    //  相关集备数据接口
    Route::get("/getRelevant/{id}", "lessonDetailController@getRelevant");
    //  集备统计数据接口
    Route::get("/getCount/{id}", "lessonDetailController@getCount");
    //  教案组成员数据接口
    Route::get("/getLessonMember/{id}", "lessonDetailController@getLessonMember");

    //  个案列表资源详情
    Route::get("/resourceDetail/{id}", "lessonDetailController@resourceDetail");
    //  个案列表图片详情
    Route::get("/imageDetail/{id}", "lessonDetailController@imageDetail");
    //  个案列表视屏详情
    Route::get("/videoDetail/{id}", "lessonDetailController@videoDetail");
    //  个案列表话题详情
    Route::get("/topicDetail/{id}", "lessonDetailController@topicDetail");
    Route::get("/getTopicDetail/{id}", "lessonDetailController@getTopicDetail");
});


//  资源路由组
Route::group(['prefix' => '/resource', 'namespace' => 'qiyun\resource'], function () {
    //  资源首页
    Route::get('/', 'resourceController@index');
    //上传资源
    Route::get('/uploadResource', 'resourceController@uploadResource');
    //上传资源成功提示页
    Route::get('/uploadResourceSuccess/{id}', function ($id) {
        return view('qiyun/resource/uploadResourceSuccess',['id'=>$id]);
    });

    //  资源列表页
    Route::get('/resourceList/{sectionId?}/{subjectId?}/{editionId?}', 'resourceController@resourceList');
    //  首次加载资源列表页数据
    Route::post('/resourceListLoad', 'resourceController@resourceListLoad');
    //  请求资源列表
    Route::post('/resourceListSelect', 'resourceController@resourceListSelect');
    //  资源详情页
    Route::get('/resourceDetail/{id?}', 'resourceController@resourceDetail');

    //  拓展资源列表页
    Route::get('/expandResourceList/{paraa?}/{parab?}/{parac?}', 'resourceController@expandResourceList');
    //  加载拓展资源列表页数据
    Route::post('/expandResourceListLoad', 'resourceController@expandResourceListLoad');

    //资源详情页 获取 点赞分享 接口
    Route::get("/getResourceFavDetail/{resourceId}", "resourceController@getResourceFavDetail");
    //资源详情页 执行 点赞 收藏 分享 接口
    Route::get("/doClick/{resourceId}", "resourceController@doClick");
    Route::get("/doFav/{resourceId}/{resourceType}", "resourceController@doFav");


    //获取小学教育资源接口
    Route::get("/getPrimaryRes", "resourceController@getPrimaryRes");
    //获取初中教育资源接口
    Route::get("/getJuniorRes", "resourceController@getJuniorRes");
    //获取高中教育资源接口
    Route::get("/getSeniorRes", "resourceController@getSeniorRes");
    //获取拓展教育资源接口
    Route::get("/getExpandRes", "resourceController@getExpandRes");

    //获取最新资源接口
    Route::get("/getResOrdTime", "resourceController@getResOrdTime");
    //获取最热资源接口
    Route::get("/getResOrdFav", "resourceController@getResOrdFav");
    //获取教师贡献排名接口
    Route::get("/getResOrdTea", "resourceController@getResOrdTea");
    //  其他相关资源数据接口
    Route::get("/getOtherResurce", "resourceController@getOtherResurce");
    //  获取资源评论数据接口
    Route::post("/getResourceCommet", "resourceController@getResourceCommet") ;
    //  评论资源数据接口
    Route::post("/addResourceCommet", "resourceController@addResourceCommet");
    //  举报资源
    Route::post("/doinformant", "resourceController@doinformant");
    //删除评论
    Route::get("/delResourceCommet/{id}", "resourceController@delResourceCommet");


    //上传资源页   获取资源类型接口
    Route::get("/getResourceType", "resourceController@getResourceType");
    //             获取学段接口
    Route::get("/getStudySection", "resourceController@getStudySection");
    //             获取学科接口
    Route::get("/getStudySubject/{id}", "resourceController@getStudySubject");
    //             获取版本接口
    Route::get("/getStudyEdition/{id}", "resourceController@getStudyEdition");
    //             获取册别接口
    Route::get("/getStudyGrade/{id}", "resourceController@getStudyGrade");
    //             获取教材目录接口
    Route::get("/getStudyChapter/{id}", "resourceController@getStudyChapter");
    //             资源上传接口
    Route::post('/douploadResource', 'resourceController@douploadResource');

    Route::post('/douploadResourcePic', 'resourceController@douploadResourcePic');
    //             资源信息提交接口
    Route::post('/douploadResourceInfo', 'resourceController@douploadResourceInfo');

});


//  新闻路由组
Route::group(["prefix" => "/news", "namespace" => 'qiyun\news'], function () {
    //新闻首页
    Route::get('/', 'newsController@index');
    Route::get('/newsTwo', 'newsController@indexTwo');
    //  新闻详情
    Route::get('/newsDetail/{id?}', 'newsController@newsDetail');
    //举报育资讯接口
    Route::post("/doinformant", "newsController@doinformant");


    //获取教育资讯接口
    Route::post("/getZixun", "newsController@getZixun");
    //获取教育政策接口
    Route::post("/getZhengce", "newsController@getZhengce");

    //  新闻内容数据接口
    Route::get("/getContent/{id}", "newsController@getContent");
    //  图片新闻数据接口
    Route::get("/getImageNews", "newsController@getImageNews");
    //  热门资讯数据接口
    Route::get("/getHotNews", "newsController@getHotNews");
});


//  微课路由组
Route::group(["prefix" => "/microLesson", "namespace" => 'qiyun\microLesson'], function () {
    //  微课中心
    Route::get('/', 'microLessonController@index');

    //  微课详情
    Route::get('/microLessonDetail/{id?}', 'microLessonController@microLessonDetail');

    // 微课列表页
    Route::get('/microLessonList', 'microLessonController@microLessonList');

    //  微课发布页面
    Route::get('/microLessonPost', 'microLessonController@microLessonPost');

    //  微课联动接口
    Route::post('/microLessonSelect', 'microLessonController@microLessonSelect');

    //  微课发布添加提交
    Route::post('/microLessonAdd', 'microLessonController@microLessonAdd');

    // 微课投诉接口
    Route::post('/microLessonComplain','microLessonController@microLessonComplain');


    //微课详情页 获取 点赞分享 接口
    Route::get("/getMicLessonFavDetail/{micLessonId}", "microLessonController@getMicLessonFavDetail");
    //微课详情页 执行 点赞 收藏 分享 接口
    Route::get("/doClick/{micLessonId}", "microLessonController@doClick");
    Route::get("/doFav/{micLessonId}", "microLessonController@doFav");

    //  微课中心推荐数据接口
    Route::get("/getRecommend", "microLessonController@getRecommend");
    //  微课中心微课列表数据接口
    Route::post("/microLessonListSelect", "microLessonController@microLessonListSelect");
    //  其他相关资源数据接口
    Route::get("/getOtherResurce", "microLessonController@getOtherResurce");
    //  资源评论数据接口
    // Route::get("/getResourceCommet/{id}", "microLessonController@getResourceCommet");
    Route::post("/getResourceCommet/", "microLessonController@getResourceCommet");
    //  删除评论
    Route::get("/delMicCommet/{id}", "microLessonController@delMicCommet");

    //  评论微课数据接口
    Route::post("/addMicCommet", "microLessonController@addMicCommet");

    //微课上传 接口
    Route::post("/doMicroLessonPost", "microLessonController@doMicroLessonPost");
    //微课 封面 微课头 上传接口
    Route::post('/doMicroLessonPicPost', 'microLessonController@doMicroLessonPicPost');

    //微课列表页获取微课选项接口
    Route::get("/getSelMenus", "microLessonController@getSelMenus");
    //微课列表页获取微课接口
    Route::post("/getMicLessons", "microLessonController@getMicLessons");



});


//  教学应用路由组
Route::group(["prefix" => "/teachingApp", "namespace" => 'qiyun\teachingApp'], function () {
    Route::get('/hello', function () {
        echo 'hello';
    });
});


//  个人空间路由组
Route::group(["prefix" => "/perSpace", "namespace" => 'qiyun\perSpace'], function () {
    Route::get('pe/{type}/{id}', 'perSpaceController@index');
    //搜索
    Route::get('/search', 'perSpaceController@search');
    //修改用户信息
    Route::post('/editUserInfo', 'perSpaceController@editUserInfo');

    //修改用户头像接口
    Route::post('/editUserPic', 'perSpaceController@editUserPic');
    //获取登陆用户信息接口
    Route::get("/getUserInfo", "perSpaceController@getUserInfo");

    //获取收藏信息接口
    Route::get("/getCollect", "perSpaceController@getCollect");
    //删除收藏
    //（单文件）
    Route::post("/delCollect", "perSpaceController@delCollect");
    //（多文件）
    Route::post("/mutidelCollect", "perSpaceController@mutidelCollect");
    //我的收藏（更多）
    Route::get("/myCollectList", "perSpaceController@myCollectList");
    //我的收藏（更多）数据接口
    Route::post("/myCollect", "perSpaceController@myCollect");

    //获取（我的教研协助组）接口
    Route::get("/researchAssist", "perSpaceController@researchAssist");
    //（个人中心  <更多> module代表相对应的模块）接口
    Route::get("/myResearchList/{module}", "perSpaceController@myResearchList");
    //（个人中心  <更多>数据）接口
    Route::post("/getMyListList", "perSpaceController@getMyListList");

    //获取（我的协同备课）接口
    Route::get("/prepareLesson", "perSpaceController@prepareLesson");

    //获取（我的评课议课）接口
    Route::get("/lessonComment", "perSpaceController@lessonComment");

    //获取（我的主题教研）接口
    Route::get("/themeResearch", "perSpaceController@themeResearch");


    //获取（我的资源）接口
    Route::post("/myResource", "perSpaceController@myResource");
    //获取（我的微课）接口
    Route::post("/myMicLesson", "perSpaceController@myMicLesson");
    //删除（我的资源）接口
    Route::post("/delMyResource", "perSpaceController@delMyResource");


    //我的资源列表页（更多）
    Route::get("/myResourceList/{rt}", "perSpaceController@myResourceList");
    //个人中心资源接口 （更多）
    Route::post("/getResList", "perSpaceController@getResList");


    //我的微课列表页（更多）
    Route::get("/myMicrolessonList/{mt}", "perSpaceController@myMicrolessonList");
    //个人中心微课接口 （更多）
    Route::post("/getMicroList", "perSpaceController@getMicroList");
    //删除（我的微课）接口
    Route::post("/delMicroLesson", "perSpaceController@delMicroLesson");



    //联动省份
    Route::post('/province', 'perSpaceController@province');
    //联动城市
    Route::post('/city', 'perSpaceController@city');
    //联动县区
    Route::post('/county', 'perSpaceController@county');
    //联动学校
    Route::post('/school', 'perSpaceController@school');
    //联动年度
    Route::post('/report', 'perSpaceController@report');
    //联动年级
    Route::post('/grade', 'perSpaceController@grade');

    // 个人消息（个人空间）
    Route::post('/userMessage', 'perSpaceController@userMessage');
    // 处理个人消息
    Route::post('/userMsgHandle', 'perSpaceController@userMsgHandle');
    //系统消息（个人空间）
    Route::get('/systemMessage', 'perSpaceController@systemMessage');

    //  获取验证码
    Route::get('/getMessage/{telephone}/{key_1}/{key_2}', [ 'uses' => 'perSpaceController@getMessage' ]);
    //check手机号唯一
    Route::post('/telphone', 'perSpaceController@telphone');
});


//  社区论坛路由组
Route::group(["prefix" => "/forums", "namespace" => 'qiyun\forums'], function () {

});


/*
||--------------------------------------------------------------------------------------
||     -------------------------- 后台管理路由 ----------------------------
||--------------------------------------------------------------------------------------
 */

//后台首页
Route::get('/admin/index', [ 'middleware' => 'level:1', 'uses' => 'qiyun\admin\indexController@index' ]);

Route::get('/admin/auth/login', function(){
    return view('qiyun.admin.auth.login');
});
Route::post('/admin/auth/login', 'Auth\AuthController@postLogin');



//页面跳转提示信息
Route::get('admin/message', function () {
    return view('qiyun.admin.message');
});


//  权限系统路由组
Route::group([ 'prefix' => '/admin/auth', 'middleware' => 'level:1', 'namespace' => 'qiyun\admin\auth' ], function ()
{

    /*
    |--------------------------------------------------------------------------
    |   角色组
    |--------------------------------------------------------------------------
    */
    //  角色组列表
    Route::get('/roleList', [ 'middleware' => 'level:8', 'uses' => 'roleController@roleList' ]);
    //  角色组编辑页
    Route::get('/roleEdit/{roleId}', [ 'middleware' => 'level:8', 'uses' => 'roleController@roleEdit' ]);
    //  执行角色组编辑
    Route::post('/doRoleEdit', [ 'middleware' => 'level:8', 'uses' => 'roleController@doRoleEdit' ]);
    //  删除角色组
    Route::get('/roleDelete/{roleId}', [ 'middleware' => 'level:8', 'uses' => 'roleController@roleDelete' ]);
    //  角色组添加页
    Route::get('/addRole', [ 'middleware' => 'level:8', 'uses' => 'roleController@addRole' ]);
    //  执行角色添加
    Route::post('/createRole', [ 'middleware' => 'level:8', 'uses' => 'roleController@createRole' ]);

    /*
    |--------------------------------------------------------------------------
    |   操作权限
    |--------------------------------------------------------------------------
    */
    //  操作权限列表
    Route::get('/permissionList', [ 'middleware' => 'level:8', 'uses' => 'permissionController@permissionList' ]);
    //  操作权限编辑页
    Route::get('/permissionEdit/{permissionId}', [ 'middleware' => 'level:8', 'uses' => 'permissionController@permissionEdit' ]);
    //  执行操作权限编辑
    Route::post('/doPermissionEdit', [ 'middleware' => 'level:8', 'uses' => 'permissionController@doPermissionEdit' ]);
    //  删除操作权限
    Route::get('/permissionDelete/{permissionId}', [ 'middleware' => 'level:8', 'uses' => 'permissionController@permissionDelete' ]);
    //  操作权限添加页
    Route::get('/addPermission', [ 'middleware' => 'level:8', 'uses' => 'permissionController@addPermission' ]);
    //  执行操作权限添加
    Route::post('/createPermission', [ 'middleware' => 'level:8', 'uses' => 'permissionController@createPermission' ]);
    //  查看角色组权限
    Route::get('/checkRolePermission/{permissionID}', [ 'middleware' => 'level:8', 'uses' => 'permissionController@checkRolePermission' ]);
    //  用户组添加操作权限
    Route::get('/addRolePermission/{permissionID}', [ 'middleware' => 'level:8', 'uses' => 'permissionController@addRolePermission' ]);
    //  执行用户组添加操作权限
    Route::post('/createRolePermission', [ 'middleware' => 'level:8', 'uses' => 'permissionController@createRolePermission' ]);

    /*
    |--------------------------------------------------------------------------
    |   管理员管理
    |--------------------------------------------------------------------------
    */
    //  后台管理员列表
    Route::get('/adminList', [ 'middleware' => [ 'level:8' ], 'uses' => 'authManageController@adminList' ]);
    //  省级管理员列表
    Route::get('/provinceManagerList', [ 'middleware' => [ 'level:7' ], 'uses' => 'authManageController@provinceManagerList' ]);
    //  市级管理员列表
    Route::get('/cityManagerList', [ 'middleware' => [ 'level:6' ], 'uses' => 'authManageController@cityManagerList' ]);
    //  区/县级管理员列表
    Route::get('/countyManagerList', [ 'middleware' => [ 'level:5' ], 'uses' => 'authManageController@countyManagerList' ]);
    //  校级管理员列表
    Route::get('/schoolManagerList', [ 'middleware' => [ 'level:4' ], 'uses' => 'authManageController@schoolManagerList' ]);
    //  年级管理员列表
    Route::get('/gradeManagerList', [ 'middleware' => [ 'level:3' ], 'uses' => 'authManageController@gradeManagerList' ]);
    //  班级管理员列表
    Route::get('/classManagerList', [ 'middleware' => [ 'level:2' ], 'uses' => 'authManageController@classManagerList' ]);
    //  查看操作权限
    Route::get('/checkPermissions/{userId}', [ 'middleware' => [ 'level:2' ], 'uses' => 'authManageController@checkPermissions' ]);
    //  查看管理员
    Route::get('/checkManagers/{roleID}/{id}', [ 'middleware' => [ 'level:2' ], 'uses' => 'authManageController@checkManagers' ]);
    //  撤销管理员
    Route::get('/revokeManager/{id}/{userID}/{type}', [ 'middleware' => [ 'level:2', 'permission:manager.remove' ], 'uses' => 'authManageController@revokeManager' ]);
    //  添加管理员
    Route::get('/addManager/{roleID}/{id}', [ 'middleware' => [ 'level:2', 'permission:manager.create' ], 'uses' => 'authManageController@addManager' ]);
    //  获取单位信息
    Route::get('/getCompanyInfo/{roleID}', [ 'middleware' => [ 'level:2', 'permission:manager.create' ], 'uses' => 'authManageController@getCompanyInfo' ]);
    //  执行添加管理员
    Route::post('/createManager', [ 'middleware' => [ 'level:2', 'permission:manager.create' ], 'uses' => 'authManageController@createManager' ]);
    //  添加用户操作权限
    Route::get('/addUserPermission/{userID}', [ 'middleware' => [ 'level:2', 'permission:manager.create' ], 'uses' => 'authManageController@addUserPermission' ]);
    //  获取操作权限信息
    Route::get('/getPermissionInfo/{modelName}', [ 'middleware' => [ 'level:2', 'permission:manager.create' ], 'uses' => 'authManageController@getPermissionInfo' ]);
    //  执行添加用户操作权限
    Route::post('/createUserPermission', [ 'middleware' => [ 'level:2', 'permission:manager.create' ], 'uses' => 'authManageController@createUserPermission' ]);
    //  修改角色
    Route::get('/modifyManager/{roleID}/{userID}/{urlTarget}', [ 'middleware' => [ 'level:2', 'permission:manager.modify' ], 'uses' => 'authManageController@modifyManager' ]);
    //  执行修改角色
    Route::post('/updateManager', [ 'middleware' => [ 'level:2', 'permission:manager.modify' ], 'uses' => 'authManageController@updateManager' ]);

});


//教师协作组管理路由组
Route::group(["prefix" => "admin/teacher",'middleware' => 'level:7','namespace' => 'qiyun\admin\teachers'],function(){
    //教师列表
    Route::get('teacherList', 'IndexController@index');
    //教师协作组编辑页
    Route::get('teacherEdit/{id}', 'IndexController@teacherEdit');
    //教师协作组编辑
    Route::post('doTeacherEdit',['uses'=>'IndexController@doTeacherEdit']);
    //教师协作组删除
    Route::get('delTeacher/{id}',['uses'=>'IndexController@delTeacher']);


    //协作组成员表
    Route::get('memberList', 'MemberController@index');
    // 协作组成员编辑页
    Route::get('memberEdit/{id}',['uses'=>'MemberController@memberEdit']);
    //协作组成员编辑
    Route::post('doMemberEdit', 'MemberController@doMemberEdit');
    //协作组成员删除
    Route::get('delMember/{id}',['uses'=>'MemberController@delMember']);

});


//用户管理路由组

Route::group(["prefix" => "/admin/users",'middleware' => 'level:1', 'namespace' => 'qiyun\admin\users'], function () {
    //用户列表
    Route::get('userList',['middleware' => 'level:1','uses'=>'IndexController@index']);
    //添加用户
    Route::get('addsUser', ['middleware' => 'level:2','uses'=>'IndexController@addUser']);

    //插入用户
    Route::post('insertUser', ['middleware' => 'level:2','uses'=>'IndexController@insertUser']);

    //编辑用户
    Route::get('editUser/{id}', ['middleware' => 'level:2','uses'=>'IndexController@editUser']);

    //修改用户
    Route::post('updateUser', ['middleware' => 'level:2','uses'=>'IndexController@updateUser']);

    //删除用户
    Route::post('delUser', ['middleware' => 'level:2','uses'=>'IndexController@delUser']);

    //用户详情
    Route::get('show/{id}', ['middleware' => 'level:1','uses'=>'IndexController@show']);

    //用户详情
    Route::get('personDetail', ['middleware' => 'level:1','uses'=>'IndexController@personDetail']);

    //重置密码
    Route::get('resetPass/{id}',['middleware' => 'level:2','uses'=>'IndexController@resetPass']);

    //执行重置密码
    Route::post('reset', ['middleware' => 'level:2','uses'=>'IndexController@reset']);
    //修改用户状态
    Route::post('changeStatus', ['middleware' => 'level:2','uses'=>'IndexController@changeStatus']);

    //联动省份
    Route::post('province', ['middleware' => 'level:6','uses'=>'IndexController@province']);
    //联动城市
    Route::post('city', ['middleware' => 'level:5','uses'=>'IndexController@city']);
    //联动县区
    Route::post('county', ['middleware' => 'level:4','uses'=>'IndexController@county']);
    //联动学校
    Route::post('school', ['middleware' => 'level:3','uses'=>'IndexController@school']);
    //联动年度
    Route::post('report', ['middleware' => 'level:2','uses'=>'IndexController@report']);
    //联动年级
    Route::post('grade', ['middleware' => 'level:2','uses'=>'IndexController@grade']);
    //验证用户名唯一
    Route::post('checkUsername', ['middleware' => 'level:1','uses'=>'IndexController@checkUsername']);
    //验证邮箱唯一
    Route::post('checkEmail', ['middleware' => 'level:1','uses'=>'IndexController@checkEmail']);
    //验证手机唯一
    Route::post('checkPhone', ['middleware' => 'level:1','uses'=>'IndexController@checkPhone']);
    //验证IDcard唯一
    Route::post('checkIDcard', ['middleware' => 'level:1','uses'=>'IndexController@checkIDcard']);

    //上传图片接口
    Route::post('addImg', ['middleware' => 'level:1','uses'=>'IndexController@addImg']);
});

//新闻资讯管理路由组
Route::group(['prefix' => 'admin/news','middleware' => 'level:7','namespace' => 'qiyun\admin\news'],function(){
    //资讯列表
    Route::get('newsList', 'NewsController@newsList');
    //新闻详情页
    Route::get('newsDetail/{id}',['uses'=>'NewsController@newsDetail']);
    //执行添加新闻
    Route::post('doAddNews','NewsController@doAddNews');
    //添加新闻资讯
    Route::get('addNews',['uses'=>'NewsController@addNews']);
    //资讯编辑页
    Route::get('newsEdit/{id}',['uses'=>'NewsController@newsEdit']);
    //资讯编辑
    Route::post('doNewsEdit', 'NewsController@doNewsEdit');
    //资讯删除
    Route::get('delNews/{id}',['uses'=>'NewsController@delNews']);

    //资讯分类表路由
    //资讯分类列表
    Route::get('newsTypeList', 'NewsController@newsTypeList');
    //添加新闻资讯分类
    Route::get('addNewsType',['uses'=>'NewsController@addNewsType']);
    //执行添加新闻资讯分类
    Route::post('doAddNewsType','NewsController@doAddNewsType');
    //资讯分类编辑页
    Route::get('newsTypeEdit/{id}',['uses'=>'NewsController@newsTypeEdit']);
    //资讯分类编辑
    Route::post('doNewsTypeEdit', 'NewsController@doNewsTypeEdit');
    //资讯分类删除
    Route::get('delNewsType/{id}',['uses'=>'NewsController@delNewsType']);


    //举报
    Route::get('newsReportList','NewsController@newsReportList');
    //编辑
    Route::get('editNewsReport/{id}','NewsController@editNewsReport');
    //执行编辑
    Route::post('doEditNewsReport','NewsController@doEditNewsReport');
    //删除
    Route::get('delNewsReport/{id}','NewsController@delNewsReport');
});


//教研主题管理路由组
Route::group(['prefix'=>'admin/theme','middleware' => 'level:7','namespace'=>'qiyun\admin\theme'],function(){
    //主题列表
    Route::get('themeList', 'ThemeController@themeList');
    //主题编辑页
    Route::get('themeEdit/{id}',['uses'=>'ThemeController@themeEdit']);
    //主题编辑
    Route::post('doThemeEdit', 'ThemeController@doThemeEdit');
    //删除教研主题
    Route::get('delTheme/{id}',['uses'=>'ThemeController@delTheme']);


    //教研主题文章路由
    //文章列表
    Route::get('articleList','ThemeController@articleList');
    //文章编辑页
    Route::get('articleEdit/{id}',['uses'=>'ThemeController@articleEdit']);
    //文章编辑
    Route::post('doArticleEdit', 'ThemeController@doArticleEdit');
    //删除文章
    Route::get('delArticle/{id}',['uses'=>'ThemeController@delArticle']);


    //教研主题图片表路由
    //图片列表
    Route::get('imageList', 'ThemeController@imageList');
    //图片编辑页
    Route::get('imageEdit/{id}',['uses'=>'ThemeController@imageEdit']);
    //图片编辑
    Route::post('doImageEdit', 'ThemeController@doImageEdit');
    //删除图片
    Route::get('delImage/{id}',['uses'=>'ThemeController@delImage']);


    //教研主题音视频表路由
    //音视频列表
    Route::get('videoList', 'ThemeController@videoList');
    //教研主题音视频编辑页
    Route::get('videoEdit/{id}',['uses'=>'ThemeController@videoEdit']);
    //教研主题音视频编辑
    Route::post('doVideoEdit', 'ThemeController@doVideoEdit');
    //删除主题音频
    Route::get('delVideo/{id}',['uses'=>'ThemeController@delVideo']);
    Route::post('doUploadpic','ThemeController@doUploadpic');


    //教研主题资源视频表路由
    //资源列表
    Route::get('resourceList', 'ThemeController@resourceList');
    //资源编辑页
    Route::get('resourceEdit/{id}',['uses'=>'ThemeController@resourceEdit']);
    //资源编辑
    Route::post('doResourceEdit', 'ThemeController@doResourceEdit');
    //删除资源
    Route::get('delResource/{id}',['uses'=>'ThemeController@delResource']);


    //教研主题话题
    Route::get('topicList','ThemeController@topicList');
    //话题编辑页
    Route::get('editTopic/{id}',['uses'=>'ThemeController@editTopic']);
    //执行编辑
    Route::post('doTopicEdit','ThemeController@doTopicEdit');
    //删除话题
    Route::get('delTopic/{id}',['uses'=>'ThemeController@delTopic']);

});


//协同备课管理路由组
Route::group(['prefix'=>'admin/lesson','middleware' => 'level:7','namespace'=>'qiyun\admin\lesson'],function(){
    //协同备课表列表
    Route::get('lessonSubjectList', 'LessonController@lessonSubjectList');
    //协同备课编辑页
    Route::get('lessonSubjectEdit/{id}',['uses'=>'LessonController@lessonSubjectEdit']);
    //协同备课编辑
    Route::post('dolessonSubjectEdit', 'LessonController@dolessonSubjectEdit');
    //学科
    Route::get('subject', 'LessonController@subject');
    //版本
    Route::get('edition', 'LessonController@edition');
    //年级册别
    Route::get('grade', 'LessonController@grade');
    //章节
    Route::get('chapter', 'LessonController@chapter');
    //删除协同备课
    Route::get('delLessonSubject/{id}',['uses'=>'LessonController@delLessonSubject']);


    //协同备课共案表
    //共案列表
    Route::get('lessonTotalList', 'LessonController@lessonTotalList');
    //共案编辑页
    Route::get('editLessonTotal/{id}',['uses'=>'LessonController@editLessonTotal']);
    //共案编辑
    Route::post('doEditLessonTotal', 'LessonController@doEditLessonTotal');
    //删除共案
    Route::get('delLessonTotal',['uses'=>'LessonController@delLessonTotal']);


    //协同备课文章表路由
    //协同备课文章列表
    Route::get('lessonArticleList', 'LessonController@lessonArticleList');
    //协同备课文章编辑页
    Route::get('lessonArticleEdit/{id}',['uses'=>'LessonController@lessonArticleEdit']);
    //协同备课文章编辑
    Route::post('doLessonArticleEdit', 'LessonController@doLessonArticleEdit');
    //删除协同备课文章
    Route::get('delLessonArticle/{id}',['uses'=>'LessonController@delLessonArticle']);


    //协同备课图片表路由
    //协同备课图片列表
    Route::get('lessonImageList', 'LessonController@lessonImageList');
    //协同备课图片编辑页
    Route::get('lessonImageEdit/{id}',['uses'=>'LessonController@lessonImageEdit']);
    //协同备课图片编辑
    Route::post('doLessonImageEdit', 'LessonController@doLessonImageEdit');
    //协同备课删除图片
    Route::get('delLessonImage/{id}',['uses'=>'LessonController@delLessonImage']);


    //协同备课音视频表路由
    //协同备课音视频列表
    Route::get('lessonVideoList', 'LessonController@lessonVideoList');
    //协同备课音视频编辑页
    Route::get('lessonVideoEdit/{id}',['uses'=>'LessonController@lessonVideoEdit']);
    //协同备课音视频编辑
    Route::post('doLessonVideoEdit', 'LessonController@doLessonVideoEdit');
    //删除协同备课音频
    Route::get('delLessonVideo/{id}',['uses'=>'LessonController@delLessonVideo']);


    //协同备课资源视频表路由
    //协同备课资源列表
    Route::get('lessonResourceList', 'LessonController@lessonResourceList');
    //协同备课资源编辑页
    Route::get('lessonResourceEdit/{id}',['uses'=>'LessonController@lessonResourceEdit']);
    //协同备课资源编辑
    Route::post('doLessonResourceEdit', 'LessonController@doLessonResourceEdit');
    //删除协同备课资源
    Route::get('delLessonResource/{id}',['uses'=>'LessonController@delLessonResource']);

});


//评课管理路由组
Route::group(['prefix'=>'admin/evaluation','middleware' => 'level:7','namespace'=>'qiyun\admin\evaluation'],function(){
    //评课表
    //评课列表
    Route::get('evaluationList', 'EvaluationController@evaluationList');
    //评课编辑页
    Route::get('editEvaluation/{id}',['uses'=>'EvaluationController@editEvaluation']);
    //评课编辑
    Route::post('doEditEvaluation', 'EvaluationController@doEditEvaluation');
    //删除评课
    Route::get('delEvaluation/{id}',['uses'=>'EvaluationController@delEvaluation']);


    //评课分类表
    Route::get('evaluatTypeList', 'EvaluationController@evaluatTypeList');
    //添加评课分类
    Route::get('addEvaluatType',['uses'=>'EvaluationController@addEvaluatType']);
    //执行添加评课分类
    Route::post('doAddEvaluatType','EvaluationController@doAddEvaluatType');
    //评课分类编辑页
    Route::get('editEvaluatType/{id}',['uses'=>'EvaluationController@editEvaluatType']);
    //评课分类编辑
    Route::post('doEditEvaluatType', 'EvaluationController@doEditEvaluatType');
    //删除评课分类
    Route::get('delEvaluatType/{id}',['uses'=>'EvaluationController@delEvaluatType']);


    //评课上传课件表
    //列表
    Route::get('evaluatCoursewareList', 'EvaluationController@evaluatCoursewareList');
    //课件编辑页
    Route::get('editEvaluatCourseware/{id}',['uses'=>'EvaluationController@editEvaluatCourseware']);
    //课件编辑
    Route::post('doEditEvaluatCourseware', 'EvaluationController@doEditEvaluatCourseware');
    //删除课件
    Route::get('delEvaluatCourseware/{id}',['uses'=>'EvaluationController@delEvaluatCourseware']);


    //评课评论表
    Route::get('evaluatCommentList', 'EvaluationController@evaluatCommentList');
    //评论编辑页
    Route::get('editEvaluatComment/{id}',['uses'=>'EvaluationController@editEvaluatComment']);
    //评论编辑
    Route::post('doEditEvaluatComment', 'EvaluationController@doEditEvaluatComment');
    //删除评评论
    Route::get('delEvaluatComment/{id}',['uses'=>'EvaluationController@delEvaluatComment']);


    //评课评论回复表
    Route::get('evaluatCommentReplyList', 'EvaluationController@evaluatCommentReplyList');
    //评论回复编辑页
    Route::get('editEvaluatCommentReply/{id}', ['uses'=>'EvaluationController@editEvaluatCommentReply']);
    //评论回复编辑
    Route::post('doEditEvaluatCommentReply', 'EvaluationController@doEditEvaluatCommentReply');
    //删除评论回复
    Route::get('delEvaluatCommentReply/{id}', ['uses'=>'EvaluationController@delEvaluatCommentReply']);


    //评课打分结果表
    Route::get('evaluatResultList', 'EvaluationController@evaluatResultList');
    //评课打分编辑页
    Route::get('editEvaluatResult/{id}', ['uses'=>'EvaluationController@editEvaluatResult']);
    //评课打分编辑
    Route::post('doEditEvaluatResult', 'EvaluationController@doEditEvaluatResult');
    //删除评课打分
    Route::get('delEvaluatResult/{id}', ['uses'=>'EvaluationController@delEvaluatResult']);


    //评课模板表
    Route::get('evaluatTempList', 'EvaluationController@evaluatTempList');
    //评课模板编辑页
    Route::get('editEvaluatTemp/{id}', ['uses'=>'EvaluationController@editEvaluatTemp']);
    //评课模板编辑
    Route::post('doEditEvaluatTemp', 'EvaluationController@doEditEvaluatTemp');
    //删除评课模板
    Route::get('delEvaluatTemp/{id}', ['uses'=>'EvaluationController@delEvaluatTemp']);


    //评课模板对应选项标准表
    Route::get('evaluatTmpContentList', 'EvaluationController@evaluatTmpContentList');
    //评课模板对应选项标准编辑页
    Route::get('editEvaluatTmpContent/{id}', ['uses'=>'EvaluationController@editEvaluatTmpContent']);
    //评课模板对应选项标准编辑
    Route::post('doEditEvaluatTmpContent', 'EvaluationController@doEditEvaluatTmpContent');
    //删除评课模板对应选项标准
    Route::get('delEvaluatTmpContent/{id}', ['uses'=>'EvaluationController@delEvaluatTmpContent']);


    //评课成员表
    Route::get('evaluatMemberList','EvaluationController@evaluatMemberList');
    //编辑评课成员
    Route::get('editEvaluatMember/{id}',['uses'=>'EvaluationController@editEvaluatMember']);
    //执行编辑
    Route::post('doEditEvaluatMember','EvaluationController@doEditEvaluatMember');
    //删除评课成员
    Route::get('delEvaluatMember/{id}',['uses'=>'EvaluationController@delEvaluatMember']);
});



// 基础设置管理路由组
Route::group(["prefix" => "admin/baseset", 'middleware' => 'level:3','namespace' => 'qiyun\admin\baseset'], function () {
    // 部门数据列表
    Route::get('departmentList','DepartmentController@index');
    // 部门删除
    Route::get('deldep/{id}','DepartmentController@deldep');
    // 部门编辑页
    Route::get('editdepartment/{id}','DepartmentController@editdep');
    // 部门编辑方法
    Route::post('editdepsub','DepartmentController@editdepsub');
    // 添加部门
    Route::get('addsdepartment','DepartmentController@adddep');
    // 部门添加方法
    Route::post('adddepexe','DepartmentController@adddepexe');


    // 教室数据列表
    Route::get('classroomList','ClassroomController@index');
    // 教室删除
    Route::get('delclass/{id}','ClassroomController@delclass');
    // 教室编辑页
    Route::get('editclassroom/{id}','ClassroomController@editclass');
    // 教室编辑方法
    Route::post('editclasssub','ClassroomController@editclasssub');
    // 添加教室
    Route::get('addsclassroom','ClassroomController@addclass');
    // 教室添加方法
    Route::post('addclassexe','ClassroomController@addclassexe');



    //学科数据列表
    Route::get('subjectList','SubjectController@index');
    // 学科删除
    Route::get('delsubject/{id}','SubjectController@delsubject');
    // 学科编辑页
    Route::get('editsubject/{id}','SubjectController@editsubject');
    // 学科编辑方法
    Route::post('editsubjectsub','SubjectController@editsubjectsub');
    // 添加学科
    Route::get('addssubject','SubjectController@addsubject');
    // 学科添加方法
    Route::post('addsubjectexe','SubjectController@addsubjectexe');



    // 教研组数据列表
    Route::get('teachgroupList','TeachgroupController@index');
    // 教研组删除
    Route::get('delteach/{id}','TeachgroupController@delteach');
    // 教研组编辑页
    Route::get('editteachgroup/{id}','TeachgroupController@editteach');
    // 教研组编辑方法
    Route::post('editteachsub','TeachgroupController@editteachsub');
    // 添加教研组
    Route::get('addsteachgroup','TeachgroupController@addteach');
    // 教研组添加方法
    Route::post('addteachexe','TeachgroupController@addteachexe');

});





// 微课管理路由组
Route::group(["prefix" => "admin/microlesson",'middleware' => 'level:7', 'namespace' => 'qiyun\admin\microlesson'], function () {
    // 微课数据列表
    Route::get('microlessonList', 'IndexController@index');
    //微课删除
    Route::get('delmicro/{id}', 'IndexController@delmicro');
    // 微课编辑页
    Route::get('editmicrolesson/{id}', 'IndexController@editmicro');
    // 微课编辑方法
    Route::post('editmicrolessonsub', 'IndexController@editmicrosub');
    // 微课添加页
    Route::get('addmicro','IndexController@addmicro');
    // 微课添加方法
    Route::post('addmicrosub','IndexController@addmicrosub');
    // 微课评论详情
    Route::get('detailmicrolesson/{id}', 'IndexController@detailmicrolesson');
     //上传接口
    Route::post('/doAddmicrolesson', 'IndexController@doAddmicrolesson');




    // 微课分类管理
    // 学段表列表
    Route::get('microlessonCategoryList', 'CategoryController@index');
    // 学段表删除
    Route::get('delsection/{id}', 'CategoryController@delsection');
    // 学段编辑页
    Route::get('editmicrolessonCategory/{id}', 'CategoryController@editsection');
    // 学段编辑方法
    Route::post('editmicrolessonCategorysectionsub', 'CategoryController@editsectionsub');


    // 班级表列表
    Route::get('listgrade/{id}', 'CategoryController@listgrade');
    // 班级表删除
    Route::get('delgrade/{id}', 'CategoryController@delgrade');
    // 班级编辑页
    Route::get('editgrade/{id}', 'CategoryController@editgrade');
    // 班级编辑方法
    Route::post('editgradesub', 'CategoryController@editgradesub');


    // 学科表列表
    Route::get('listsubject/{id}', 'CategoryController@listsubject');
    // 学科表删除
    Route::get('delsubject/{id}', 'CategoryController@delsubject');
    // 学科编辑页
    Route::get('editsubject/{id}', 'CategoryController@editsubject');
    // 学科编辑方法
    Route::post('editsubjectsub', 'CategoryController@editsubjectsub');
    // 学科添加页
    Route::get('addsubject','CategoryController@addsubject');
    // 学科添加方法
    Route::post('addsubjectsub','CategoryController@addsubjectsub');
    // ajax联动
    Route::get('ajaxgrade','CategoryController@ajaxgrade');
    // ajax验证学科是否重复
    Route::get('ajaxname','CategoryController@ajaxname');


    // 微课评论管理
    Route::get('microlessonCommentList', 'CommentController@index');
    // 微课评论删除
    Route::get('delcomment/{id}', 'CommentController@delcomment');
    // 微课评论编辑页
    Route::get('editmicrolessonComment/{id}', 'CommentController@editcomment');
    // 微课编辑方法
    Route::post('editmicrolessonCommentsub', 'CommentController@editcommentsub');
    // 微课评论详情
    Route::get('detailcomment/{id}', 'CommentController@detailcomment');


    // 微课投诉管理
    Route::get('microlessonComplainList','ComplainController@index');
    // 投诉删除
    Route::get('delcomplain/{id}','ComplainController@delcomplain');
    // 编辑页
    Route::get('editmicrolessoncomplain/{id}','ComplainController@editcomplain');
    // 编辑方法
    Route::post('editcomplainsub','ComplainController@editcomplainsub');


    // 微课收藏管理
    Route::get('microlessonCollectList','CollectController@index');
    // 删除
    Route::get('delcollect/{id}','CollectController@delcollect');
    // 编辑页
    Route::get('editcollect/{id}','CollectController@editcollect');
    // 编辑方法
    Route::post('editcollectsub','CollectController@editcollectsub');

     // section --> grade(ajax联动)
    Route::get('sectiongrade','IndexController@sectiongrade');
    // grade --> subject(ajax联动)
    Route::get('gradesubject','IndexController@gradesubject');




});





// 组织机构路由组
Route::group(["prefix" => "admin/organization", 'namespace' => 'qiyun\admin\organization'], function () {
    // 单位组织
    Route::get('provinceList', ['middleware'=>'level:6','uses'=>'provinceController@index']);
    //单位删除
    Route::get('delpro/{id}', ['middleware'=>'level:7','uses'=>'provinceController@delpro']);
    // 单位编辑页
    Route::get('editprovince/{id}', ['middleware'=>'level:7','uses'=>'provinceController@editpro']);
    // 单位编辑方法
    Route::post('editprovincesub', ['middleware'=>'level:7','uses'=>'provinceController@editprosub']);
    // 单位添加页
    Route::get('addsprovince',['middleware'=>'level:7','uses'=>'provinceController@addpro']);
    // 单位添加方法
    Route::post('addsprovinceexe',['middleware'=>'level:7','uses'=>'provinceController@addproexe']);


    // 市区信息
    Route::get('cityList', ['middleware'=>'level:5','uses'=>'cityController@index']);
    // 市区删除
    Route::get('delcity/{id}', ['middleware'=>'level:6','uses'=>'cityController@delcity']);
    // 市区编辑页
    Route::get('editcity/{id}', ['middleware'=>'level:6','uses'=>'cityController@editcity']);
    // 市区编辑方法
    Route::post('editcitysub', ['middleware'=>'level:6','uses'=>'cityController@editcitysub']);
    // 市区添加页
    Route::get('addscity',['middleware'=>'level:6','uses'=>'cityController@addcity']);
    // 市区添加方法
    Route::post('addcityexe',['middleware'=>'level:6','uses'=>'cityController@addcityexe']);


    // 县区信息
    Route::get('countyList', ['middleware'=>'level:4','uses'=>'countyController@index']);
    // 市区删除
    Route::get('delcounty/{id}', ['middleware'=>'level:5','uses'=>'countyController@delcounty']);
    // 市区编辑页
    Route::get('editcounty/{id}', ['middleware'=>'level:5','uses'=>'countyController@editcounty']);
    // 市区编辑方法
    Route::post('editcountysub', ['middleware'=>'level:5','uses'=>'countyController@editcountysub']);
      // 市区添加页
    Route::get('addscounty',['middleware'=>'level:5','uses'=>'countyController@addcounty']);
    // 市区添加方法
    Route::post('addcountyexe',['middleware'=>'level:5','uses'=>'countyController@addcountyexe']);
    // ajax市区
    Route::get('ajaxcity',['middleware'=>'level:5','uses'=>'countyController@ajaxcity']);
    // ajax县
    Route::get('ajaxcounty',['middleware'=>'level:5','uses'=>'countyController@ajaxcounty']);

});


// 教师分组路由
Route::group(['prefix'=>'admin/teachergroup','middleware' => 'level:3','namespace'=>'qiyun\admin\teachergroup'],function() {
    // 部门分组列表信息
    Route::get('teachdepList','teachdepController@teachdepList');
    // 部门分组删除
    Route::get('delteachdep/{id}','teachdepController@delteachdep');
    // 部门编辑页
    Route::get('editteachdep/{id}','teachdepController@editteachdep');
    // 部门编辑方法
    Route::post('editteachdepsub','teachdepController@editteachdepsub');
    // 部门添加页
    Route::get('addteachdep','teachdepController@addteachdep');
    // 部门添加方法
    Route::post('addteachdepexe','teachdepController@addteachdepexe');
    // ajaxuser
    Route::get('ajaxuser','teachdepController@ajaxuser');



    // 年级分组列表信息
    Route::get('teachgradeList','teachgradeController@teachgradeList');
    // 年级分组删除
    Route::get('delteachgrade/{id}','teachgradeController@delteachgrade');
    // 年级编辑页
    Route::get('editteachgrade/{id}','teachgradeController@editteachgrade');
    // 年级编辑方法
    Route::post('editteachgradesub','teachgradeController@editteachgradesub');
    // 年级添加页
    Route::get('addteachgrade','teachgradeController@addteachgrade');
    // 年级添加方法
    Route::post('addteachgradeexe','teachgradeController@addteachgradeexe');


    // 学科分组列表信息
    Route::get('teachsubjectList','teachsubjectController@teachsubjectList');
    // 学科分组删除
    Route::get('delteachsubject/{id}','teachsubjectController@delteachsubject');
    // 学科编辑页
    Route::get('editteachsubject/{id}','teachsubjectController@editteachsubject');
    // 学科编辑方法
    Route::post('editteachsubjectsub','teachsubjectController@editteachsubjectsub');
    // 学科添加页
    Route::get('addteachsubject','teachsubjectController@addteachsubject');
    // 学科添加方法
    Route::post('addteachsubjectexe','teachsubjectController@addteachsubjectexe');



    /************ajax系列************/
    // 组织
    Route::get('ajaxorganizes','teachgradeController@ajaxorganizes');
    // 市区
    Route::get('ajaxcitys','teachgradeController@ajaxcitys');
    // 区县
    Route::get('ajaxcountys','teachgradeController@ajaxcountys');
    // 学校
    Route::get('ajaxschools','teachgradeController@ajaxschools');
    // 年级
    Route::get('ajaxgrades','teachgradeController@ajaxgrades');
    // 部门
    Route::get('ajaxdeparts','teachgradeController@ajaxdeparts');
    // 学科
    Route::get('ajaxsubjects','teachgradeController@ajaxsubjects');
    // 教室
    Route::get('ajaxclassroom','teachgradeController@ajaxclassroom');
    // 教研组
    Route::get('ajaxteachgroup','teachgradeController@ajaxteachgroup');
    // school->user
    Route::get('schooluser','teachdepController@schooluser');



});







//学校基础设置相关路由
Route::group(['prefix'=>'admin/school','namespace'=>'qiyun\admin\school'],function(){
    //学校表
    Route::get('schoolList',['middleware'=>'level:3','uses'=>'SchoolController@schoolList']);
    //添加学校页
    Route::get('addSchool',['middleware'=>['level:4','permission:base.create'],'uses'=>'SchoolController@addSchool']);
    //执行添加学校
    Route::post('doAddSchool',['middleware'=>'level:4','uses'=>'SchoolController@doAddSchool']);
    //学校编辑页
    Route::get('editSchool/{id}',['middleware'=>'level:3','uses'=>'SchoolController@editSchool']);
    //学校编辑
    Route::post('doEditSchool',['middleware'=>['level:3','permission:base.modify'],'uses'=>'SchoolController@doEditSchool']);
    //删除学校
    Route::get('delSchool/{id}',['middleware'=>['level:4','permission:base.remove'],'uses'=>'SchoolController@delSchool']);
    //多项删除
    Route::post('delSchools','SchoolController@delSchools');


    //学校年度信息表
    //年度列表
    Route::get('schoolYearList',['middleware'=>'level:3','uses'=>'SchoolYearController@schoolYearList']);
    //添加学校年度信息页
    Route::get('addSchoolYear',['middleware'=>['level:3','permission:base.create'],'uses'=>'SchoolYearController@addSchoolYear']);
    //执行添加学校年度
    Route::post('doAddSchoolYear',['middleware'=>'level:3','uses'=>'SchoolYearController@doAddSchoolYear']);
    //学校年度信息编辑页
    Route::get('editSchoolYear/{id}',['middleware'=>['level:3','permission:base.modify'],'uses'=>'SchoolYearController@editSchoolYear']);
    //执行学校年度信息编辑
    Route::post('doEditSchoolYear',['middleware'=>'level:3','uses'=>'SchoolYearController@doEditSchoolYear']);
    //删除学校年度信息
    Route::get('delSchoolYear/{id}',['middleware'=>['level:3','permission:base.remove'],'uses'=>'SchoolYearController@delSchoolYear']);


    //学校学期信息表
    //学期列表
    Route::get('schoolTermList',['middleware'=>'level:3','uses'=>'SchoolTermController@schoolTermList']);
    //添加学期信息页
    Route::get('addSchoolTerm',['middleware'=>['level:3','permission:base.create'],'uses'=>'SchoolTermController@addSchoolTerm']);
    //执行添加学期信息
    Route::post('doAddSchoolTerm',['middleware'=>'level:3','uses'=>'SchoolTermController@doAddSchoolTerm']);
    //学期编辑页
    Route::get('editSchoolTerm/{id}',['middleware'=>['level:3','permission:base.modify'],'uses'=>'SchoolTermController@editSchoolTerm']);
    //执行学期编辑
    Route::post('doEditSchoolTerm',['middleware'=>'level:3','uses'=>'SchoolTermController@doEditSchoolTerm']);
    //删除学期
    Route::get('delSchoolTerm/{id}',['middleware'=>['level:3','permission:base.remove'],'uses'=>'SchoolTermController@delSchoolTerm']);


    //学校年级信息管理
    //年级列表
    Route::get('schoolGradeList',['middleware'=>'level:2','uses'=>'SchoolGradeController@schoolGradeList']);
    //添加年级信息页
    Route::get('addSchoolGrade',['middleware'=>['level:3','permission:base.create'],'uses'=>'SchoolGradeController@addSchoolGrade']);
    //执行添加年级信息
    Route::post('doAddSchoolGrade',['middleware'=>'level:3','uses'=>'SchoolGradeController@doAddSchoolGrade']);
    //年级编辑页
    Route::get('editSchoolGrade/{id}',['middleware'=>['level:2','permission:base.modify'],'uses'=>'SchoolGradeController@editSchoolGrade']);
    //执行年级编辑
    Route::post('doEditSchoolGrade',['middleware'=>'level:2','uses'=>'SchoolGradeController@doEditSchoolGrade']);
    //删除年级
    Route::get('delSchoolGrade/{id}',['middleware'=>['level:3','permission:base.remove'],'uses'=>'SchoolGradeController@delSchoolGrade']);


    //班级信息管理
    //班级列表
    Route::get('schoolClassList',['middleware'=>'level:2','uses'=>'SchoolClassController@schoolClassList']);
    //添加班级页
    Route::get('addSchoolClass',['middleware'=>['level:2','permission:base.create'],'uses'=>'SchoolClassController@addSchoolClass']);
    //执行添加班级
    Route::post('doAddSchoolClass',['middleware'=>'level:2','uses'=>'SchoolClassController@doAddSchoolClass']);
    //班级编辑页
    Route::get('editSchoolClass/{id}',['middleware'=>['level:2','permission:base.modify'],'uses'=>'SchoolClassController@editSchoolClass']);
    //执行班级编辑
    Route::post('doEditSchoolClass',['middleware'=>'level:2','uses'=>'SchoolClassController@doEditSchoolClass']);
    //删除班级
    Route::get('delSchoolClass/{id}',['middleware'=>['level:2','permission:base.remove'],'uses'=>'SchoolClassController@delSchoolClass']);


    //任课老师信息管理
    //任课老师列表
    Route::get('schoolTeacherList',['middleware'=>'level:3','uses'=>'SchoolTeacherController@schoolTeacherList']);
    //添加任课老师页
    Route::get('addSchoolTeacher',['middleware'=>['level:3','permission:posts.add'],'uses'=>'SchoolTeacherController@addSchoolTeacher']);
    //执行添加任课老师
    Route::post('doAddSchoolTeacher',['middleware'=>'level:3','uses'=>'SchoolTeacherController@doAddSchoolTeacher']);
    //任课老师编辑页
    Route::get('editSchoolTeacher/{id}',['middleware'=>['level:3','permission:posts.edit'],'uses'=>'SchoolTeacherController@editSchoolTeacher']);
    //执行任课老师编辑
    Route::post('doEditSchoolTeacher',['middleware'=>'level:3','uses'=>'SchoolTeacherController@doEditSchoolTeacher']);
    //删除任课老师
    Route::get('delSchoolTeacher/{id}',['middleware'=>['level:3','permission:posts.del'],'uses'=>'SchoolTeacherController@delSchoolTeacher']);


    //班主任信息管理
    //班主任列表
    Route::get('schoolHeadteaherList',['middleware'=>'level:2','uses'=>'SchoolHeadteacherController@schoolHeadteaherList']);
    //添加班主任
    Route::get('addSchoolHeadteaher',['middleware'=>['level:2','permission:posts.add'],'uses'=>'SchoolHeadteacherController@addSchoolHeadteaher']);
    //执行添加班主任
    Route::post('doAddSchoolHeadteaher',['middleware'=>'level:2','uses'=>'SchoolHeadteacherController@doAddSchoolHeadteaher']);
    //班主任编辑页
    Route::get('editSchoolHeadteaher/{id}',['middleware'=>['level:2','permission:posts.edit'],'uses'=>'SchoolHeadteacherController@editSchoolHeadteaher']);
    //执行编辑
    Route::post('doEditSchoolHeadteaher',['middleware'=>'level:2','uses'=>'SchoolHeadteacherController@doEditSchoolHeadteaher']);
    //删除班主任
    Route::get('delSchoolHeadteaher/{id}',['middleware'=>['level:2','permission:posts.del'],'uses'=>'SchoolHeadteacherController@delSchoolHeadteaher']);


    //年级组长信息管理
    //年级组长列表
    Route::get('schoolGradeleaderList',['middleware'=>'level:3','uses'=>'SchoolGradeleaderController@schoolGradeleaderList']);
    //添加年级组长
    Route::get('addSchoolGradeleader',['middleware'=>['level:3','permission:posts.add'],'uses'=>'SchoolGradeleaderController@addSchoolGradeleader']);
    //执行添加年级组长
    Route::post('doAddSchoolGradeleader',['middleware'=>'level:3','uses'=>'SchoolGradeleaderController@doAddSchoolGradeleader']);
    //年级组长编辑页
    Route::get('editSchoolGradeleader/{id}',['middleware'=>['level:3','permission:posts.edit'],'uses'=>'SchoolGradeleaderController@editSchoolGradeleader']);
    //执行年级组长编辑
    Route::post('doEitSchoolGradeleader',['middleware'=>'level:3','uses'=>'SchoolGradeleaderController@doEitSchoolGradeleader']);
    //删除年级组长
    Route::get('delSchoolGradeleader/{id}',['middleware'=>['level:3','permission:posts.del'],'uses'=>'SchoolGradeleaderController@delSchoolGradeleader']);


    //部门负责人信息管理
    Route::get('schoolDepartmentleaderList',['middleware'=>'level:3','uses'=>'SchoolDepartmentleaderController@schoolDepartmentleaderList']);
    //添加部门负责人
    Route::get('addSchoolDepartmentleader',['middleware'=>['level:3','permission:posts.add'],'uses'=>'SchoolDepartmentleaderController@addSchoolDepartmentleader']);
    //执行添加部门负责人
    Route::post('doAddSchoolDepartmentleader',['middleware'=>'level:3','uses'=>'SchoolDepartmentleaderController@doAddSchoolDepartmentleader']);
    //部门负责人编辑页
    Route::get('editSchoolDepartmentleader/{id}',['middleware'=>['level:3','permission:posts.edit'],'uses'=>'SchoolDepartmentleaderController@editSchoolDepartmentleader']);
    //执行部门负责人编辑
    Route::post('doEditSchoolDepartmentleader',['middleware'=>'level:3','uses'=>'SchoolDepartmentleaderController@doEditSchoolDepartmentleader']);
    //删除部门负责人
    Route::get('delSchoolDepartmentleader/{id}',['middleware'=>['level:3','permission:posts.del'],'uses'=>'SchoolDepartmentleaderController@delSchoolDepartmentleader']);


    //教研组长信息管理
    Route::get('schoolTeacgroupleaderList',['middleware'=>'level:3','uses'=>'SchoolTeacgroupleaderController@schoolTeacgroupleaderList']);
    //添加教研组长页
    Route::get('addSchoolTeacgroupleader',['middleware'=>['level:3','permission:posts.add'],'uses'=>'SchoolTeacgroupleaderController@addSchoolTeacgroupleader']);
    //执行添加教研组长
    Route::post('doAddSchoolTeacgroupleader',['middleware'=>'level:3','uses'=>'SchoolTeacgroupleaderController@doAddSchoolTeacgroupleader']);
    //教研组长编辑页
    Route::get('editSchoolTeacgroupleader/{id}',['middleware'=>['level:3','permission:posts.edit'],'uses'=>'SchoolTeacgroupleaderController@editSchoolTeacgroupleader']);
    //执行教研组长编辑
    Route::post('doEditSchoolTeacgroupleader',['middleware'=>'level:3','uses'=>'SchoolTeacgroupleaderController@doEditSchoolTeacgroupleader']);
    //删除教研组长
    Route::get('delSchoolTeacgroupleader/{id}',['middleware'=>['level:3','permission:posts.del'],'uses'=>'SchoolTeacgroupleaderController@delSchoolTeacgroupleader']);


    //备课组长信息管理
    Route::get('schoolLessonleaderList',['middleware'=>'level:3','uses'=>'SchoolLessonleaderController@schoolLessonleaderList']);
    //添加备课组长页
    Route::get('addSchoolLessonleader',['middleware'=>['level:3','permission:posts.add'],'uses'=>'SchoolLessonleaderController@addSchoolLessonleader']);
    //执行添加备课组长
    Route::post('doAddSchoolLessonleader',['middleware'=>'level:3','uses'=>'SchoolLessonleaderController@doAddSchoolLessonleader']);
    //备课组长编辑页
    Route::get('editSchoolLessonleader/{id}',['middleware'=>['level:3','permission:posts.edit'],'uses'=>'SchoolLessonleaderController@editSchoolLessonleader']);
    //执行备课组长编辑
    Route::post('doEditSchoolLessonleader',['middleware'=>'level:3','uses'=>'SchoolLessonleaderController@doEditSchoolLessonleader']);
    //删除备课组长
    Route::get('delSchoolLessonleader/{id}',['middleware'=>['level:3','permission:posts.del'],'uses'=>'SchoolLessonleaderController@delSchoolLessonleader']);


    //接收ajax传的城市
    Route::get('city','SchoolController@city');
    //接收ajax传的区县
    Route::get('county','SchoolController@county');
    //接收ajax传的学校
    Route::get('ajaxSchoolYear','SchoolTermController@ajaxSchoolYear');
    //接收ajax传的年度
    Route::get('ajaxSchoolTerm','SchoolTermController@ajaxSchoolTerm');
    //根据ajax传过来的学校id查出此学校下的所有年级
    Route::get('ajaxSchoolGrade','SchoolTermController@ajaxSchoolGrade');
    //接收ajax传的年级
    Route::get('ajaxSchoolClass','SchoolTermController@ajaxSchoolClass');
    Route::get('ajaxSchoolSubject','SchoolTermController@ajaxSchoolSubject');

    //接收ajax传的学校查出部门
    Route::get('ajaxDepartmentleader','SchoolDepartmentleaderController@ajaxDepartmentleader');
    //接收ajax传的学校查出教研组
    Route::get('ajaxSchoolTeacgroupleader','SchoolTeacgroupleaderController@ajaxSchoolTeacgroupleader');
    //根据ajax传过来的年级id查出此年级下的所有老师
    Route::get('ajaxTeachers','SchoolTeacherController@ajaxTeachers');
    //根据ajax传过来的Id查出此学校下的所有老师
    Route::get('ajaxallteachers','SchoolHeadteacherController@ajaxallteachers');

    //根据ajax传过来的区县查出此区县下的所有学校
    Route::get('schools','SchoolController@schools');
    //根据ajax传过来的省级查出此省级下的所有学校
    Route::get('organizeschools','SchoolController@organizeschools');
    //根据ajax传过来的市级查出此市级下的所有学校
    Route::get('citychools','SchoolController@citychools');


});

//毕业升级
Route::group(['prefix'=>'admin/graduation','middleware' => 'level:3','namespace'=>'qiyun\admin\graduation'],function(){
    //学生毕业升级
    Route::get('graduationList','GraduationController@graduationList');
    //编辑
    Route::get('editGraduation/{id}','GraduationController@editGraduation');
    //执行编辑
    Route::post('doEditGraduation','GraduationController@doEditGraduation');

    //离校学生
    Route::get('leaveStudentsList','GraduationController@leaveStudentsList');
});

//资源管理
Route::group(['prefix'=>'admin/resource','middleware' => 'level:7','namespace'=>'qiyun\admin\resource'],function(){

    //学段列表
    Route::get('sectionList','resourceController@sectionList');
    //添加学段
    Route::get('sectionAdd','resourceController@sectionAdd');
    Route::post('sectionDoAdd','resourceController@sectionDoAdd');
    //编辑学段
    Route::get('sectionEdit/{id}','resourceController@sectionEdit');
    Route::post('sectionDoEdit','resourceController@sectionDoEdit');
    //删除学段
    Route::get('sectionDel/{id}','resourceController@sectionDel');


    //学科列表
    Route::get('subjectList','resourceController@subjectList');
    //添加学科
    Route::get('subjectAdd','resourceController@subjectAdd');
    Route::post('subjectDoAdd','resourceController@subjectDoAdd');
    //编辑学科
    Route::get('subjectEdit/{id}','resourceController@subjectEdit');
    Route::post('subjectDoEdit','resourceController@subjectDoEdit');
    //删除学课
    Route::get('subjectDel/{id}','resourceController@subjectDel');

    //获取学段接口
    Route::get('getSection','resourceController@getSection');
    //获取要编辑的学科信息接口
    Route::get('getSubjectInfo/{id}','resourceController@getSubjectInfo');


    //版本列表
    Route::get('editionList','resourceController@editionList');
    //添加版本
    Route::get('editionAdd','resourceController@editionAdd');
    Route::post('editionDoAdd','resourceController@editionDoAdd');
    //编辑版本
    Route::get('editionEdit/{id}','resourceController@editionEdit');
    Route::post('editionDoEdit','resourceController@editionDoEdit');
    //删除版本
    Route::get('editionDel/{id}','resourceController@editionDel');

    //获取学科接口
    Route::get('getSubject/{id}','resourceController@getSubject');
    //获取要编辑的版本信息接口
    Route::get('getEditionInfo/{id}','resourceController@getEditionInfo');

    //获取拓展资源类型接口
    Route::get('getExpandSel/{id}','resourceController@getExpandSel');


    //册别列表
    Route::get('gradeList','resourceController@gradeList');
    //添加册别
    Route::get('gradeAdd','resourceController@gradeAdd');
    Route::post('gradeDoAdd','resourceController@gradeDoAdd');
    //编辑册别
    Route::get('gradeEdit/{id}','resourceController@gradeEdit');
    Route::post('gradeDoEdit','resourceController@gradeDoEdit');
    //删除册别
    Route::get('gradeDel/{id}','resourceController@gradeDel');

    //获取版本接口
    Route::get('getEdition/{id}','resourceController@getEdition');
    //获取要编辑的册别信息接口
    Route::get('getGradeInfo/{id}','resourceController@getGradeInfo');


    //教材目录列表
    Route::get('chapterList','resourceController@chapterList');
    //添加教材目录
    Route::get('chapterAdd','resourceController@chapterAdd');
    Route::post('chapterDoAdd','resourceController@chapterDoAdd');
    //编辑教材目录
    Route::get('chapterEdit/{id}','resourceController@chapterEdit');
    Route::post('chapterDoEdit','resourceController@chapterDoEdit');
    //删除教材目录
    Route::get('chapterDel/{id}','resourceController@chapterDel');

    //获取册别接口
    Route::get('getGrade/{id}','resourceController@getGrade');
    //获取教材目录接口
    Route::get('getChapter/{id}','resourceController@getChapter');
    //获取要编辑的教材目录信息接口
    Route::get('getChapterInfo/{id}','resourceController@getChapterInfo');


    //拓展资源类别列表
    Route::get('expandResSelList','resourceController@expandResSelList');
    //添加拓展资源类别
    Route::get('expandResSelAdd','resourceController@expandResSelAdd');
    Route::post('expandResSelDoAdd','resourceController@expandResSelDoAdd');
    //编辑拓展资源类别
    Route::get('expandResSelEdit/{id}','resourceController@expandResSelEdit');
    Route::post('expandResSelDoEdit','resourceController@expandResSelDoEdit');
    //删除拓展资源类别
    Route::get('expandResSelDel/{id}','resourceController@expandResSelDel');

    //查询要修改的拓展资源的类别信息接口
    Route::get('getExpandResSelInfo/{id}','resourceController@getExpandResSelInfo');

    //资源列表
    Route::get('resourceList','resourceController@resourceList');
    //拓展资源列表
    Route::get('expandResourceList','resourceController@expandResourceList');
    //添加资源
    Route::get('resourceAdd','resourceController@resourceAdd');
    //资源删除
    Route::get('resourceDel/{id}','resourceController@resourceDel');
    Route::post('resourceMultiDel','resourceController@resourceMultiDel');

    //审核编辑
    Route::get('resourceStatus/{id}/{status}','resourceController@resourceStatus');

    //举报资源列表
    Route::get('resourceInformantList','resourceController@resourceInformantList');
    //编辑举报
    Route::get('resourceInformantEdit/{id}','resourceController@resourceInformantEdit');
    //执行编辑
    Route::post('doResourceInformantEdit','resourceController@doResourceInformantEdit');
    //删除举报
    Route::get('resourceInformantDel/{id}','resourceController@resourceInformantDel');


    //资源评论列表
    Route::get('resourceComment/{id}','resourceController@resourceComment');
    //资源评论编辑
    Route::get('resourceCommentEdit/{id}/{resId}','resourceController@resourceCommentEdit');
    Route::post('resourceCommentDoEdit','resourceController@resourceCommentDoEdit');
    //删除评论
    Route::get('resourceCommentDel/{id}','resourceController@resourceCommentDel');


    //添加资源
    Route::get("resourceAdd", "resourceController@resourceAdd");

    //获取资源类型接口
    Route::get("/getResourceType", "resourceController@getResourceType");
    //资源上传接口
    Route::post('/doAddResource', 'resourceController@doAddResource');
    Route::post('/doAddResourcePic', 'resourceController@doAddResourcePic');
    //再次选择资源 ，删除上次选择资源 接口
    Route::post('/delLastUpload', 'resourceController@delLastUpload');
    //资源信息提交接口
    Route::post('/doAddResourceInfo', 'resourceController@doAddResourceInfo');


});

//excel导入导出
Route::group(['prefix'=>'admin/excel','middleware' => 'level:2','namespace'=>'qiyun\admin\excel'],function(){
    //导入学校信息
    Route::post('schoolImport',['middleware'=>'level:4','uses'=>'ExcelController@schoolImport']);
    //导出学校信息
    Route::post('schoolExport',[ 'middleware' => 'level:4','uses'=>'ExcelController@schoolExport']);
    //下载学校导入模板样式
    Route::get('schoolTemplate',['middleware'=>'level:4','uses'=>'ExcelController@schoolTemplate']);

    //导入学校年度信息
    Route::post('schoolYearImport',['middleware'=>'level:3','uses'=>'ExcelController@schoolYearImport']);
    //下载学校年度导入模板
    Route::get('schoolYearTemplate',['middleware'=>'level:3','uses'=>'ExcelController@schoolYearTemplate']);

    //导入学期
    Route::post('schoolTermImport',['middleware'=>'level:3','uses'=>'ExcelController@schoolTermImport']);
    //下载导入期模板
    Route::get('schoolTermTemplate',['middleware'=>'level:3','uses'=>'ExcelController@schoolTermTemplate']);

    //导入年级
    Route::post('schoolGradeImport',['middleware'=>'level:3','uses'=>'ExcelController@schoolGradeImport']);
    //下载年级导入模板
    Route::get('schoolGradeTemplate',['middleware'=>'level:3','uses'=>'ExcelController@schoolGradeTemplate']);

    //导入班级信息
    Route::post('schoolClassImport',['middleware'=>'level:2','uses'=>'ExcelController@schoolClassImport']);
    //下载班级导入模板
    Route::get('schoolClassTemplate',['middleware'=>'level:2','uses'=>'ExcelController@schoolClassTemplate']);


    //导入任课老师
    Route::post('schoolTeachers',['middleware'=>'level:3','uses'=>'ExcelController@schoolTeachers']);
    //导出任课老师
    Route::post('schoolTeachersExport',['middleware'=>'level:3','uses'=>'ExcelController@schoolTeachersExport']);
    //下载任课老师导入模板
    Route::get('schoolTeachersTemplate',['middleware'=>'level:3','uses'=>'ExcelController@schoolTeachersTemplate']);

    //导入班主任
    Route::post('schoolHeadteacherImport',['middleware'=>'level:2','uses'=>'ExcelController@schoolHeadteacherImport']);
    //导出班主任
    Route::post('schoolHeadteacherExport',['middleware'=>'level:2','uses'=>'ExcelController@schoolHeadteacherExport']);
    //下载班主任导入模板
    Route::get('schoolHeadteacherTemplate',['middleware'=>'level:2','uses'=>'ExcelController@schoolHeadteacherTemplate']);

    //导入年级组长
    Route::post('schoolGradeleaderImport',['middleware'=>'level:3','uses'=>'ExcelController@schoolGradeleaderImport']);
    //导出年级组长
    Route::post('schoolGradeleaderExport',['middleware'=>'level:3','uses'=>'ExcelController@schoolGradeleaderExport']);
    //下载年级组长导入模板
    Route::get('schoolGradeleaderTemplate',['middleware'=>'level:3','uses'=>'ExcelController@schoolGradeleaderTemplate']);

    //导入部门负责人
    Route::post('schoolDepartmentleaderImport',['middleware'=>'level:3','uses'=>'ExcelController@schoolDepartmentleaderImport']);
    //导出部门负责人
    Route::post('schoolDepartmentleaderExport',['middleware'=>'level:3','uses'=>'ExcelController@schoolDepartmentleaderExport']);
    //下载部门负责人导入模板
    Route::get('schoolDepartmentleaderTemplate',['middleware'=>'level:3','uses'=>'ExcelController@schoolDepartmentleaderTemplate']);

    //导入教研组长
    Route::post('schoolTeacgroupleaderImport',['middleware'=>'level:3','uses'=>'ExcelController@schoolTeacgroupleaderImport']);
    //导出教研组长
    Route::post('schoolTeacgroupleaderExport',['middleware'=>'level:3','uses'=>'ExcelController@schoolTeacgroupleaderExport']);
    //下载教研组长导入模板
    Route::get('schoolTeacgroupleaderTemplate',['middleware'=>'level:3','uses'=>'ExcelController@schoolTeacgroupleaderTemplate']);

    //导入备课组长
    Route::post('schoolLessonleaderImport',['middleware'=>'level:3','uses'=>'ExcelController@schoolLessonleaderImport']);
    //导出备课组长
    Route::post('schoolLessonleaderExport',['middleware'=>'level:3','uses'=>'ExcelController@schoolLessonleaderExport']);
    //下载备课组长导入模板
    Route::get('schoolLessonleaderTemplate',['middleware'=>'level:3','uses'=>'ExcelController@schoolLessonleaderTemplate']);


    //导入用户信息
    Route::post('userInfoImport','ExcelController@userInfoImport');
    //导出用户信息
    Route::post('userInfoExport','ExcelController@userInfoExport');
    //下载用户导入模板
    Route::get('userInfoTemplate','ExcelController@userInfoTemplate');








    // 导入城市信息
    Route::post('cityImport','ExcelController@cityImport');
    // 导出城市信息
    Route::get('cityExport','ExcelController@cityExport');
    //下载城市导入模板样式
    Route::get('cityTemplate',['middleware'=>'level:6','uses'=>'ExcelController@cityTemplate']);


    // 导入县区信息
    Route::post('countyImport','ExcelController@countyImport');
    // 导出县区信息
    Route::get('countyExport','ExcelController@countyExport');
     //下载县区导入模板样式
    Route::get('countyTemplate',['middleware'=>'level:5','uses'=>'ExcelController@countyTemplate']);


    // 导入部门信息
    Route::post('departmentImport','ExcelController@departmentImport');
    // 导出部门信息
    Route::get('departmentExport','ExcelController@departmentExport');
     //下载部门导入模板样式
    Route::get('departmentTemplate',['middleware'=>'level:3','uses'=>'ExcelController@departmentTemplate']);


    // 导入教室信息
    Route::post('classImport','ExcelController@classImport');
    // 导出教室信息
    Route::get('classExport','ExcelController@classExport');
     //下载部门导入模板样式
    Route::get('classTemplate',['middleware'=>'level:3','uses'=>'ExcelController@classTemplate']);


    // 导入学科信息
    Route::post('subjectImport','ExcelController@subjectImport');
    // 导出学科信息
    Route::get('subjectExport','ExcelController@subjectExport');
      //下载学科导入模板样式
    Route::get('subjectTemplate',['middleware'=>'level:3','uses'=>'ExcelController@subjectTemplate']);


    // 导入教研组信息
    Route::post('teachImport','ExcelController@teachImport');
    // 导出教研组信息
    Route::get('teachExport','ExcelController@teachExport');
    //下载教研组导入模板样式
    Route::get('teachTemplate',['middleware'=>'level:3','uses'=>'ExcelController@teachTemplate']);



    // 导入部门分组信息
    Route::post('teachdepImport','ExcelController@teachdepImport');
    // 导出部门分组信息
    Route::get('teachdepExport','ExcelController@teachdepExport');
    // 下载部门分组导入模板样式
    Route::get('teachdepTemplate',['middleware'=>'level:3','uses'=>'ExcelController@teachdepTemplate']);



    // 导入年级分组信息
    Route::post('teachgradeImport','ExcelController@teachgradeImport');
    // 导出年级分组信息
    Route::get('teachgradeExport','ExcelController@teachgradeExport');
    // 下载年级分组导入模板样式
    Route::get('teachgradeTemplate',['middleware'=>'level:3','uses'=>'ExcelController@teachgradeTemplate']);



    // 导入学科分组信息
    Route::post('teachsubjectImport','ExcelController@teachsubjectImport');
    // 导出学科分组信息
    Route::get('teachsubjectExport','ExcelController@teachsubjectExport');
    // 下载学科分组导入模板样式
    Route::get('teachsubjectTemplate',['middleware'=>'level:2','uses'=>'ExcelController@teachsubjectTemplate']);



});









/*
||--------------------------------------------------------------------------------------
||     -------------------------- app接口 ----------------------------
||--------------------------------------------------------------------------------------
 */

Route::group([ 'prefix' => '/api', 'namespace' => 'api' ], function ()
{

    /*
    |--------------------------------------------------------------------------
    |   启云APP
    |--------------------------------------------------------------------------
    */
    Route::group([ 'prefix' => '/qiyun', 'namespace' => 'QiYunAPP' ], function ()
    {
        //  用户登录
        Route::post('/userLogin', [ 'uses' => 'QiYunAppController@userLogin' ]);
         // 用户上传微课图片数据
        Route::post('/userAddweike', [ 'uses' => 'QiYunAppController@userAddweike' ]);
        //  用户上传微课视频数据
        Route::post('/userAddVideo', [ 'uses' => 'QiYunAppController@userAddVideo' ]);
        //  修改用户密码
        Route::post('/modifyPassword', [ 'uses' => 'QiYunAppController@modifyPassword' ]);
        //  获取用户消息列表
        Route::get('/getMessageList/{uid}/{page}', [ 'uses' => 'QiYunAppController@getMessageList' ]);
        //  微课关键字搜索
        Route::post('/lessonSearch', [ 'uses' => 'QiYunAppController@lessonSearch' ]);
        //  获取指定微课详细
        Route::get('/getLessonDetail/{lessonId}', [ 'uses' => 'QiYunAppController@getLessonDetail' ]);
        //  获取指定微课评论
        Route::get('/getLessonComment/{lessonId}/{page}', [ 'uses' => 'QiYunAppController@getLessonComment' ]);
        //  获取个人收藏微课
        Route::get('/getPerFav/{uid}/{page}', [ 'uses' => 'QiYunAppController@getPerFav' ]);
        //  获取发布联动标签
        Route::get('/getTag', [ 'uses' => 'QiYunAppController@getTag' ]);
        //  获取验证码
        Route::get('/getMessage/{telephone}/{key_1}/{key_2}', [ 'uses' => 'QiYunAppController@getMessage' ]);
        //  查询手机号唯一
        Route::post('/findUnique', [ 'uses' => 'QiYunAppController@findUnique' ]);
        //  上传图片
        Route::post('/uploadImage', [ 'uses' => 'QiYunAppController@uploadImage' ]);
        //  意见反馈
        Route::post('/feedBack', [ 'uses' => 'QiYunAppController@feedBack' ]);
        //  找回密码
        Route::post('/findPassword', [ 'uses' => 'QiYunAppController@findPassword' ]);
        //  获取课件数据
        Route::get('/getAudioAndImage/{lessonId}', [ 'uses' => 'QiYunAppController@getAudioAndImage' ]);
        //  收藏接口
        Route::post('/myFavOrLike', [ 'uses' => 'QiYunAppController@myFavOrLike' ]);
        //  微课点赞接口
        Route::get('/clickLike/{lessonId}/{type}/{table}', [ 'uses' => 'QiYunAppController@clickLike' ]);
        //  资源点赞接口
        Route::get('/resourceClickLike/{resourceId}/{type}/{table}', [ 'uses' => 'QiYunAppController@resourceClickLike' ]);
        //  修改个人信息
        Route::post('/editUserInfo', [ 'uses' => 'QiYunAppController@editUserInfo' ]);
        //  获取我的资源
        Route::post('/getMyResource', [ 'uses' => 'QiYunAppController@getMyResource' ]);
        //  获取我的微课
        Route::post('/getMyLesson', [ 'uses' => 'QiYunAppController@getMyLesson' ]);
        //  微课评论
        Route::post('/addComment', [ 'uses' => 'QiYunAppController@addComment' ]);
        //  获取用户信息
        Route::get('/getUserInfo/{userID}', [ 'uses' => 'QiYunAppController@getUserInfo' ]);
        //  获取总数
        Route::get('/getCount/{userID}/{type}', [ 'uses' => 'QiYunAppController@getCount' ]);
        //  获取资源详情
        Route::get('/getResourceDetail/{resourceID}', [ 'uses' => 'QiYunAppController@getResourceDetail' ]);
        //  获取资源评论
        Route::get('/getResourceComment/{lessonId}/{page}', [ 'uses' => 'QiYunAppController@getResourceComment' ]);
        //  添加资源评论
        Route::post('/addResourceComment', [ 'uses' => 'QiYunAppController@addResourceComment' ]);
        //  获取版本信息
        Route::post('/getAppVersion', [ 'uses' => 'QiYunAppController@getAppVersion' ]);

    });

});