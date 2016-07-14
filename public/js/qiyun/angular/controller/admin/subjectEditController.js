primeApp.controller("subjectEditController", ["$scope","$location","myHttp", function ($scope,$location,myHttp) {
    //学科id
	$scope.subjectId = $location.absUrl().split('/')[$location.absUrl().split('/').length-1];

    //获取下拉选项学段类型
    myHttp.getData('/admin/resource/getSection').success(function (response) {
    	
		$scope.sectionList = response;
		// console.log(response);
	});


    //获取要修的改学科信息
    myHttp.getData('/admin/resource/getSubjectInfo/'+$scope.subjectId).success(function (response) {
		$scope.subject = response;
		//将获取的信息赋值给表单
	    $scope.postdata = {
	    	subjectid       : $scope.subject.subjectid,
	    	resourceSection : $scope.subject.sectionid,
	    	subjectName     : $scope.subject.subjectName,
	    }
	});

    
    //提交数据
    $scope.post = function(){

    	if(!$scope.postdata.resourceSection){
    		alert('请选择学段！');
    	}else if(!$scope.postdata.subjectName){
    		alert('请填写学科名！');
    	}else{
		    myHttp.postData('/admin/resource/subjectDoEdit',$scope.postdata).success(function (response) {

		        if(response == 1){
		        	if(confirm('修改成功，是否返回列表页？'))
		        	window.location.href = '/admin/resource/subjectList';
		        }else{
		        	alert('修改失败！');
		        }

			}).error(function (error) {
			        alert('修改失败！');
			});    		
    	}   

    }
    
    //重置表单
    $scope.reset = function(){
	    $scope.postdata = {
	    	resourceSection : '',
	    	subjectName     : '',
	    }    	
    }



}]);

























