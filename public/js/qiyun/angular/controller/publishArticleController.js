/**
 * Created by Mr.H on 2016/1/27.
 */
primeApp.controller('publishArticleCtrl',function($scope,$location){

    // 获取地址中的参数
    $scope.url = $location.absUrl();
    $scope.urlarr = $scope.url.split('/');
    $scope.id = $scope.urlarr[$scope.urlarr.length - 1];
    if($scope.id) {
        $scope.theme = $scope.id;
    }
});