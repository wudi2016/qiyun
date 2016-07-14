primeApp.factory("resourceDetailFactory", ["$http", function ($http) {

	var getRelevantEvaluat = function () {
		return $http.get('/research/getRelevantEvaluat');
	};
	return {
		getRelevantEvaluat: function () {
			return getRelevantEvaluat();
		}
	};
}]);

primeApp.controller("resourceDetailController", ["$scope","$location","resourceDetailFactory","myHttp", function ($scope,$location,resourceDetailFactory,myHttp) {
    //资源id
	$scope.resId = $location.absUrl().split('/')[$location.absUrl().split('/').length-1];
     console.log($scope.resId);
	$scope.loading = {
		other: false,
		comment: false
	};

	$scope.empty = {
		other: true,
		comment: true
	};

	$scope.error = {
		other: true,
		comment: true
	};

	$scope.data = {
		// detail: resourceDetails,
		other: {},
		comment: {},
		commentCount: 0
	};

	$scope.setView = function (loading, error) {
		if (loading) $scope.loading[loading] = !$scope.loading[loading];
		if (error) $scope.error[error] = !$scope.error[error];
	};

	resourceDetailFactory.getRelevantEvaluat().success(function (response) {
		if (response.type) {
			$scope.data.other = response.other;
			$scope.setView("other", false);
		} else {
			// $scope.setView("other", "other");
			$scope.loading.other = !$scope.loading.other ;
			$scope.empty.other = !$scope.empty.other ;
		}

	}).error(function (error) {
		if (error)	$scope.setView("other", "other");
	});


	$scope.evaluatCourseList = false;
	$scope.evaluatCourseListmsg = true;
	$scope.evaluatCourseListblock = true;
	var getEvaluatCourseList = function () {

		var postData = {
			parentId : $scope.resId,
			pageIndex: $scope.paginationConf.currentPage,
			pageSize: $scope.paginationConf.itemsPerPage
		}

		myHttp.postData('/research/getEvaluatCourseList',postData).success(function (response) {
			if(response.status){
				$scope.evaluatCourseList = response.evaluatCourseList;
				$scope.evaluatCourseListmsg = true;
				$scope.evaluatCourseListblock = false;
				$scope.paginationConf.totalItems = response.total;
			}else{
				$scope.evaluatCourseList = true;
				$scope.evaluatCourseListblock = false;
				$scope.evaluatCourseListError = '没有课件上传！';
			}
		}).error(function (error){
			$scope.evaluatCourseList = true;
			$scope.evaluatCourseListmsg = false;
		});

	}

	$scope.paginationConf = {
		currentPage: 1,
		itemsPerPage: 6
	};
	$scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getEvaluatCourseList);
	$scope.reloadcourse = function(type) {
		switch (type) {
			case "evaluatCourseList" :
				// 教研组信息
				$scope.evaluatCourseList = false;
				$scope.evaluatCourseListmsg = true;
				$scope.evaluatCourseListblock = true;
				var postData = {
					parentId : $scope.resId,
					pageIndex: $scope.paginationConf.currentPage,
					pageSize: $scope.paginationConf.itemsPerPage
				};
				myHttp.postData('/research/getEvaluatCourseList', postData).success(function (response) {
					if(response.status){
						$scope.evaluatCourseList = response.evaluatCourseList;
						$scope.evaluatCourseListmsg = true;
						$scope.evaluatCourseListblock = false;
						$scope.paginationConf.totalItems = response.total;
					}else{
						$scope.evaluatCourseList = true;
						$scope.evaluatCourseListblock = false;
						$scope.evaluatCourseListError = '没有课件上传！';
					}
				}).error(function (error) {
					$scope.evaluatCourseList = true;
					$scope.evaluatCourseListmsg = false;
				});
		}
	};


	$scope.reload = function (key) {
		switch (key) {
			case "other":
				$scope.setView("other", "other");
				resourceDetailFactory.getRelevantEvaluat().success(function (response) {
					if (response.type) {
						$scope.data.other = response.other;
						$scope.setView("other", false);
					} else {
						// $scope.setView("other", "other");
						$scope.loading.other = !$scope.loading.other ;
			            $scope.empty.other = !$scope.empty.other ;
					}
				}).error(function (error) { 
					$scope.setView("other", "other"); 
				});
				break;
		}
	};
}]);


