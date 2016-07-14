primeApp.controller('newsCtrl',function($scope,myHttp){

	//图片新闻
	$scope.imageNews = false;
	$scope.imageNewsmsg = true;
	$scope.imageNewsblock = true;
	myHttp.getData('/news/getImageNews').success(function (response) {
		$scope.imageNews = response.imageNews;
		$scope.imageNewsblock = false;
		// console.log(response.imageNews);
	}).error(function (error) {
		$scope.imageNews = true;
		$scope.imageNewsmsg = false;
	});
	//最热资讯
	$scope.hotNews = false;
	$scope.hotNewsmsg = true;
	myHttp.getData('/news/getHotNews').success(function (response) {
		$scope.hotNews = response.hotNews;
		// console.log(response.hotNews);
	}).error(function (error) {
		$scope.hotNews = true;
		$scope.hotNewsmsg = false;
	});	


    //教育资讯
 //    $scope.zixunload = true;
 //    $scope.zixunmsg = false;
 //    $scope.zixunempty = false;
    
	// myHttp.getData('/news/getZixun').success(function (response) {
 //    	if (response.status) {
 //            $scope.zixuns = response.zixuns;
 //            $scope.zixunload = false;
 //    	}else{
 //            $scope.zixunempty = true;
 //            $scope.zixunload = false;
 //    	}
	// }).error(function (error) {
 //    	$scope.zixunload = false;
 //    	$scope.zixunmsg = true;
	// });    

    //教育政策
 //    $scope.zhengcesload = true;
 //    $scope.zhengcesmsg = false;
 //    $scope.zhengcesempty = false;
    
	// myHttp.getData('/news/getZhence').success(function (response) {
 //    	if (response.status) {
 //            $scope.zhengces = response.zhengces;
 //            $scope.zhengcesload = false;
 //    	}else{
 //            $scope.zhengcesempty = true;
 //            $scope.zhengcesload = false;
 //    	}
	// }).error(function (error) {
 //    	$scope.zhengcesload = false;
 //    	$scope.zhengcesmsg = true;
	// });     


    $scope.reload = function(type){
    	switch(type) {
    		case "imageNews" :
				$scope.imageNews = false;
				$scope.imageNewsmsg = true;
				$scope.imageNewsblock = true;
				myHttp.getData('/news/getImageNews').success(function (response) {
					$scope.imageNews = response.imageNews;
					$scope.imageNewsblock = false;
				}).error(function (error) {
					$scope.imageNews = true;
					$scope.imageNewsmsg = false;
				});
    			break;	
    	    case "hotNews" :
				$scope.hotNews = false;
				$scope.hotNewsmsg = true;
				myHttp.getData('/news/getHotNews').success(function (response) {
					$scope.hotNews = response.hotNews;
				}).error(function (error) {
					$scope.hotNews = true;
					$scope.hotNewsmsg = false;
				});	    	    
    	        break;	
    // 	    case "zixuns":
			 //    $scope.zixunload = true;
			 //    $scope.zixunmsg = false;
			 //    $scope.zixunempty = false;
			    
				// myHttp.getData('/news/getZixun').success(function (response) {
			 //    	if (response.status) {
			 //            $scope.zixuns = response.zixuns;
			 //            $scope.zixunload = false;
			 //    	}else{
			 //            $scope.zixunempty = true;
			 //            $scope.zixunload = false;
			 //    	}
				// }).error(function (error) {
			 //    	$scope.zixunload = false;
			 //    	$scope.zixunmsg = true;
				// });     	    
    // 	        break;
    // 	    case "zhengces":
			 //    $scope.zhengcesload = true;
			 //    $scope.zhengcesmsg = false;
			 //    $scope.zhengcesempty = false;
			    
				// myHttp.getData('/news/getZhence').success(function (response) {
			 //    	if (response.status) {
			 //            $scope.zhengces = response.zhengces;
			 //            $scope.zhengcesload = false;
			 //    	}else{
			 //            $scope.zhengcesempty = true;
			 //            $scope.zhengcesload = false;
			 //    	}
				// }).error(function (error) {
			 //    	$scope.zhengcesload = false;
			 //    	$scope.zhengcesmsg = true;
				// });     	    	
    // 	    	break;
    	}    	
    }

    // $scope.reloadjs = function(){
    // 	$('script[src*="newsController.js"]').attr('src',$('script[src*="newsController.js"]').attr('src')+'&'+new Date().getTime());
    // }









})


primeApp.controller('zixunPageCtrl',function($scope,myHttp){
    var getZixun = function () {

        var postData = {
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }
        
        myHttp.postData('/news/getZixun',postData).success(function (response) {
            $scope.paginationConf.totalItems = response.count;
            $scope.zixuns = response.zixuns;
        });

    }

    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 15
    };

    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getZixun);	
})

primeApp.controller('zhengcePageCtrl',function($scope,myHttp){
    var getZhengce = function () {

        var postData = {
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }
        
        myHttp.postData('/news/getZhengce',postData).success(function (response) {
            $scope.paginationConf.totalItems = response.count;
            $scope.zhengces = response.zhengces;
        });

    }

    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 15
    };

    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getZhengce);
})

