primeApp.controller("resourceAddController", ["$scope","myHttp", function ($scope,myHttp) {

    //获取学段类型
    myHttp.getData('/admin/resource/getSection').success(function (response) {
    	
		$scope.section = response;
		// console.log(response);
	});
	//获取资源类型
    myHttp.getData('/admin/resource/getResourceType').success(function (response) {
    	
		$scope.resourcetype = response;
		console.log(response);
	});

    //根据上级选项获取下级选项列表
    $scope.select = function(type,id){
    	console.log(type,id);
    	if(type == 1){
			//if($scope.postdata.isexpand == 1) {
				//获取学科
				myHttp.getData('/admin/resource/getSubject/' + id).success(function (response) {
					$scope.studysubject = response;

					//清空 下级 选择框
					$scope.studyedition = '';
					$scope.studygrade = '';
					$scope.studychapter = '';
				});
			//}else{
				//获取拓展类型
				myHttp.getData('/admin/resource/getExpandSel/' + id).success(function (response) {
					$scope.expandSels = response;
				});
			//}
    	}else if(type == 2){
			//获取版本
		    myHttp.getData('/admin/resource/getEdition/'+id).success(function (response) {
				$scope.studyedition = response;
				
                //清空 下级 选择框
				$scope.studygrade = '';
				$scope.studychapter = '';
			}); 
    	}else if(type == 3){
			//获取册别
		    myHttp.getData('/admin/resource/getGrade/'+id).success(function (response) {
				$scope.studygrade = response;

                //清空 下级 选择框
				$scope.studychapter = '';
			});            
    	}else if(type == 4){
			//获取教材目录
		    myHttp.getData('/admin/resource/getChapter/'+id).success(function (response) {
				$scope.studychapter = response;
			});     		
    	} 


    }

    //设置表单默认值
    $scope.postdata = {
    	resourceSection : '',
    	resourceSubject : '',
    	resourceEdition : '',
    	resourceGrade   : '',
    	resourceChapter : '',
    	resourceType    : '',
    	resourceTitle   : '',
    	resourceIntro   : '',
    	resourcePath    : '',
		isexpand        : 1,  //是否是拓展资源  1默认 2拓展
		expandId        : ''  //拓展资源 选项
    }

	$scope.checkPost = function(){
		//获取上传资源的路径
		$scope.postdata.resourcePath = resourcePath;

		if(resourcePic){
			$scope.postdata.resourcePic = resourcePic;
		}

		if($scope.postdata.isexpand == 1) {
			if (!$scope.postdata.resourceSection) {
				alert('请选择学段！');
				return false;
			} else if (!$scope.postdata.resourceSubject) {
				alert('请选择学科！');
				return false;
			} else if (!$scope.postdata.resourceEdition) {
				alert('请选择版本！');
				return false;
			} else if (!$scope.postdata.resourceGrade) {
				alert('请选择册别！');
				return false;
			}
			// else if(!$scope.postdata.resourceChapter){
			//        alert('请选择章节！');
			// }

			else if (!$scope.postdata.resourceType) {
				alert('请选择资源类型！');
				return false;
			}
			else if(!$scope.postdata.resourceTitle){
			   alert('请填写标题！');
			   return false;
			}
			else if (!$scope.postdata.resourcePath) {
				alert('请选择要上传的资源！');
				return false;
			} else {
				return true;
			}
		}else{
			$scope.postdata.resourceSubject = '';
			$scope.postdata.resourceEdition = '';
			$scope.postdata.resourceGrade = '';
			$scope.postdata.resourceChapter = '';

			if (!$scope.postdata.resourceSection) {
				alert('请选择学段！');
				return false;
			}else if (!$scope.postdata.expandId) {
				alert('拓展类型！');
				return false;
			}else if (!$scope.postdata.resourceType) {
				alert('请选择资源类型！');
				return false;
			}
			else if (!$scope.postdata.resourcePath) {
				alert('请选择要上传的资源！');
				return false;
			}
			else{
				return true;
			}
		}
	}

    //提交数据
    $scope.post = function(){

    	if($scope.checkPost()) {

			myHttp.postData('/admin/resource/doAddResourceInfo', $scope.postdata).success(function (response) {

				if (response == 1) { //普通资源添加成功
					if (!confirm('添加成功，是否继续添加？'))
						window.location.href = '/admin/resource/resourceList';
				} else if(response == 2) { //拓展资源添加成功
					//alert('拓展资源添加成功');
					if (!confirm('添加成功，是否继续添加？'))
						window.location.href = '/admin/resource/expandResourceList';
				} else if(response == 6){
					alert('您已上传过该标题资源');
				}else{
					alert('添加失败！');
				}

			}).error(function (error) {
				alert('添加失败！');
			});

		}else{
			return false;
		}
    }
    
    //重置表单
    $scope.reset = function(){

   //  	//判断是否有选择文件，有则删除
   //      if(resourcePath){
   //          $scope.lastUpload = {
   //          	lastUpload : resourcePath,
   //          }
		 //    myHttp.postData('/admin/resource/delLastUpload',$scope.lastUpload).success(function (response) {
   //          	//删除
			// })          
   //      }
        

		history.go(0);
	}


}]);


primeApp.directive("checkStatus",function(){
	return {
		link:function(scope,element,attrs){
        	
        	element.click(function(){
	        	$('.uploadarea_bar_r_msg').html(' ');
        	});

		}
	}
})





























