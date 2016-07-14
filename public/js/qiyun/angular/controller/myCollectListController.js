primeApp.controller('myCollectListController',function($scope,myHttp){

	var getMyCollect = function(){

		var postData = {
			pageIndex: $scope.paginationConf.currentPage,
			pageSize : $scope.paginationConf.itemsPerPage,
		}

		myHttp.postData('/perSpace/myCollect',postData).success(function (response) {
			if(response.status){
				$scope.paginationConf.totalItems = response.count;
				$scope.res = response.res;
				// console.log($scope.res);
			}else{ //没有收藏

			}
		}).error(function (error) {

		});	

    }

	$scope.paginationConf = {
		currentPage: 1,
		itemsPerPage: 10
	};

	//单文件 删除收藏
    $scope.delCollect = function (id) {
        var res = confirm('确定删除吗？');
        if (res) {
            myHttp.postData('/perSpace/delCollect', id).success(function (response) {
                if (response) {
                    alert('删除成功');
	                    var postData = {
							pageIndex: $scope.paginationConf.currentPage,
							pageSize : $scope.paginationConf.itemsPerPage,
						}

						myHttp.postData('/perSpace/myCollect',postData).success(function (response) {
							if(response.status){
								$scope.paginationConf.totalItems = response.count;
								$scope.res = response.res;
								// console.log($scope.res);
							}else{ //没有收藏

							}
						}).error(function (error) {

						});	
                } else {
                    alert('删除失败');
                }
            }).error(function (error) {
                alert('请求失败，请重新操作！');
            });
        }
    }
	$scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getMyCollect);

})


	