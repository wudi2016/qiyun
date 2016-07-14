/**
 * Created by Mr.H on 2016/2/2.
 */
primeApp.controller('subjectArticleCtrl',function($scope,$location){

    // 获取地址中的参数
    $scope.url = $location.absUrl();
    $scope.urlarr = $scope.url.split('/');
    $scope.id = $scope.urlarr[$scope.urlarr.length - 1];
    $scope.articleReset = function(id){
        location.href = '/research/subjectInfo/' + id;
    }
});