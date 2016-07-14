primeApp.controller('expandResourceListCtrl',function($scope,myHttp){
	$scope.resourceBlock= false;
	$scope.resourceLoad= true;
	$scope.resourceLoadError = false;

	//获取 首次 加载列表页 前选择项
	$scope.selectiona={
		paraa:paraa,
		parab:parab,  //学段id
		parac:parac,  //类别id
		where:false,  //资源类型
		order:false   //排序类型
	}

    $scope.selectType = null;

    $scope.select = function(type,value,name) {

		$scope.resourceBlock= false;
		$scope.resourceLoad= true;
		$scope.resourceLoadError = false;

		$scope.selectiona.pageIndex = $scope.paginationConf.currentPage;
		$scope.selectiona.pageSize = $scope.paginationConf.itemsPerPage;

		if(type == 1){
			$scope.selectType = 1;

			//赋值当前选项
			$scope.selectiona.parab = value;

			//还原下级选项
			$scope.selectiona.parac = 0;
			$scope.selectiona.where = false;
			$scope.selectiona.order = false;
		}else if(type == 2){
			$scope.selectType = 2;

			//赋值当前选项
			$scope.selectiona.parac = value;

			//还原下级选项
			$scope.selectiona.where = false;
			$scope.selectiona.order = false;
		}else if(type == 3){
			$scope.selectType = 3;

			//赋值当前选项
			$scope.selectiona.where = (value==' and resourceType = 1' ? false : value );

			//还原下级选项
			$scope.selectiona.order = false;
		}else if(type == 4){
			$scope.selectType = 4;

			//赋值当前选项
			$scope.selectiona.order = value;
		}



		myHttp.postData('/resource/expandResourceListLoad', $scope.selectiona).success(function (list) {
			$scope.paginationConf.totalItems = list.count;
			$scope.pageShow = list.trueCount;
			console.log($scope.selectType);

			if($scope.selectType == 1){
				$scope.type = list.type;
				$scope.resourcetype = list.resourcetype;
				$scope.resource = list.resource;

				//定义导航栏
	            $scope.a = name;
	            $scope.b = $scope.type[0].selName;
			}else if($scope.selectType == 2){
				$scope.resourcetype = list.resourcetype;
				$scope.resource = list.resource;

				//定义导航栏
	            $scope.b = name;
			}else if($scope.selectType == 3){
				$scope.resource = list.resource;
			}else if($scope.selectType == 4){
				$scope.resource = list.resource;
			}else{
				$scope.section = list.section;
				$scope.type = list.type;
				$scope.resourcetype = list.resourcetype;
				$scope.resource = list.resource;

				//定义导航栏
	            $scope.a = $scope.section[0].sectionName;
	            $scope.b = $scope.type[0].selName;
			}



            //页面加载状态
			if (list.status) {
				$scope.resourceBlock = true;
				$scope.resourceLoad = false;
				$scope.resourceLoadError = false;
			} else {
				$scope.resourceBlock = false;
				$scope.resourceLoad = false;
				$scope.resourceLoadError = true;
			}

		}).error(function () {
			if (confirm('数据加载失败，请刷新页面重新加载！')) {
				//location.reload();
			} else {
				window.location.href = '/resource';
			}
		});
	}

	var selectss = function(){
		if ($scope.paginationConf.currentPage <= 0) {
			if($scope.paginationConf.currentPage = 1)
				$scope.select($scope.types,$scope.value,false);
		}else{
			$scope.select($scope.types,$scope.value,false);
		}
	}

	$scope.paginationConf = {
		currentPage: 1,
		itemsPerPage: 5
	};

	$scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', selectss); //点击选择分页

	//执行收藏
    $scope.doFav = function(resourceId){

    	myHttp.getData('/resource/doFav/'+resourceId+'/'+$scope.type).success(function (response) {
        	if (response == 2) {
             	window.location.href = '/';  //跳转到登陆页
        	}else if(response == 1){
    	        // $scope.fav--;
    	        alert('已取消收藏！');
        	}else if(response == 3){
    	        // $scope.fav++;
    	        alert('收藏成功！');
        	}
		}).error(function (error) {
			alert('操作失败，请重新尝试！');
		});
    }


});


















//select 学科 版本 册别 种别过多样式显示与隐藏
primeApp.directive("chapterList", [function () {
	return {
		link: function (scope, element, attrs) {

			element.toggle(
				function(){
			       $(this).children('.jt').html('▲');
			       $(this).parent().siblings('.li_sel_xk_m').slideToggle('1000');
			    },
			    function(){
			       $(this).children('.jt').html('▼');
			       $(this).parent().siblings('.li_sel_xk_m').slideToggle('1000');
			    }
			);

		}
	};
}]);


//学科 版本 测别 选中 样式
primeApp.directive("selSty",function(){
	return {
		link:function(scope,element,attrs){
        	
        	element.click(function(){
        		$(this).parents('.li_sel_con').find('.li_sel_xk_d_cn').removeClass("sel");
                $(this).addClass("sel");
        	});

		}
	}
})



//资源类别 选择 样式
primeApp.directive('resTy',function(){
	return {
		link:function(scope,element,sttrs){
	        element.click(function(){
           	    $(this).addClass('btm').siblings().removeClass('btm');
	        });
		}
	}
})