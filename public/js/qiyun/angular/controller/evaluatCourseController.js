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
    // console.log($scope.resId);
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


	$scope.iMark = function(id){
		myHttp.postData('/research/iMark',id).success(function (response) {
			if(response.status == '1'){
				alert('您已参与评分，请勿刷分！');
			}else if(response.status == '2'){
				alert('请先登录！');location.href = '/';
			}else if(response.status == '3'){
				location.href = '/research/mark/' + id;
			}else if(response.status == '4'){
				alert('您没有被邀请参与此评课的评分！');
			}else if(response.status == '5'){
				alert('请先同意加入此评课');location.href = '/perSpace/1/' + response.userId;
			}
		}).error(function (error) {

		});
	}
}]);


