primeApp.controller('indexCtrl',function($scope,myHttp){
    
    //教育资讯
    $scope.education = false;
	$scope.educationmsg = true;
	myHttp.getData('/index/getNews/1').success(function (response) {
		$scope.education = response.education;
	}).error(function (error) {
		$scope.education = true;
		$scope.educationmsg = false;
	});
    //政策发布
    $scope.policy = false;
	$scope.policymsg = true;
	myHttp.getData('/index/getNews/2').success(function (response) {
		$scope.policy = response.education;
		// console.log(response.education);
	}).error(function (error) {
		$scope.policy = true;
		$scope.policymsg = false;
	});	
    //名师排行
    $scope.teacher = false;
	$scope.teachermsg = true;
	myHttp.getData('/index/getPersonalSpace').success(function (response) {
		$scope.teacher = response.teacher;
		// console.log(response.teacher);
	}).error(function (error) {
		$scope.teacher = true;
		$scope.teachermsg = false;
	});

	// 精品微课
    $scope.microVideo = false;
	$scope.microVideomsg = true;
	$scope.microVideoblock = true;
	myHttp.getData('/index/getMicroVideo').success(function (response) {
		$scope.microVideo = response.microVideo;
		$scope.microVideoblock = false;
		// console.log(response.microVideo);
	}).error(function (error) {
		$scope.microVideo = true;
		$scope.microVideomsg = false;
	});	

	//热门资源排行
    $scope.resource = false;
	$scope.resourcemsg = true;
	myHttp.getData('/index/getResource').success(function (response) {
		$scope.resource = response.resource;
		// console.log(response.resource);
	}).error(function (error) {
		$scope.resource = true;
		$scope.resourcemsg = false;
	});
    
	//优质资源排行
    $scope.favresource = false;
	$scope.favresourcemsg = true;
	myHttp.getData('/index/getFavResource').success(function (response) {
		$scope.favresource = response.resource;
	}).error(function (error) {
		$scope.favresource = true;
		$scope.favresourcemsg = false;
	});




	//教师协作组
    $scope.techresearch = false;
	$scope.techresearchmsg = true;
	$scope.techresearchempty = true;
	myHttp.getData('/index/getTechResearch').success(function (response) {
		if (response.type) {
			$scope.techresearch = response.techresearch;
		}else{
            $scope.techresearchempty = false;
            $scope.techresearch = true;
		}
	}).error(function (error) {
		$scope.techresearch = true;
		$scope.techresearchmsg = false;
	});
    
    //协同备课
    $scope.lessonsubject = false;
	$scope.lessonsubjectmsg = true;
	$scope.lessonsubjectempty = true;
	myHttp.getData('/index/getLessonSubject').success(function (response) {
		if (response.type) {
			$scope.lessonsubject = response.lessonsubject;
		}else{
            $scope.lessonsubjectempty = false;
            $scope.lessonsubject = true;
		}
	}).error(function (error) {
		$scope.lessonsubject = true;
		$scope.lessonsubjectmsg = false;
	});

    //评课议课
    $scope.evaluat = false;
	$scope.evaluatmsg = true;
	$scope.evaluatempty = true;
	myHttp.getData('/index/getEvaluta').success(function (response) {
		if (response.type) {
			$scope.evaluat = response.evaluat;
		}else{
            $scope.evaluatempty = false;
            $scope.evaluat = true;
		}
	}).error(function (error) {
		$scope.evaluat = true;
		$scope.evaluatmsg = false;
	});

	//主题讨论
    $scope.departmenttheme = false;
	$scope.departmentthememsg = true;
	$scope.departmentthemeempty = true;
	myHttp.getData('/index/getDepartmentTheme').success(function (response) {
		if (response.type) {
			$scope.departmenttheme = response.departmenttheme;
		}else{
            $scope.departmentthemeempty = false;
            $scope.departmenttheme = true;
		}
	}).error(function (error) {
		$scope.departmenttheme = true;
		$scope.departmentthememsg = false;
	});	



	$scope.reload = function(type){
    	switch(type) {
    		case "education" :
    			$scope.education = false;
				$scope.educationmsg = true;
				myHttp.getData('/index/getNews/1').success(function (response) {
					$scope.education = response.education;
					console.log(response.education);
				}).error(function (error) {
					$scope.education = true;
					$scope.educationmsg = false;
				});
    			break;
    	    case "policy":
    	        $scope.policy = false;
				$scope.policymsg = true;
				myHttp.getData('/index/getNews/2').success(function (response) {
					$scope.policy = response.education;
					console.log(response.education);
				}).error(function (error) {
					$scope.policy = true;
					$scope.policymsg = false;
				});
    	        break;
    	    case "teacher":
    	    	$scope.teacher = false;
				$scope.teachermsg = true;
				myHttp.getData('/index/getPersonalSpace').success(function (response) {
					$scope.teacher = response.teacher;
					console.log(response.teacher);
				}).error(function (error) {
					$scope.teacher = true;
					$scope.teachermsg = false;
				});
    	    	break;
    	    case "microVideo":
    	        $scope.microVideo = false;
				$scope.microVideomsg = true;
				$scope.microVideoblock = true;
				myHttp.getData('/index/getMicroVideo').success(function (response) {
					$scope.microVideo = response.microVideo;
					$scope.microVideoblock = false;
					console.log(response.microVideo);
				}).error(function (error) {
					$scope.microVideo = true;
					$scope.microVideomsg = false;
				});
				break;
    	    case "resource":
			    $scope.resource = false;
				$scope.resourcemsg = true;
				myHttp.getData('/index/getResource').success(function (response) {
					$scope.resource = response.resource;
					console.log(response.resource);
				}).error(function (error) {
					$scope.resource = true;
					$scope.resourcemsg = false;
				});
    	    	break;	
    	    case "favresource":
			    $scope.favresource = false;
				$scope.favresourcemsg = true;
				myHttp.getData('/index/getFavResource').success(function (response) {
					$scope.favresource = response.resource;
				}).error(function (error) {
					$scope.favresource = true;
					$scope.favresourcemsg = false;
				});    	    
    	    	break;		
    	    case "techresearch":
			    $scope.techresearch = false;
				$scope.techresearchmsg = true;
				$scope.techresearchempty = true;
				myHttp.getData('/index/getTechResearch').success(function (response) {
					if (response.type) {
						$scope.techresearch = response.techresearch;
					}else{
			            $scope.techresearchempty = false;
			            $scope.techresearch = true;
					}
				}).error(function (error) {
					$scope.techresearch = true;
					$scope.techresearchmsg = false;
				});    	    
    	        break;	
    	    case "lessonsubject":
			    $scope.lessonsubject = false;
				$scope.lessonsubjectmsg = true;
				$scope.lessonsubjectempty = true;
				myHttp.getData('/index/getLessonSubject').success(function (response) {
					if (response.type) {
						$scope.lessonsubject = response.lessonsubject;
					}else{
			            $scope.lessonsubjectempty = false;
			            $scope.lessonsubject = true;
					}
				}).error(function (error) {
					$scope.lessonsubject = true;
					$scope.lessonsubjectmsg = false;
				});    	    
    	        break;
    	    case "evaluat":
    	        $scope.evaluat = false;
				$scope.evaluatmsg = true;
				$scope.evaluatempty = true;
				myHttp.getData('/index/getEvaluta').success(function (response) {
					if (response.type) {
						$scope.evaluat = response.evaluat;
					}else{
			            $scope.evaluatempty = false;
			            $scope.evaluat = true;
					}
				}).error(function (error) {
					$scope.evaluat = true;
					$scope.evaluatmsg = false;
				});
    	    	break;
    	    case "departmenttheme":
    	        $scope.departmenttheme = false;
				$scope.departmentthememsg = true;
				$scope.departmentthemeempty = true;
				myHttp.getData('/index/getDepartmentTheme').success(function (response) {
					if (response.type) {
						$scope.departmenttheme = response.departmenttheme;
					}else{
			            $scope.departmentthemeempty = false;
			            $scope.departmenttheme = true;
					}
				}).error(function (error) {
					$scope.departmenttheme = true;
					$scope.departmentthememsg = false;
				});	
    	        break;
    	}
	}


	//获取用户资源 微课 教研 数量 接口
    $scope.resourceNum = 0;
	$scope.micLessonNum = 0;
	$scope.researchNum = 0;
	myHttp.getData('/index/getNUm').success(function (response) {
		if (response.type) {
    		$scope.resourceNum = response.resourceNum;
    		$scope.micLessonNum = response.micLessonNum;
    		$scope.researchNum = response.researchNum;
		}
	}) 

})