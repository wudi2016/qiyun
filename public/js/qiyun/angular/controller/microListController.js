primeApp.controller("microListController", ["$scope","myHttp", function ($scope,myHttp) {
	$scope.micLoad= true;
	$scope.micBlock= false;
	$scope.micLoadError = false;

	$scope.sum = 0;

    //获取微课类型
    myHttp.getData('/microLesson/getSelMenus').success(function (response) {
		$scope.primary = response.primary;
		$scope.junior = response.junior;
		$scope.high = response.high;
	});


    //默认选项
    $scope.postdata = {
    	'grade'   : ' where 1 = 1 ',
    	'micType' : false,
        'order' : ' order by id desc '
    }

    //选择
    $scope.select = function(type,value){
    	//type 1-3 表示选择的是小初高，4是类型，5是排序
    	// alert(type+':'+id);

		$scope.types = type;
		$scope.value = value;

		$scope.postdata.pageIndex = $scope.paginationConf.currentPage;
		$scope.postdata.pageSize = $scope.paginationConf.itemsPerPage;

		$scope.micLoad= true;
		$scope.micBlock= false;
		$scope.micLoadError = false;

    	if(type ==1 || type == 2 || type ==3){
    		//将类别中 全部 选中
        	$('.li_con_r_top_ls').removeClass('btm');
        	$('.li_con_r_top_ls').eq(0).addClass('btm');
        	//将排序中 综合 选中
        	$('.li_con_r_or_d').removeClass('li_con_r_or_d_2');
        	$('.li_con_r_or_d').eq(0).addClass('li_con_r_or_d_2');
            
            //将提交数据重新赋值
            $scope.postdata.grade = value;
            $scope.postdata.micType = false;
            $scope.postdata.order = 'order by id desc';
    	}else if (type == 4) {
        	//将排序中 综合 选中
        	$('.li_con_r_or_d').removeClass('li_con_r_or_d_2');
        	$('.li_con_r_or_d').eq(0).addClass('li_con_r_or_d_2');

            //将提交数据重新赋值
            $scope.postdata.micType = value;
            $scope.postdata.order = 'order by id desc';
    	}else if(type == 5){
            //将提交数据重新赋值
            $scope.postdata.order = value;
    	}

        //给提交数据中添加选择类型
        $scope.postdata.seltype = type;
	    myHttp.postData('/microLesson/getMicLessons',$scope.postdata).success(function (response) {
			$scope.paginationConf.totalItems = response.count;
			if(response.count>0){
				$scope.sum = response.count;
			}else{
				$scope.sum = 0;
			}
			//$scope.sum = response.count;

			if(response.status){
				$scope.micLessons = response.data;
				//console.log($scope.micLessons);
				$scope.micLoad= false;
				$scope.micBlock= true;
				$scope.micLoadError = false;
			}else{
	            //没有数据
				$scope.micLoad= false;
				$scope.micLoadError = true;
			}
		}).error(function (error) {
			$scope.micLoad= false;
			$scope.micBlock= false;
			$scope.micLoadError = true;
		});
    }



	var selectss = function(){
		if ($scope.paginationConf.currentPage <= 0) {
			$scope.paginationConf.currentPage = 1;
			//alert('等于0了');
		};
		// console.log($scope.paginationConf.currentPage);
		$scope.select($scope.types,$scope.value);
	}

	$scope.paginationConf = {
		currentPage: 1,
		itemsPerPage: 5
	};

	$scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', selectss); //点击选择分页


}]);






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
				$('.li_sel_xk_d_cn').removeClass("sel");
				$('.li_sel_xk_d_cn2').removeClass("sel");
				$('.li_sel_xk_d_cn3').removeClass("sel");
				$(this).addClass("sel");
			});

		}
	}
})