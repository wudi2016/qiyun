primeApp.controller('topicInfoCtrl',function($scope,$location,$sce,myHttp){

	$scope.url = $location.absUrl();
	$scope.urlarr = $scope.url.split('/');
	$scope.id = $scope.urlarr[$scope.urlarr.length - 1];

	//$scope.list = false;
	//$scope.listmsg = true;
	//$scope.listblock = true;
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
	myHttp.getData('/research/getRelevantDepartment').success(function (response) {
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
				myHttp.getData('/research/getRelevantDepartment').success(function (response) {
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
				myHttp.getData('/research/getTopicInfo/' + $scope.id).success(function (response) {
					$scope.content = response.content;
					$scope.content.content = $sce.trustAsHtml($scope.content.content);
					$scope.contentblock = false;
				}).error(function (error) {
					$scope.content = true;
					$scope.contentmsg = false;
				});
				break;
		}
	};
    //var getGroupListPage = function () {
    //
		//var postData = {
		//	pageIndex: $scope.paginationConf.currentPage,
		//	pageSize: $scope.paginationConf.itemsPerPage
		//}
    //
		//myHttp.postData('/research/getTopicList/' + $scope.id,postData).success(function (response) {
		//	$scope.list = response.list;
		//	$scope.listblock = false;
    //
		//	$scope.paginationConf.totalItems = response.total;
		//}).error(function (error){
		//	$scope.list = true;
		//	$scope.listmsg = false;
		//});
    //
    //}
    //
    //$scope.paginationConf = {
		//currentPage: 1,
		//itemsPerPage: 12
    //};
    //$scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getGroupListPage);
    //
    if($scope.id){
		$scope.content = false;
		$scope.contentmsg = true;
		$scope.contentblock = true;
		myHttp.getData('/research/getTopicInfo/' + $scope.id).success(function (response) {
			$scope.content = response.content;
			$scope.content.content = $sce.trustAsHtml($scope.content.content);
			$scope.realname = response.realname;
			$scope.contentblock = false;
		}).error(function (error) {
			$scope.content = true;
			$scope.contentmsg = false;
		});
    }
    //
    //
    //$scope.newsClic = function(id){
		//$scope.content = false;
		//$scope.contentmsg = true;
		//$scope.contentblock = true;
		//myHttp.getData('/research/getTopicInfo/' + id).success(function (response) {
		//	$scope.content = response.content;
		//	$scope.content.content = $sce.trustAsHtml($scope.content.content);
		//	$scope.contentblock = false;
		//}).error(function (error) {
		//	$scope.content = true;
		//	$scope.contentmsg = false;
		//});
    //
    //}
    //$scope.reload = function(type){
    //	switch(type) {
    //	    case "content":
    //	        $scope.content = false;
		//		$scope.contentmsg = true;
		//		$scope.contentblock = true;
		//		myHttp.getData('/research/getTopicInfo/' + $scope.id).success(function (response) {
		//			$scope.content = response.content;
		//			$scope.content.content = $sce.trustAsHtml($scope.content.content);
		//			$scope.contentblock = false;
		//		}).error(function (error) {
		//			$scope.content = true;
		//			$scope.contentmsg = false;
		//		});
    //	    	break;
		//	case "list":
		//		$scope.list = false;
		//		$scope.listmsg = true;
		//		$scope.listblock = true;
		//		var postData = {
		//			pageIndex: $scope.paginationConf.currentPage,
		//			pageSize: $scope.paginationConf.itemsPerPage
		//		}
    //
		//		myHttp.postData('/research/getTopicList/' + $scope.id,postData).success(function (response) {
		//			$scope.list = response.list;
		//			$scope.listblock = false;
    //
		//			$scope.paginationConf.totalItems = response.total;
		//		}).error(function (error){
		//			$scope.list = true;
		//			$scope.listmsg = false;
		//		});
    //
		//}
    //}
})