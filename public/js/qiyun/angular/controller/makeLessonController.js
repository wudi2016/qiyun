/**
 * Created by Mr.H on 2016/1/30.
 */
primeApp.controller('makeLessonCtrl',function($scope,myHttp){

    //获取学段
    myHttp.getData('/research/getStudySection').success(function (response) {
        $scope.studysection = response;
    });
    //层级选项
    $scope.select = function(type,id){
        if(type == 1){
            //获取学科
            myHttp.getData('/research/getStudySubject/'+id).success(function (response) {
                $scope.studysubject = response;
                //清空 下级 选择框
                $scope.studyedition = '';
                $scope.studygrade = '';
                $scope.studychapter = '';
            });
        }else if(type == 2){
            //获取版本
            myHttp.getData('/research/getStudyEdition/'+id).success(function (response) {
                $scope.studyedition = response;
                //清空 下级 选择框
                $scope.studygrade = '';
                $scope.studychapter = '';
            });
        }else if(type == 3){
            //获取册别
            myHttp.getData('/research/getStudyGrade/'+id).success(function (response) {
                $scope.studygrade = response;
                //清空 下级 选择框
                $scope.studychapter = '';
            });
        }else if(type == 4){
            //获取教材目录
            myHttp.getData('/research/getStudyChapter/'+id).success(function (response) {
                $scope.studychapter = response;
            });
        }
    }

    // 分类查询
    // 获取区域
    myHttp.getData('/research/conditionCounty').success(function (response) {
        $scope.conditionCounty = response;
        $scope.conditionSchool = '';
        $scope.conditionSubject = '';
    });
    $scope.author = function(type,id){
        if(type == 1){
            // 获取学校
            myHttp.getData('/research/conditionSchool/' + id).success(function (response) {
                $scope.conditionSchool = response;
                $scope.conditionSubject = '';
            });
        }else if(type == 2){
            // 获取学科
            myHttp.getData('/research/conditionSubject/' + id).success(function (response) {
                $scope.conditionSubject = response;
            });
        }
    }

    $scope.likeQuery = function(countyId,schoolId,subjectId){

        if(countyId != null && schoolId == null && subjectId == null ){
            $scope.info = {
                countyId:countyId,
                type:'1'
            }
            $scope.evaluatAuthor.countyScope = countyId;
            $scope.evaluatAuthor.countySchool = schoolId;
            $scope.evaluatAuthor.countySubject = subjectId;
            myHttp.postData('/research/conditionSelect',$scope.info).success(function (response) {
                if(response.status){
                    $scope.teacherList = response.msg;
                    $scope.teacherMsg = '';
                }else{
                    $scope.teacherList = '';
                    $scope.teacherMsg = '没有符合条件的数据！';
                }
            });
        }else if(schoolId != null && countyId != null && subjectId == null){
            $scope.info = {
                countyId:countyId,
                schoolId:schoolId,
                type:'2'
            }
            $scope.evaluatAuthor.countyScope = countyId;
            $scope.evaluatAuthor.countySchool = schoolId;
            $scope.evaluatAuthor.countySubject = subjectId;
            myHttp.postData('/research/conditionSelect',$scope.info).success(function (response) {
                if(response.status){
                    $scope.teacherList = response.msg;
                    $scope.teacherMsg = '';
                }else{
                    $scope.teacherList = '';
                    $scope.teacherMsg = '没有符合条件的数据！';
                }
            });
        }else if(schoolId != null && countyId != null && subjectId != null){
            $scope.info = {
                countyId:countyId,
                schoolId:schoolId,
                subjectId:subjectId,
                type:'3'
            }
            $scope.evaluatAuthor.countyScope = countyId;
            $scope.evaluatAuthor.countySchool = schoolId;
            $scope.evaluatAuthor.countySubject = subjectId;
            myHttp.postData('/research/conditionSelect',$scope.info).success(function (response) {
                if(response.status){
                    $scope.teacherList = response.msg;
                    $scope.teacherMsg = '';
                }else{
                    $scope.teacherList = '';
                    $scope.teacherMsg = '没有符合条件的数据！';
                }
            });
        }
    }

    // 精确查找
    $scope.exactQuery = function(){
        myHttp.postData('/research/selectMainMan',$scope.teacherName).success(function (response) {
            if(response.status){
                $scope.teacherList = response.msg;
                $scope.teacherMsg = '';
            }else{
                $scope.teacherList = '';
                $scope.teacherMsg = '没有符合条件的数据！';
            }
        });
    }
    // 协作组查询
    $scope.queryGroup = function(){
        myHttp.postData('/research/selectGroup',$scope.groupInfo).success(function (response) {
            if(response.status){
                $scope.groupList = response.info;
                $scope.groupMsg = '';
            }else{
                $scope.groupList = '';
                $scope.groupMsg = '没有符合条件的数据！';
            }
        });
    }

    // choose group
    $scope.chooseGroup = function(id,name){
        $scope.postdata.techResearch = id;
        $('#chooseGroup').next().css('backgroundColor','#41a6ee');
        $('.chooseGroup').css('display', 'none');
        $(".shadow").css('display', 'none');
        $('#chooseGroup').next().html(name);
    }

    // choose teacher
    $scope.chooseTeacher = function(id,realname){
        $scope.postdata.lessonSubjecAuthor = id;
        $("div[name='selectMainMan']").css('display', 'none');
        $(".shadow").css('display', 'none');
        $('#choose').next().html(realname);
    }
    //取消  选择自备人 按钮
    $("span[name='resetReturn']").click(function () {
        $("div[name='selectMainMan']").css('display', 'none');
        $(".shadow").css('display', 'none');
        $('#choose').next().css('backgroundColor','#ccc');
        $scope.postdata.lessonSubjecAuthor = '';
    })
    $("span[name='resetGroup']").click(function () {
        $('.chooseGroup').css('display', 'none');
        $(".shadow").css('display', 'none');
        $('#chooseGroup').next().html('添加协作组');
        $('#chooseGroup').next().css('backgroundColor','#ccc');
        $scope.postdata.techResearch = '';
    })

    // 判断备课是否唯一
    $scope.isOnly = function(){
        $scope.info = {
            'table' : 'lessonsubject',
            'fieldName' : 'lessonSubjectName',
            'value' : $scope.postdata.lessonSubjectName
        };
        myHttp.postData('/research/isOnlyThis',$scope.info).success(function (response) {
            if(response.status == '1'){
                $scope.errorMsg = {
                    'onlyMsg':'该名称已存在,请重新输入'
                };
                $scope.postdata.lessonSubjectName = '';
            }else if(response.status == '2'){
                $scope.errorMsg = {
                    'onlyMsg':''
                };
            }
        }).error(function (error) {

        });
    }
    // 添加评课
    $scope.insert = function(lessonSubjectName,lessonSubjecAuthor,lessonSubjectTarget,lessonGrade,techResearch){
        if(lessonSubjectName == null || lessonSubjectName == ''){
            alert('请输入备课名称！');
            return;
        }
        $scope.postdata.pic = evaluatPic;
        if(evaluatPic == null || evaluatPic == ''){
            alert('请上传封面！');
            return;
        }
        $scope.postdata.beginTime = $("input[name='begin']").val();
        if($scope.postdata.beginTime.match(/^\s*$/) !== null){
            alert('请选择备课开始时间！');
            return;
        }
        $scope.postdata.endTime = $("input[name='end']").val();
        if($scope.postdata.endTime.match(/^\s*$/) !== null){
            alert('请选择备课结束时间！');
            return;
        }
        if(lessonSubjecAuthor == '' || lessonSubjecAuthor == null){
            alert('请选择主备人！');
            return;
        }
        if(lessonGrade == null){
            alert('请选择详细分类！');
            return;
        }
        if(techResearch == null || techResearch == ''){
            alert('请选择协作组！');
            return;
        }
        if(lessonSubjectTarget == null){
            alert('请填写目标名称！');
            return;
        }

        myHttp.postData('/research/insertLessonSubject',$scope.postdata).success(function (response) {
            if(response.status == '1'){
                location.href = '/research/lessonDetail/' + response.msg;
            }else if(response.status == '2'){
                alert(response.msg);
                location.href = '/research/insertEvaluation';
            }else if(response.status == '3'){
                alert(response.msg);
                location.href = '/';
            }
        }).error(function (error) {

        });
    }
})