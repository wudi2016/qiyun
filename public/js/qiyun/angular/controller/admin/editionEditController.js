primeApp.controller("editionEditController", ["$scope","$location","myHttp", function ($scope,$location,myHttp) {
    //版本id
	$scope.editionId = $location.absUrl().split('/')[$location.absUrl().split('/').length-1];


    //获取学段类型
    myHttp.getData('/admin/resource/getSection').success(function (response) {
    	
		$scope.section = response;
		// console.log(response);
	});

    //根据上级选项获取下级选项列表
    $scope.select = function(type,id){
    	console.log(type,id);
    	if(type == 1){
			//获取学科
		    myHttp.getData('/admin/resource/getSubject/'+id).success(function (response) {
				$scope.studysubject = response;
                
                //清空 下级 选择框
				$scope.studyedition = '';
				$scope.studygrade = '';
				$scope.studychapter = '';
			});         
    	}    	
    }


    //获取要修的改版本信息
    myHttp.getData('/admin/resource/getEditionInfo/'+$scope.editionId).success(function (response) {
		$scope.edition = response;

		//将获取的信息赋值给表单
	    $scope.postdata = {
	    	editionid       : $scope.edition.id,
	    	resourceSection : $scope.edition.sectionid,
	    	resourceSubject : $scope.edition.subjectid,
	    	editionName     : $scope.edition.editionName,
	    }
        
        //根据获取的学科id查出版本列表
    	myHttp.getData('/admin/resource/getSubject/'+$scope.edition.sectionid).success(function (response) {
			$scope.studysubject = response;
		});  
	});

    
    //提交数据
    $scope.post = function(){

    	if(!$scope.postdata.resourceSection){
    		alert('请选择学段！');
    	}else if(!$scope.postdata.resourceSubject){
    		alert('请选择学科！');
    	}else if(!$scope.postdata.editionName){
            alert('请填写版本名称！');
    	}else{
		    myHttp.postData('/admin/resource/editionDoEdit',$scope.postdata).success(function (response) {

		        if(response == 1){
		        	if(confirm('修改成功，是否返回列表页？'))
		        	window.location.href = '/admin/resource/editionList';
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
	    	resourceSubject : '',
	    	editionName     : '',
	    }   	
    }




}]);

























