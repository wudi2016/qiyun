primeApp.controller("uploadResourceController", ["$scope","myHttp", function ($scope,myHttp) {

    //获取资源类型
    myHttp.getData('/resource/getResourceType').success(function (response) {
    	response.shift(); //去掉全部资源选项
		$scope.resourcetype = response;
	});

	//获取学段
    myHttp.getData('/resource/getStudySection').success(function (response) {
		$scope.studysection = response;
		// console.log(response);
	});


    //默认提交数据
    $scope.postdata = {
		resourceTitle:'',
		resourceType:'',
		resourceSection:'',
		resourceSubject:'',
		resourceEdition:'',
		resourceGrade:'',
		resourceChapter:'',
		resourcePath:'',
		isexpand        : 1,  //是否是拓展资源  1默认 2拓展
		expandId        : ''  //拓展资源 选项
    }


    //层级选项
    $scope.select = function(type,id){

    	if(type == 1){
			//获取学科
			$('.subjectLoading').removeClass('hide');
		    myHttp.getData('/resource/getStudySubject/'+id).success(function (response) {
				$scope.studysubject = response;
				$('.subjectLoading').addClass('hide');

				//清空 下级 选择框
				$scope.studyedition = '';
				$scope.studygrade = '';
				$scope.studychapter = '';
			});

			//获取拓展类型
			myHttp.getData('/admin/resource/getExpandSel/' + id).success(function (response) {
				$scope.expandSels = response;
				$('.subjectLoading').addClass('hide');

			});
    	}else if(type == 2){
			//获取版本
			$('.editionLoading').removeClass('hide');

			myHttp.getData('/resource/getStudyEdition/'+id).success(function (response) {
				$scope.studyedition = response;
				$('.editionLoading').addClass('hide');

				//清空 下级 选择框
				$scope.studygrade = '';
				$scope.studychapter = '';
			}); 
    	}else if(type == 3){
			//获取册别
			$('.gradeLoading').removeClass('hide');

			myHttp.getData('/resource/getStudyGrade/'+id).success(function (response) {
				$scope.studygrade = response;
				$('.gradeLoading').addClass('hide');

                //清空 下级 选择框
				$scope.studychapter = '';
			});            
    	}else if(type == 4){
			//获取教材目录
		    myHttp.getData('/resource/getStudyChapter/'+id).success(function (response) {
				$scope.studychapter = response;
			});     		
    	}
	}
    
    $scope.checkPost = function(){
		//获取上传资源的路径
		$scope.postdata.resourcePath = resourcePath;
		if(resourcePic){
			$scope.postdata.resourcePic = resourcePic;
		}

        if($scope.postdata.isexpand == 1){
			if(!$scope.postdata.resourceSection){
				alert('请选择学段！');
				return false;
			}else{
				if(!$scope.postdata.resourceSubject){
					alert('请选择学科！');
					return false;
				}else{
					if(!$scope.postdata.resourceEdition){
						alert('请选择版本！');
						return false;
					}else{
						if(!$scope.postdata.resourceGrade){
							alert('请选择册别！');
							return false;
						}else{
							if(!$scope.postdata.resourceType){
								alert('请选择资源类型！');
								return false;
							}else{
								if(!$scope.postdata.resourceTitle){
									alert('请填写资源名称！');
									return false;
								}else{
									if ($scope.postdata.resourceTitle.length <= 40) {
										if(!$scope.postdata.resourceIntro){

											return true;

										}else{
											if($scope.postdata.resourceIntro.length > 200){
	                                            alert('资源描述限制200字内！');
	                                            return false;
											}else{
												return true;
											}
										}
									}else{
										alert('资源描述限制40字内！');
										return false;
									}
								}
							}
						}
					}
				}
			}
		}else{
			$scope.postdata.resourceSubject = '';
			$scope.postdata.resourceEdition = '';
			$scope.postdata.resourceGrade = '';
			$scope.postdata.resourceChapter = '';

			if(!$scope.postdata.resourceSection){
				alert('请选择学段！');
				return false;
			}else{
				if(!$scope.postdata.expandId){
					alert('拓展类别！');
					return false;
				}else{

					if(!$scope.postdata.resourceType){
						alert('请选择资源类型！');
						return false;
					}else{
						if(!$scope.postdata.resourceTitle){
							alert('请填写资源名称！');
							return false;
						}else{
							// if(!$scope.postdata.resourceIntro){
							//        alert('请填资源描述！');
							// 	return false;

							// }else{
							return true;
							// }
						}
					}

				}
			}
		}

	}

	$scope.post = function(){
    	if($scope.checkPost()){
			myHttp.postData('/resource/douploadResourceInfo',$scope.postdata).success(function (response) {

				if(response == 1){
					alert('请登录!');
				}else if(response == 2){
					alert('您不是教师,不能发布资源');
				}else if(response == 3){
					alert('请选择资源！');
				}else if(response == 6){
					alert('您已上传过该标题资源');
				}
				else if(response.status == 4){
					// alert('资源发布成功');
					window.location.href = '/resource/uploadResourceSuccess/'+response.resId;
				}else{
					alert('资源发布失败了');
				}
			}).error(function (data) {
				alert('资源发布失败');
			});
		}else{
			return false;
		}



	}
}]);















// ----------文件上传-----------
// function MyCtrl($scope,$window){
// 	$scope.name = 'Superhero';
// 	MyCtrl.prototype.$scope = $scope;
// }

// MyCtrl.prototype.setFile = function(element) {
// 	var $scope = this.$scope;
// 	$scope.$apply(function(){
// 		$scope.theFile = '已选择  ' + element.files[0].name;
// 	})
// }























