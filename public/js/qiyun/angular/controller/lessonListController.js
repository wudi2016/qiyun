/**
 * Created by DIY on 2016/1/23.
 */
primeApp.controller('lessonListCtrl',function($scope,myHttp){

    // 教研组信息
    $scope.lessonList = false;
    $scope.lessonListmsg = true;
    $scope.lessonListblock = true;
    $scope.lessonCount = false;
    $scope.lessonCountmsg = true;
    $scope.lessonCountblock = true;
    var getGroupListPage = function () {
        var postData = {
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }
        myHttp.postData('/research/getLessonList',postData).success(function (response) {
            $scope.lessonList = response.lessonList;
            $scope.lessonListblock = false;
            $scope.lessonCount = response.lessonCount;
            $scope.lessonCountblock = false;

            $scope.paginationConf.totalItems = response.total;
        }).error(function (error){
            $scope.lessonList = true;
            $scope.lessonListmsg = false;
            $scope.lessonCount = true;
            $scope.lessonCountmsg = false;
        });
    }
    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 6
    };
    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getGroupListPage);

    $scope.reload = function(type){
        switch(type) {
            case "lessonList" :
                // 教研组信息
                var postData = {
                    pageIndex: $scope.paginationConf.currentPage,
                    pageSize: $scope.paginationConf.itemsPerPage
                };
                $scope.lessonList = false;
                $scope.lessonListmsg = true;
                $scope.lessonListblock = true;
                myHttp.postData('/research/getLessonList',postData).success(function (response) {
                    $scope.lessonList = response.lessonList;
                    $scope.lessonListblock = false;
                    $scope.paginationConf.totalItems = response.total;
                }).error(function (error){
                    $scope.lessonList = true;
                    $scope.lessonListmsg = false;
                });
                break;
            case "count" :
                var postData = {
                    pageIndex: $scope.paginationConf.currentPage,
                    pageSize: $scope.paginationConf.itemsPerPage
                };
                $scope.lessonCount = false;
                $scope.lessonCountmsg = true;
                $scope.lessonCountblock = true
                myHttp.postData('/research/getLessonList',postData).success(function (response) {
                    $scope.lessonCount = response.lessonCount;
                    $scope.lessonCountblock = false;
                    $scope.paginationConf.totalItems = response.total;
                }).error(function (error){
                    $scope.lessonCount = true;
                    $scope.lessonCountmsg = false;
                });
                break;
        }
    }

    // 显示弹窗
    $scope.applyInsert = function(id){
        myHttp.postData('/research/isManager/' + id,'2').success(function (response) {
            if(response.status == '1'){
                alert('请不要重复申请，耐心等待管理员审核');
            }else if(response.status == '2'){
                alert('您是主备人，无需申请加入！');
            }else if(response.status == '3'){
                alert('请先登录，在申请加入！');location.href = '/';
            }else if(response.status == '4'){
                $(function(){
                    $("#shadow").css('display', 'block');
                    var boxcontent = $("#apply_content");
                    boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
                    boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
                    boxcontent.css('display','block');
                    $("input[name='resourceId']").val(id);
                    $(".apply_bot").children('span:last-child').click(function (){
                        $("#shadow").css('display', 'none');
                        $("#apply_content").css('display', 'none');
                        return;
                    })
                })
            }else if(response.status == '5'){
                alert('您是该备课成员，无需申请加入！');
            }else if(response.status == '6'){
                alert('您是创建者，无需申请加入！');
            }
        }).error(function (error){

        });
    }
    $scope.postdata = {};
    // 申请加入
    $scope.sureApply = function(){
        if($("textarea[name='messageTitle']").val().match(/^\s*$/) != null){
            alert('申请理由必须填写！');
            return;
        }
        $scope.postdata.resourceId = $("input[name='resourceId']").val();
        $scope.postdata.resourceType = '2';
        $scope.postdata.type = '1';
        myHttp.postData('/research/applyLesson',$scope.postdata).success(function(response){
            $("textarea[name='messageTitle']").val('');
            if(response.status == '1'){
                alert('申请已发出，请等待管理员审核！')
            }else if(response.status == '2'){
                alert('申请失败，请重新申请！');
            }
        }).error(function(error){

        });
        $("#shadow").css('display', 'none');
        $("#apply_content").css('display', 'none');
    }
    $scope.makeLesson = function(){
        myHttp.getData('/research/isTeacher').success(function (response) {
            if(response.status == '1'){
                location.href = '/research/makeLesson';
            }else if(response.status == '2'){
                alert('您不是教师，不能创建备课！');
            }else if(response.status == '3'){
                alert('请先登录！');location.href = '/';
            }
        })
    }

})
