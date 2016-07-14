primeApp.controller("gradeEditController", ["$scope","$location","myHttp", function ($scope,$location,myHttp) {
    //册别id
	$scope.gradeId = $location.absUrl().split('/')[$location.absUrl().split('/').length-1];

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
    	}else if(type == 2){
			//获取版本
		    myHttp.getData('/admin/resource/getEdition/'+id).success(function (response) {
				$scope.studyedition = response;
				
                //清空 下级 选择框
				$scope.studygrade = '';
				$scope.studychapter = '';
			}); 
    	} 


    }


    //获取要修的册别本信息
    myHttp.getData('/admin/resource/getGradeInfo/'+$scope.gradeId).success(function (response) {
		$scope.grade = response;

		//将获取的信息赋值给表单
	    $scope.postdata = {
	    	gradeid       : $scope.grade.id,
	    	resourceSection : $scope.grade.sectionid,
	    	resourceSubject : $scope.grade.subjectid,
	    	resourceEdition : $scope.grade.editionid,
	    	gradeName     : $scope.grade.gradeName,
	    }
        
        console.log(response);

        //根据获取的学段id查出学科列表
    	myHttp.getData('/admin/resource/getSubject/'+$scope.grade.sectionid).success(function (response) {
			$scope.studysubject = response;
		}); 
		//根据获取的学科id查出版本列表 
    	myHttp.getData('/admin/resource/getEdition/'+$scope.grade.subjectid).success(function (response) {
			$scope.studyedition = response;
		}); 		
	});


    
    //提交数据
    $scope.post = function(){

    	if(!$scope.postdata.resourceSection){
    		alert('请选择学段！');
    	}else if(!$scope.postdata.resourceSubject){
    		alert('请选择学科！');
    	}else if(!$scope.postdata.resourceEdition){
            alert('请选择版本！');
    	}else if(!$scope.postdata.gradeName){
            alert('请填写册别名称！');
    	}else{
		    myHttp.postData('/admin/resource/gradeDoEdit',$scope.postdata).success(function (response) {

		        if(response == 1){
		        	if(confirm('修改成功，是否返回列表页？'))
		        	window.location.href = '/admin/resource/gradeList';
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
	    	resourceEdition : '',
	    	gradeName     : '',
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

























