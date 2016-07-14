/**
 * Created by Mr.H on 2016/1/27.
 */
primeApp.controller('publishResourceCtrl',function($scope,$location,myHttp){

    // 获取地址中的参数
    $scope.url = $location.absUrl();
    $scope.urlarr = $scope.url.split('/');
    $scope.id = $scope.urlarr[$scope.urlarr.length - 1];
    $scope.insert = function(){
        var evaluatPath = $("input[name='evaluatPath']").val();
        if(evaluatPath == ''){
            alert('请先等待上传成功后再发布！');
            return;
        }
        $scope.postdata = {
            'id' : $scope.id,
            'evaluatPath' : evaluatPath,
            'name' : $scope.name,
            'description' : $scope.description
        };
        console.log($scope.postData);
        myHttp.postData('/research/insertResource',$scope.postdata).success(function(response){
            if(response.status == '1'){
                location.href = '/research/lessonDetail/' + $scope.id;
            }else if(response.status == '2'){
                alert('发布失败');
            }else if(response.status == '3'){
                alert('请先登录');location.href = '/';
            }
        })
    }
});