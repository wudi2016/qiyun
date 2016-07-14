/**
 * Created by Mr.H on 2016/1/25.
 */
primeApp.controller('evaluationInfoCtrl',function($scope,$location,myHttp){

    // 获取地址中的参数
    $scope.url = $location.absUrl();
    $scope.urlarr = $scope.url.split('/');
    $scope.id = $scope.urlarr[$scope.urlarr.length - 1];

    console.log($scope.id);
    if($scope.id){
        $scope.iMark = function(id){
            myHttp.postData('/research/iMark',id).success(function (response) {
                if(response.status == '1'){
                   alert('您已参与评分，请勿刷分！');
                }else if(response.status == '2'){
                    alert('请先登录！');location.href = '/';
                }else if(response.status == '3'){
                    location.href = '/research/mark/' + id;
                }else if(response.status == '4'){
                    alert('您没有被邀请参与此评课的评分！');
                }else if(response.status == '5'){
                    alert('请先同意加入此评课');location.href = '/perSpace/1/' + response.userId;
                }else if(response.status == '6'){
                    alert('您是该课程的授课人，不允许自己评分！');
                }
            }).error(function (error) {

            });
        }

        $scope.resource = false;
        $scope.resourcemsg = true;
        $scope.resourceblock = true;
        $scope.comment = false;
        $scope.commentmsg = true;
        $scope.commentblock = true;

        var getGroupListPage = function () {

            var postData = {
                pageIndex: $scope.paginationConf.currentPage,
                pageSize: $scope.paginationConf.itemsPerPage
            }

            myHttp.postData('/research/getEvaluationInfo/' + $scope.id,postData).success(function (response) {
                $scope.evaluationInfo = response.evaluationInfo;
                $scope.evaluatId = $scope.id;

                if(response.state.resource){
                    $scope.resource = response.resource;
                    $scope.resourceblock = false;
                    $scope.resourceError = '';
                }else{
                    $scope.resource = true;
                    $scope.resourceError = '还没有上传过课件';
                }

                if(response.state.comment){
                    $scope.comment = response.comment;
                    $scope.commentblock = false;
                    $scope.paginationConf.totalItems = response.total;
                    $scope.commentError = '';
                }else{
                    $scope.comment = true;
                    $scope.commentError = '还没有用户评论过';
                }

            }).error(function (error) {
                $scope.resource = true;
                $scope.resourcemsg = false;
                $scope.comment = true;
                $scope.commentmsg = false;
            });

        }

        $scope.paginationConf = {
            currentPage: 1,
            itemsPerPage: 5
        };
        $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getGroupListPage);

        $scope.reload = function(type) {
            switch (type) {
                case "resource" :
                    $scope.resource = false;
                    $scope.resourcemsg = true;
                    $scope.resourceblock = true;
                    myHttp.getData('/research/getEvaluationInfo/' + $scope.id).success(function (response) {
                        if(response.state.resource){
                            $scope.resource = response.resource;
                            $scope.resourcemsg = true;
                            $scope.resourceblock = false;
                            $scope.resourceError = '';
                        }else{
                            $scope.resource = true;
                            $scope.resourceError = '还没有上传过课件';
                        }
                    }).error(function (error) {
                        $scope.resource = true;
                        $scope.resourcemsg = false;
                    });
                    break;
                case "comment" :
                    $scope.comment = false;
                    $scope.commentmsg = true;
                    $scope.commentblock = true;
                    var postData = {
                        pageIndex: $scope.paginationConf.currentPage,
                        pageSize: $scope.paginationConf.itemsPerPage
                    }

                    myHttp.postData('/research/getEvaluationInfo/' + $scope.id,postData).success(function (response) {
                        if(response.state.comment){
                            $scope.comment = response.comment;
                            $scope.commentmsg = true;
                            $scope.commentblock = false;
                            $scope.paginationConf.totalItems = response.total;
                            $scope.commentError = '';
                        }else{
                            $scope.comment = true;
                            $scope.commentError = '还没有用户评论过';
                        }
                    }).error(function (error) {
                        $scope.comment = true;
                        $scope.commentmsg = false;
                    });
                    break;
            }
        }
        myHttp.getData('/research/avgContent/' + $scope.id).success(function (response) {
            if(response.status){
                $scope.content = response.content;
                $scope.total = response.total;
                $scope.nums = response.nums;
            }
        }).error(function (error) {

        });

        $scope.uploadCourse = function(id){
            myHttp.getData('/research/isAuthor/' + id).success(function (response) {
                if(response.status == '1'){
                    alert('您不是创建者或者授课人，不能上传！');
                }else if(response.status == '2'){
                    location.href = '/research/uploadCourse/' + id;
                }else if(response.status == '3'){
                    alert('请先登录！');location.href = '/';
                }
            }).error(function (error) {

            });
        }
    }
});