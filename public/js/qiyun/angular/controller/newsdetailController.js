primeApp.controller('newsdetailCtrl',function($scope,$location,$sce,myHttp){

    //首次 加载页面 获取当前打开资讯 id 以及 上下页获取当前资讯id  ，便于举报获取资讯id
    newsId = newId; 

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

	//新闻详情
	$scope.url = $location.absUrl();
	$scope.urlarr = $scope.url.split('/');
	$scope.id = $scope.urlarr[$scope.urlarr.length - 1];
	
	if($scope.id){  
		$scope.content = false;
		$scope.contentmsg = true;
		$scope.contentblock = true;
		myHttp.getData('/news/getContent/' + $scope.id).success(function (response) {
			$scope.content = response.content;
			$scope.content.content = $sce.trustAsHtml($scope.content.content);
			$scope.contentblock = false;
		}).error(function (error) {
			$scope.content = true;
			$scope.contentmsg = false;
		});	
	}


	$scope.newsClic = function(id){

        //点击资讯id 赋给 当前打开资讯id变量 便于举报获取资讯id
        newsId = id;

		$scope.content = false;
		$scope.contentmsg = true;
		$scope.contentblock = true;
		myHttp.getData('/news/getContent/' + id).success(function (response) {
			$scope.content = response.content;
			$scope.content.content = $sce.trustAsHtml($scope.content.content);
			$scope.contentblock = false;
		}).error(function (error) {
			$scope.content = true;
			$scope.contentmsg = false;
		});	

	}



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
    	    case "content":
    	        $scope.content = false;
				$scope.contentmsg = true;
				$scope.contentblock = true;
				myHttp.getData('/news/getContent/' + $scope.id).success(function (response) {
					$scope.content = response.content;
					$scope.content.content = $sce.trustAsHtml($scope.content.content);
					$scope.contentblock = false;
				}).error(function (error) {
					$scope.content = true;
					$scope.contentmsg = false;
				});	
    	    	break;
    	}    	
    }


    //点击举报按钮弹出 提交表单
    $scope.doinformant  = function(type){

        if(!type){
			if(confirm('请登录！'))
			window.location.href = '/';
        }else{
	    	$('.background_color').fadeIn("slow");
	    	$('.informant').slideDown();
        }

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
        	$scope.upData.newsId = newsId;

		    myHttp.postData('/news/doinformant',$scope.upData).success(function (response) {
            	if (response == 1) {
            		//清空数据
			      	$scope.upData.type = 0;
			      	$scope.upData.content = '';
            		//alert('请登录！');
					if(confirm('请登录！'))
            		window.location.href = '/';
            	}else if(response == 3){
                    alert('操作失败，请重试！');
                    //去除弹出 灰背景
                    $('.background_color').fadeOut("fast");
            	}else if(response == 4){
					alert('您已举报过该资讯！');
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
    //取消举报
    $scope.cancelInformant = function(){
      	//清空数据
      	$scope.upData.type = 0;
      	$scope.upData.content = '';
        //去除浮框
    	$('.background_color').fadeOut("slow");
    	$('.informant').slideUp();    	
    }  




})