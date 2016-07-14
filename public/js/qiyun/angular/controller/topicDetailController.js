primeApp.controller('topicInfoCtrl',function($scope,$location,myHttp){

	$scope.url = $location.absUrl();
	$scope.urlarr = $scope.url.split('/');
	$scope.id = $scope.urlarr[$scope.urlarr.length - 1];

	$scope.loading = {
		other: false
	};
	$scope.error = {
		other: true
	};
	$scope.empty = {
		other: true
	};
	$scope.setView = function (loading, error) {
		if (loading) $scope.loading[loading] = !$scope.loading[loading];
		if (error) $scope.error[error] = !$scope.error[error];
	};
	myHttp.getData('/research/getRelevantSubject').success(function (response) {
		if (response.type) {
			$scope.other = response.other;
			$scope.setView("other", false);
		} else {
			$scope.loading.other = !$scope.loading.other ;
			$scope.empty.other = !$scope.empty.other ;
		}
	})

	$scope.reload = function (key) {
		switch (key) {
			case "other":
				$scope.setView("other", "other");
				myHttp.getData('/research/getRelevantSubject').success(function (response) {
					if (response.type) {
						$scope.other = response.other;
						$scope.setView("other", false);
					} else {
						$scope.loading.other = !$scope.loading.other ;
						$scope.empty.other = !$scope.empty.other ;
					}
				}).error(function (error) {
					$scope.setView("other", "other");
				});
				break;
			case "content":
				$scope.content = false;
				$scope.contentmsg = true;
				$scope.contentblock = true;
				myHttp.getData('/lessonDetail/getTopicDetail/' + $scope.id).success(function (response) {
					$scope.content = response.content;
					$scope.contentblock = false;
				}).error(function (error) {
					$scope.content = true;
					$scope.contentmsg = false;
				});
				break;
		}
	};
    if($scope.id){
		$scope.content = false;
		$scope.contentmsg = true;
		$scope.contentblock = true;
		myHttp.getData('/lessonDetail/getTopicDetail/' + $scope.id).success(function (response) {
			$scope.content = response.content;
			$scope.contentblock = false;
		}).error(function (error) {
			$scope.content = true;
			$scope.contentmsg = false;
		});
    }
})