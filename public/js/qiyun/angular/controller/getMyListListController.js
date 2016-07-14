primeApp.controller('getMyListListController',function($scope,myHttp){
	
	$scope.module = module;
	
	console.log($scope.module);

	var getMyRes = function(type){

		var postData = {
			pageIndex: $scope.paginationConf.currentPage,
			pageSize : $scope.paginationConf.itemsPerPage,
			module   : $scope.module
		}

		myHttp.postData('/perSpace/getMyListList',postData).success(function (response) {
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


	