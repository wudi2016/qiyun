/**
 * Created by DIY on 2016/1/23.
 */
primeApp.controller('groupListCtrl',function($scope,myHttp){
    //// 教研组信息
    $scope.groupList = false;
    $scope.groupListmsg = true;
    $scope.groupListblock = true;
    $scope.count = false;
    $scope.countmsg = true;
    $scope.countblock = true;
    var getGroupListPage = function () {

        var postData = {
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }

        myHttp.postData('/research/getGroupList',postData).success(function (response) {
            $scope.groupList = response.groupList;
            $scope.groupListblock = false;
            $scope.count = response.count;
            $scope.countblock = false;

            $scope.paginationConf.totalItems = response.total;
        }).error(function (error){
            $scope.groupList = true;
            $scope.groupListmsg = false;
            $scope.count = true;
            $scope.countmsg = false;
        });

    }

    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 6
    };
    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getGroupListPage);
    $scope.reload = function(type) {
        switch (type) {
            case "groupList" :
                // 教研组信息
                $scope.groupList = false;
                $scope.groupListmsg = true;
                $scope.groupListblock = true;
                var postData = {
                    pageIndex: $scope.paginationConf.currentPage,
                    pageSize: $scope.paginationConf.itemsPerPage
                };

                myHttp.postData('/research/getGroupList', postData).success(function (response) {
                    $scope.groupList = response.groupList;
                    $scope.groupListblock = false;
                    $scope.paginationConf.totalItems = response.total;
                }).error(function (error) {
                    $scope.groupList = true;
                    $scope.groupListmsg = false;
                });
            case "count" :
                $scope.count = false;
                $scope.countmsg = true;
                $scope.countblock = true;
                var postData = {
                    pageIndex: $scope.paginationConf.currentPage,
                    pageSize: $scope.paginationConf.itemsPerPage
                };
                myHttp.postData('/research/getGroupList', postData).success(function (response) {
                    $scope.count = response.count;
                    $scope.countblock = false;
                    $scope.paginationConf.totalItems = response.total;
                }).error(function (error) {
                    $scope.count = true;
                    $scope.countmsg = false;
                });
                break;
        }
    };

    // 显示弹窗
    $scope.applyInsert = function(id){
        myHttp.postData('/research/isManager/' + id,'1').success(function (response) {
            if(response.status == '3'){
                alert('请先登录，在申请加入！');location.href = '/';
            }else if(response.status == '2'){
                alert('您是创建者，无需申请加入！');////
            }else if(response.status == '5'){
                alert('您是该教研组成员，无需申请加入！');
            }else if(response.status == '1'){
                alert('请不要重复申请，耐心等待管理员审核');
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
        $scope.postdata.resourceType = '1';
        $scope.postdata.type = '1';
        myHttp.postData('/research/applyGroup',$scope.postdata).success(function(response){
            $("textarea[name='messageTitle']").val('');
            if(response.status == '1'){
                alert('申请已发出，请等待管理员审核！')
            }else if(response.status == '2'){
                alert('申请失败，请重新申请！');
            }else if(response.status == '3'){
                alert('您已加入该协作组！');
                var postData = {
                    pageIndex: $scope.paginationConf.currentPage,
                    pageSize: $scope.paginationConf.itemsPerPage
                }

                myHttp.postData('/research/getGroupList',postData).success(function (response) {
                    $scope.groupList = response.groupList;
                    $scope.groupListblock = false;
                    $scope.count = response.count;
                    $scope.countblock = false;

                    $scope.paginationConf.totalItems = response.total;
                }).error(function (error){
                    $scope.groupList = true;
                    $scope.groupListmsg = false;
                    $scope.count = true;
                    $scope.countmsg = false;
                });
            }
        }).error(function(error){

        });
        $("#shadow").css('display', 'none');
        $("#apply_content").css('display', 'none');
    }

    $scope.directApply = function(id){
        myHttp.postData('/research/isManager/' + id,'1').success(function (response) {
            if(response.status == '3'){
                alert('请先登录，再加入！');location.href = '/';
            }else if(response.status == '2'){
                location.href = '/research/techGroupInfo/' + id;
            }else if(response.status == '5'){
                alert('您是该教研组成员，无需加入！');
            }else if(response.status == '4'){
                $scope.postdata.resourceId = id;
                $scope.postdata.resourceType = '1';
                $scope.postdata.type = '1';
                myHttp.postData('/research/applyGroup',$scope.postdata).success(function(response){
                    $("textarea[name='messageTitle']").val('');
                    if(response.status == '3'){
                        location.href = '/research/techGroupInfo/' + id;
                    }
                }).error(function(error){

                });
            }
        }).error(function (error){

        });

    }

    $scope.makeGroup = function(){
        myHttp.getData('/research/isTeacher').success(function (response) {
            if(response.status == '1'){
                location.href = '/research/makeGroup';
            }else if(response.status == '2'){
                alert('您不是教师，不能创建教研组！');
            }else if(response.status == '3'){
                alert('请先登录！');location.href = '/';
            }
        })
    }
})
