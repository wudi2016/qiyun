 primeApp.controller('searchCtrl',function($scope,$location,myHttp){
    if (searchType == '资讯') {
    	$scope.preurl = '/news/newsDetail/';
    }else if(searchType == '资源'){
    	$scope.preurl = '/resource/resourceDetail/';
    }else if (searchType == '微课') {
    	$scope.preurl = '/microLesson/microLessonDetail/';
    }
})


primeApp.controller('zixunPageCtrl',function($scope,myHttp){

    if (searchType == '资讯') {
    	$scope.posturl = '/index/searchNews';
    }else if(searchType == '资源'){
    	$scope.posturl = '/index/searchResorces';
    }else if (searchType == '微课') {
    	$scope.posturl = '/index/searchMicLessons';
    }

    $scope.searchValue = searchValue;

    var getZixun = function () {

        var postData = {
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage,
            searchValue : $scope.searchValue,
        }
        
        myHttp.postData($scope.posturl,postData).success(function (response) {
            $scope.paginationConf.totalItems = response.count;
            $scope.resoults = response.resoults;
            console.log(response.resoults);

        });

    }

    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 15
    };

    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getZixun);	
})




