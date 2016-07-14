/**
 * Created by Mr.H on 2016/1/25.
 */
primeApp.controller('evaluationListCtrl',function($scope,myHttp){

    // 评课列表页信息
    $scope.evaluation = false;
    $scope.evaluationmsg = true;
    $scope.evaluationblock = true;
    var getGroupListPage = function () {
        var postData = {
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }
        myHttp.postData('/research/getEvaluationList',postData).success(function (response) {
            $scope.evaluation = response.evaluation;
            $scope.sClass = "{back_color:true}";
            $scope.evaluationblock = false;
            $scope.paginationConf.totalItems = response.total;
        }).error(function (error) {
            $scope.evaluation = true;
            $scope.evaluationmsg = false;
        });
    }
    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 9
    };
    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getGroupListPage);
    $scope.reload = function(type){
        if(type == 'evaluation'){
            $scope.evaluation = false;
            $scope.evaluationmsg = true;
            $scope.evaluationblock = true;

            myHttp.postData('/research/getEvaluationList',postData).success(function (response) {
                $scope.evaluation = response.evaluation;
                $scope.sClass = "{back_color:true}";
                $scope.evaluationblock = false;
                $scope.paginationConf.totalItems = response.total;
            }).error(function (error) {
                $scope.evaluation = true;
                $scope.evaluationmsg = false;
            });
        }
    }
    $scope.addEvaluation = function(){
        myHttp.getData('/research/isTeacher').success(function (response) {
            if(response.status == '1'){
                location.href = '/research/addEvaluation';
            }else if(response.status == '2'){
                alert('您不是教师，不能发起评课！');
            }else if(response.status == '3'){
                alert('请先登录！');location.href = '/';
            }
        })
    }
});