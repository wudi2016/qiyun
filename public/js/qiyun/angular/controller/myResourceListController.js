primeApp.controller('myResourceListController',function($scope,myHttp){
	$scope.resType = resType;

	var getMyRes = function(type){

		var postData = {
			pageIndex: $scope.paginationConf.currentPage,
			pageSize : $scope.paginationConf.itemsPerPage,
			resType  : $scope.resType
		}

		myHttp.postData('/perSpace/getResList',postData).success(function (response) {
			if(response.status){
				$scope.paginationConf.totalItems = response.count;
				$scope.res = response.res;
				//console.log($scope.res);
			}else{ //没有收藏

			}
		}).error(function (error) {

		});	

    }

	$scope.paginationConf = {
		currentPage: 1,
		itemsPerPage: 10
	};

	$scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getMyRes);

})


	