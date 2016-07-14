/**
 * Created by Mr.H on 2016/2/1.
 */
primeApp.controller('subjectListCtrl',function($scope,myHttp){
    $scope.subjectList = false;
    $scope.subjectListmsg = true;
    $scope.subjectListblock = true;

    var getGroupListPage = function () {
        var postData = {
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }
        myHttp.postData('/research/getSubjectList',postData).success(function(response){
            $scope.subjectList = response.subjectList;
            $scope.subjectListblock = false;
            $scope.paginationConf.totalItems = response.total;
        }).error(function(error){
            $scope.subjectList = true;
            $scope.subjectListmsg = false;
        });
    }
    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 6
    };
    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getGroupListPage);

    $scope.reload = function(type){
        switch(type) {
            case "subjectList" :
                // 教研组信息
                $scope.subjectList = false;
                $scope.subjectListmsg = true;
                $scope.subjectListblock = true;
                myHttp.postData('/research/getSubjectList',postData).success(function(response){
                    $scope.subjectList = response.subjectList;
                    $scope.subjectListblock = false;
                    $scope.paginationConf.totalItems = response.total;
                }).error(function(error){
                    $scope.subjectList = true;
                    $scope.subjectListmsg = false;
                });
        }
    }
    $scope.addSubject = function(){
        myHttp.getData('/research/isTeacher').success(function (response) {
            if(response.status == '1'){
                location.href = '/research/addSubject';
            }else if(response.status == '2'){
                alert('您不是教师，不能发起主题研讨！');
            }else if(response.status == '3'){
                alert('请先登录！');location.href = '/';
            }
        })
    }
})