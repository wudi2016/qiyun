/**
 * Created by DIY on 2016/1/24.
 */
primeApp.controller('techGroupInfoCtrl',function($scope,$location,myHttp){
    // 获取地址中的参数
    $scope.url = $location.absUrl();
    $scope.urlarr = $scope.url.split('/');
    $scope.id = $scope.urlarr[$scope.urlarr.length - 1];

    $scope.memberList = false;
    $scope.memberListmsg = true;
    $scope.memberListMsg = true;
    $scope.memberListblock = true;
    //console.log($scope.url);
    if($scope.id){
        myHttp.getData('/research/getTechGroupInfo/' + $scope.id).success(function (response) {
            $scope.techGpInfo = response.techGpInfo;
            $scope.memberList = response.memberList;
            if(response.memberList == ''){
                $scope.memberList = true;
                $scope.memberListMsg = false;
            }else{
                $scope.memberListMsg = true;
            }
            $scope.memberListblock = false;
        }).error(function (error) {
            $scope.memberList = true;
            $scope.memberListmsg = false;
        });

        myHttp.getData('/research/intraActivity/' + $scope.id).success(function (response){
            if(response.status){
                $scope.subjectActivity = response.subjectActivity;
            }else{
                $scope.errorMsg = '暂无备课活动';
                //console.log($scope.errorMsg);
            }
        })
    }
    $scope.reload = function(type){
        if(type == 'memberList'){
            $scope.memberList = false;
            $scope.memberListmsg = true;
            $scope.memberListblock = true;
            myHttp.getData('/research/getTechGroupInfo/' + $scope.id).success(function (response) {
                $scope.memberList = response.memberList;
                if(response.memberList == ''){
                    $scope.memberList = true;
                    $scope.memberListMsg = false;
                }else{
                    $scope.memberListMsg = true;
                }
                $scope.memberListblock = false;
            }).error(function (error) {
                $scope.memberList = true;
                $scope.memberListmsg = false;
            });
        }
    }
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
        $scope.evaluatAuthor.countyScope = countyId;
        $scope.evaluatAuthor.countySchool = schoolId;
        $scope.evaluatAuthor.countySubject = subjectId;
        if(countyId != null && schoolId == null && subjectId == null ){
            $scope.info = {
                countyId:countyId,
                type:'1'
            }
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
                schoolId:schoolId,
                type:'2'
            }
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
                subjectId:subjectId,
                type:'3'
            }
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
    $(function (){
        $("span[name='inviteManReturn']").click(function () {
            $scope.teacherName = {
                'username' : ''
            };
            $scope.teacherList = '';
            $("div[name='inviteMan']").css('display', 'none');
            $(".shadow").css('display', 'none');
            $('#invite').next().css('display', 'none');
        })
    })

    // 精确查找
    $scope.exactQuery = function(name){
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

    $scope.inviteMember = function(){
        var info = {
            'id' : $scope.id
        };
        myHttp.postData('/research/isGroupAuthor',info).success(function (response) {
            if(response.status == '1'){
                $('.shadow').css('display', 'block');
                var boxcontent = $(".inviteMan[name='inviteMan']");
                boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
                boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
                //选择评课自备人弹窗
                boxcontent.slideDown('fast');
            }else if(response.status == '2'){
                alert('只允许创建者邀请成员！');
            }else if(response.status == '3'){
                alert('请先登录！');location.href = '/';
            }
        });

    }

    $scope.chooseMember = function(){
        var member = $("input[name='inviteUser']:checked");
        var length = member.length;
        var str = "";
        for ( var i = 0; i < length; i++){
            if(member[i].checked == true){
                str += member[i].value + ",";
            }
        }
        if(str == ""){
            alert("请至少选择一个成员！");
        }
        else{
            $(".inviteMan[name='inviteMan']").css('display','none');
            $('.shadow').css('display', 'none');
            $('#invite').next().css('display', 'block');
            var info = {
                'id' : $scope.id,
                'member' : str
            };
            myHttp.postData('/research/insertTeachGruop',info).success(function (response) {
                if(response.status == '1'){
                    alert('邀请已发出，等待对方同意');
                    $("input[name='inviteUser']").removeAttr('checked');
                    $scope.teacherName.username = '';
                }else if(response.status  == '2'){
                    alert('请先登录！');location.href = '/';
                }else if(response.status == '3'){
                    alert('您邀请的人已经收到通知，请不要反复邀请！');
                    $("input[name='inviteUser']").removeAttr('checked');
                    $scope.teacherName.username = '';
                }
            });
        }
    }

    $scope.chooseUser = function(id){
        myHttp.postData('/research/isRealMember/' + id,$scope.id).success(function (response) {
            if(response.status == '1'){
                alert('此人已经是该教研组成员！');
                $("#inviteUser" + id).removeAttr("checked");
            }else if(response.status  == '2'){
                alert('您已经发送邀请，请等待对方同意！');
                $("#inviteUser" + id).removeAttr("checked");
            }else if(response.status == '4'){
                alert('您就是创建者，无需邀请！');
                $("#inviteUser" + id).removeAttr("checked");
            }else if(response.status == '3'){

            }
        });
    }
});