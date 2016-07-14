primeApp.factory("resourceDetailFactory", ["$http", function ($http) {

	var getOtherResurce = function () {
		return $http.get('/resource/getOtherResurce');
	};

	var getResourceCommet = function (id) {
		return $http.get('/resource/getResourceCommet/'+id);
	};

	return {
		getOtherResurce: function () {
			return getOtherResurce();
		},
		getResourceCommet: function (id) {
			return getResourceCommet(id);
		}
	};

}]);

primeApp.directive("starCount", [function () {
	return {
		link: function (scope, element, attrs) {
			var num = attrs.ngValue;
			var str = '★';
			var html = '';
			for (var i = 0; i < num; i++) {
				html += str;
			};
			element.html(html);
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

	// console.log($scope.data.detail);

	$scope.setView = function (loading, error) {
		if (loading) $scope.loading[loading] = !$scope.loading[loading];
		if (error) $scope.error[error] = !$scope.error[error];
	};

	// resourceDetailFactory.getOtherResurce().success(function (response) {
	// 	if (response.type) {
	// 		$scope.data.other = response.other;
	// 		$scope.setView("other", false);
	// 	} else {
	// 		// $scope.setView("other", "other");
	// 		$scope.loading.other = !$scope.loading.other ;
	// 		$scope.empty.other = !$scope.empty.other ;
	// 	}
    //
	// }).error(function (error) {
	// 	if (error)	$scope.setView("other", "other");
	// });

	// resourceDetailFactory.getResourceCommet($scope.resId).success(function (response) {
	// 	if (response.type) {
	// 		$scope.data.comment = response.comment;
	// 		$scope.data.commentCount = response.commentCount;
	// 		$scope.setView("comment", false);
	// 	} else {
	// 		$scope.loading.comment = !$scope.loading.comment ;
	// 		$scope.empty.comment = !$scope.empty.comment ;
	// 	}
	// }).error(function (error) {
	// 	if (error)	$scope.setView("comment", "comment");
	// });



    var getZixun = function () {

        var postData = {
        	id : $scope.resId,
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }
        
        myHttp.postData('/resource/getResourceCommet',postData).success(function (response) {
            $scope.paginationConf.totalItems = response.count;
            $scope.data.comment = response.comment;
            $scope.data.commentCount = response.count;
        });

    }

    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 5
    };

    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getZixun);	



	$scope.reload = function (key) {
		switch (key) {
			case "other":
				$scope.setView("other", "other");
				resourceDetailFactory.getOtherResurce().success(function (response) {
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
			case "comment":
				$scope.setView("comment", "comment");
				resourceDetailFactory.getResourceCommet().success(function (response) {
					if (response.type) {
						$scope.data.comment = response.comment;
						$scope.data.commentCount = response.commentCount;
						$scope.setView("comment", false);
					} else {
						// $scope.setView("comment", "comment");
						$scope.loading.comment = !$scope.loading.comment ;
			            $scope.empty.comment = !$scope.empty.comment ;
					}
				}).error(function (error) { 
					$scope.setView("comment", "comment"); 
				});
				
				break;
		}
	};

    
    // 获取 点赞 分享 收藏 数据
	myHttp.getData('/resource/getResourceFavDetail/'+$scope.resId).success(function (response) {
    	$scope.click = response[0].resourceClick;
    	$scope.fav = response[0].resourceFav;
    	$scope.share = response[0].resourceShare;
    	$scope.type = response[0].resourceType;
	})


	//执行点赞
    $scope.doClick = function(resourceId){
    	myHttp.getData('/resource/doClick/'+resourceId).success(function (response) {
        	if (response == 2) {
             	window.location.href = '/';  //跳转到登陆页
        	}else if(response == 1){
    	        // $scope.click--;
    	        alert('你已赞过！');
        	}else if(response == 3){
    	        $scope.click++;
        	}
		}).error(function (error) {
			alert('操作失败，请重新尝试！');
		});
    }


	//执行收藏
    $scope.doFav = function(resourceId){
    	myHttp.getData('/resource/doFav/'+resourceId+'/'+$scope.type).success(function (response) {
        	if (response == 2) {
             	window.location.href = '/';  //跳转到登陆页
        	}else if(response == 1){
    	        $scope.fav--;
        	}else if(response == 3){
    	        $scope.fav++;
        	}
		}).error(function (error) {
			alert('操作失败，请重新尝试！');
		});
    }

    //评论初始数据
    $scope.post = {
    	resourceId : '',
    	comment : ''
    }

    //发表评论
    $scope.postComment = function(resourceId){
    	$scope.post.resourceId = resourceId;

    	if ($scope.post.comment.length <= 50) {
	    	myHttp.postData('/resource/addResourceCommet',$scope.post).success(function(response){
	    	    $scope.post.comment = '';
	        	if (response == 2) { //请登录
	        		if(confirm('请登录后再评论！'))
	                window.location.href="/";
	        	}else if(response == 3){ //评论不能为空
	                alert('评论不能为空！');
	        	}else if(response == 0){ //评论失败
	                alert('评论失败，请重新尝试！');
	        	}else if(response == 1){ //成功
	            	getZixun();
	            	$scope.post.comment = '';
	        	}
	    	}).error(function(error){
	        	alert('评论失败，请重新尝试！');
	    	});
    	}else{
        	alert('评论内容限制在50字内');
    	}
    }



    //点击举报按钮弹出 提交表单
    $scope.doinformant  = function(){
    	// $('.background_color').removeClass('none');
    	// $('.informant').removeClass('none');
    	
    	$('.background_color').fadeIn("slow");
    	$('.informant').slideDown();
    }
    //取消举报
    $scope.cancelInformant = function(){
      	//清空数据
      	$scope.upData.type = 0;
      	$scope.upData.content = '';
        //去除浮框
    	$('.background_color').fadeOut("slow");
    	$('.informant').slideUp();    	
    } 

    //提交举报
    $scope.postInformant = function(){
        //判断 提交是否为空
    	if (!$scope.upData.content) {
    		return false;
    	}else{
            //去除弹出表单
        	$('.informant').slideUp("fast");
        	//获取举报资讯id
        	$scope.upData.resourceId = $scope.resId;

		    myHttp.postData('/resource/doinformant',$scope.upData).success(function (response) {
                if(response == 1){
					alert('您已举报过该资源！');
					//去除弹出 灰背景
					$('.background_color').fadeOut("fast");
				}else if(response == 3){
                    alert('操作失败，请重试！');
                    //去除弹出 灰背景
                    $('.background_color').fadeOut("fast");
            	}else{
            		//清空数据
			      	$scope.upData.type = 0;
			      	$scope.upData.content = '';
            		alert('已提交！');
            		//去除弹出 灰背景
                    $('.background_color').fadeOut("fast");
            	}
			}).error(function (error) {

			});
	    	console.log($scope.upData);
    	}
    }


    //删除评论
    $scope.delResourceCommet = function(id){
	    myHttp.getData('/resource/delResourceCommet/'+id).success(function (response) {
            
            if(response == 1){
                getZixun();
        	}else{
                alert('操作失败，请重新尝试！');
        	}

		}).error(function (error) {
            alert('操作失败，请重新尝试！');
		});

    }



}]);


