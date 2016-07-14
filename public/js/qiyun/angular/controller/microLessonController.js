primeApp.factory("microLessonFactory", ["$http", function ($http) {

	var getRecommend = function () {
		return $http.get("/microLesson/getRecommend");
	};

	return {
		getRecommend: function () {
			return getRecommend();
		}
	};

}]);

primeApp.controller("microLessonController", ["$scope", "microLessonFactory","myHttp", function ($scope, microLessonFactory,myHttp) {

	$scope.loading = {
		recommend: false,
		primarySchool: false,
		middleSchool: false,
		highSchool: false
	};

	$scope.error = {
		recommend: true,
		primarySchool: true,
		middleSchool: true,
		highSchool: true
	};

	$scope.data = {
		recommend: {},
		primarySchool: {},
		middleSchool: {},
		highSchool: {}
	};

	$scope.setView = function (loading, error) {
		if (loading) $scope.loading[loading] = !$scope.loading[loading];
		if (error) $scope.error[error] = !$scope.error[error];
	};

	microLessonFactory.getRecommend().success(function (response) {
		if (response.type) {
			// console.log(response.recommend);
			$scope.data.recommend = response.recommend;
			$scope.setView("recommend", false);
		} else {
			$scope.setView("recommend", "recommend");
		}
	}).error(function (error) {
		if (error)	$scope.setView("recommend", "recommend");
	});









    $scope.micLessonBlock= false;
    $scope.micLessonLoad= true;
	$scope.micLessonLoadError = false;


	//微课选择列表
	$scope.micLesson = list;


	//定义默认选择值
    $scope.selection = {
    	section:1,
    	grade  :$scope.micLesson.grade[0].id,
    	subject:$scope.micLesson.subject[0].id
    }

	// 微课数
	$scope.courseNum = $scope.micLesson.courseNum;
	// 本周跟新数
	$scope.weekNum   = $scope.micLesson.weekNum;
    // 年级列表
	$scope.grade   = $scope.micLesson.grade;
	// 学科列表
	$scope.subject   = $scope.micLesson.subject;
    //微课列表
    $scope.micLessonCon = $scope.micLesson.detailinfo;


    if($scope.micLessonCon){
	    $scope.micLessonBlock= true;
	    $scope.micLessonLoad= false;
		$scope.micLessonLoadError = false;    	
    }


	$scope.postSel = function(type){

		myHttp.postData('/microLesson/microLessonListSelect',$scope.selection).success(function (response) {

		    $scope.micLessonBlock= true;
		    $scope.micLessonLoad= false;
			$scope.micLessonLoadError = false;

			if(!response.status){
    		    $scope.micLessonBlock= false;
			    $scope.micLessonLoad= false;
				$scope.micLessonLoadError = true;
            }

            // 判断选择项 并将 结果重新赋值
		    switch (type) {
				case 1:
					//grade
					$scope.grade = response.grade;
				    
				    //subje
				    $scope.subject = response.subject;

				    //微课 
				    $scope.micLessonCon = response.detailinfo;
					break;
				case 2:
				    //subject
				    $scope.subject = response.subject;

				    //微课 
				    $scope.micLessonCon = response.detailinfo;
					break;
				case 3:
				    //微课
				    $scope.micLessonCon = response.detailinfo;
					break;	    	
		    }

		}).error(function (error) {
    		    $scope.micLessonBlock= false;
			    $scope.micLessonLoad= false;
				$scope.micLessonLoadError = true;
		});		

	}    

    $scope.select = function(type,id){

	    $scope.micLessonBlock= false;
	    $scope.micLessonLoad= true;
		$scope.micLessonLoadError = false;  
		  	
    	switch(type){
        	case 1:
        	    $scope.selection.level = 1;
                $scope.selection.section = id;
                $scope.postSel(type);
        		break;
        	case 2:
        	    $scope.selection.level = 2;
                $scope.selection.grade = id;
                $scope.postSel(type);
        		break; 
        	case 3:
        	    $scope.selection.level = 3;
                $scope.selection.subject = id;
                $scope.postSel(type);
        		break;         		       	
    	}
    }
}]);













//select 样式
primeApp.directive("micgradeList", [function () {
	return {
		link: function (scope, element, attrs) {

			element.click(
				function(){
					$(this).siblings().removeClass('microLesson_contentBlock_navigation_block_active');
					$(this).addClass('microLesson_contentBlock_navigation_block_active');
			    }
			);

		}
	};
}]);

primeApp.directive("micsubjectList", [function () {
	return {
		link: function (scope, element, attrs) {

			element.click(
				function(){
					$(this).siblings().removeClass('microLesson_contentBlock_navigation_block_active');
					$(this).addClass('microLesson_contentBlock_navigation_block_active');
			    }
			);

		}
	};
}]);