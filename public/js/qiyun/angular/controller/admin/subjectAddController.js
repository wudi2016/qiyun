primeApp.controller("subjectAddController", ["$scope","myHttp", function ($scope,myHttp) {

    //获取学段类型
    myHttp.getData('/admin/resource/getSection').success(function (response) {
    	
		$scope.section = response;
		console.log(response);
	});

    $scope.select = function(type,id){
    	console.log(type,id);
    }

    //设置表单默认值
    $scope.postdata = {
    	resourceSection : '',
    	subjectName     : '',
    }
    
    //提交数据
    $scope.post = function(){

    	if(!$scope.postdata.resourceSection){
    		alert('请选择学段！');
    	}else if(!$scope.postdata.subjectName){
    		alert('请填写学科名！');
    	}else{
		    myHttp.postData('/admin/resource/subjectDoAdd',$scope.postdata).success(function (response) {

		        if(response == 1){
		        	// alert('添加成功！');
		        	if(!confirm('添加成功，是否继续添加？'))
        			window.location.href = '/admin/resource/subjectList';
		        }else{
		        	alert('添加失败！');
		        }

			}).error(function (error) {
			        alert('添加失败！');
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

    //层级选项
 //    $scope.select = function(type,id){

 //    	if(type == 1){
	// 		//获取学科
	// 	    myHttp.getData('/resource/getStudySubject/'+id).success(function (response) {
	// 			$scope.studysubject = response;
                
 //                //清空 下级 选择框
	// 			$scope.studyedition = '';
	// 			$scope.studygrade = '';
	// 			$scope.studychapter = '';
	// 		});         
 //    	}else if(type == 2){
	// 		//获取版本
	// 	    myHttp.getData('/resource/getStudyEdition/'+id).success(function (response) {
	// 			$scope.studyedition = response;
				
 //                //清空 下级 选择框
	// 			$scope.studygrade = '';
	// 			$scope.studychapter = '';
	// 		}); 
 //    	}else if(type == 3){
	// 		//获取册别
	// 	    myHttp.getData('/resource/getStudyGrade/'+id).success(function (response) {
	// 			$scope.studygrade = response;

 //                //清空 下级 选择框
	// 			$scope.studychapter = '';
	// 		});            
 //    	}else if(type == 4){
	// 		//获取教材目录
	// 	    myHttp.getData('/resource/getStudyChapter/'+id).success(function (response) {
	// 			$scope.studychapter = response;
	// 		});     		
 //    	}
	// }
    


	// $scope.post = function(){
	// 	//获取上传资源的路径
	// 	$scope.postdata.resourcePath = resourcePath;
        
 //        //提交 资源信息
	// 	console.log($scope.postdata);
	//     myHttp.postData('/resource/douploadResourceInfo',$scope.postdata).success(function (response) {

	//         if(response == 1){
	//         	alert('请登录!');
	//         }else if(response == 2){
 //                alert('您不是教师,不能发布资源');
	//         }else if(response == 3){
 //                alert('请选择资源！');
	//         }else if(response == 4){
	// 	        alert('资源发布成功');
	//         }else{
	//         	alert('资源发布失败');
	//         }

	// 	}).error(function (error) {
	// 	        alert('资源发布失败');
	// 	});		
	// }



}]);

























