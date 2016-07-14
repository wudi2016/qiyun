primeApp.controller('myMicrolessonListController',function($scope,myHttp){
	$scope.micType = micType;
	// console.log($scope.micType);


	var getMyMicro = function(type){

		var postData = {
			pageIndex: $scope.paginationConf.currentPage,
			pageSize : $scope.paginationConf.itemsPerPage,
			micType  : $scope.micType
		}

		myHttp.postData('/perSpace/getMicroList',postData).success(function (response) {
			if(response.status){
				$scope.paginationConf.totalItems = response.count;
				$scope.res = response.res;
			}else{ //没有收藏

			}
		}).error(function (error) {

		});	

    }

	$scope.paginationConf = {
		currentPage: 1,
		itemsPerPage: 10
	};

	$scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getMyMicro);

})


	