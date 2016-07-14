/**
 * Created by Mr.H on 2016/2/15.
 */
primeApp.controller('markCtrl',function($scope,$location,myHttp){

    // 获取地址中的参数
    $scope.url = $location.absUrl();
    $scope.urlarr = $scope.url.split('/');
    $scope.id = $scope.urlarr[$scope.urlarr.length - 1];

    //console.log($scope.url);
    if($scope.id){
        myHttp.getData('/research/getMarkInfo/' + $scope.id).success(function (response) {
            $scope.evaluationInfo = response.evaluationInfo;
        }).error(function (error) {

        });
        myHttp.getData('/research/tmpContent/' + $scope.id).success(function (response) {
            if(response.status){
                $scope.content = response.content;
                $scope.total = response.total;
                // 获取评分项的数目
                $scope.length = response.content.length;
                // 每个小星星代表的分数
                $scope.star = 100/$scope.length/5;
            }
        }).error(function (error) {

        });
    }


    $scope.check = function(id,num){
        $('#' + id).val($scope.star*num);
    }
    $('.main_submit').mousemove(function (){
        var obj = $("input[type='hidden']");
        var length = obj.length;
        var flag = 0;
        for(var i = 2; i < length; i++){
            if($(obj[i]).val() == ''){
                flag += 1;
            }
        }
        if(flag >= 1){
            alert('请对每一项评分项打分！');
        }
    })

    $scope.reset = function(id){
        location.href = '/research/evaluationInfo/' + id;
    }
});
primeApp.directive("effetA", [function () {
    return {
        link: function (scope, element, attrs) {
            element.click(function(){
                $(this).nextAll().attr('src','/image/qiyun/research/mark/3.png');
                $(this).prevAll().attr('src','/image/qiyun/research/mark/4.png');
            }).click(function(){
                $(this).attr('src','/image/qiyun/research/mark/4.png')
            });
        }
    };
}]);