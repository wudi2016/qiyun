primeApp.controller('resourceListCtrl',function($scope,myHttp){
    $scope.resourceBlock= false;
    $scope.resourceLoad= true;
	$scope.resourceLoadError = false;

    //获取 首次 加载列表页 前选择项
    $scope.selectiona={
    	sectionId:sectionId,
    	subjectId:subjectId,
    	editionId:editionId
    }
    //初始化分页 参数
    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 5,
        currentPageb: 1,
        itemsPerPageb: 5
    };

   //定义默认选择值
    $scope.selection = {
    	subject:'',
    	edition:'',
    	grade  :'',
    	chapter: false,
		resourceType: false,
		orderBy: false,
		pageIndex: $scope.paginationConf.currentPage,
        pageSize: $scope.paginationConf.itemsPerPage
    }

    //定义导航栏
    $scope.a = '';
    $scope.b = '';
    $scope.c = '';

    var bb = function(){   
    	// 将分页参数 加入提交数据
        $scope.selectiona.pageIndex = $scope.paginationConf.currentPageb;
        $scope.selectiona.pageSize = $scope.paginationConf.itemsPerPageb;

		myHttp.postData('/resource/resourceListLoad',$scope.selectiona).success(function (list) {

            $scope.paginationConf.totalItems = list.count;
			$scope.pageShow = list.trueCount;

			//学课
			$scope.subject = list.subject;
			if (list.subject2.length == 0) {
		        $scope.subjectMore = false;
			}else{
		        $scope.subjectMore = true;
				$scope.subject2 = list.subject2;
			}
			//版本
			$scope.edition = list.edition;
			if (list.edition2.length == 0) {
		        $scope.editionMore = false;
			}else{
		        $scope.editionMore = true;
				$scope.edition2 = list.edition2;
			}
			//冊别
			$scope.grade = list.grade;
			if (list.grade2.length == 0) {
		        $scope.gradeMore = false;
			}else{
		        $scope.gradeMore = true;
				$scope.grade2 = list.grade2;
			}

			//教材目录
			$scope.chapter = list.chapter;
		    
		    //资源类型
		    $scope.resourcetype = list.resourcetype;

		    //资源 
		    $scope.resource = list.resource;
		    if(list.status){
			    $scope.resourceLoad= false;
			    $scope.resourceBlock= true;
				$scope.resourceLoadError = false;    
		    }else{
		    	$scope.resourceLoad= false;
			    $scope.resourceBlock= false;
				$scope.resourceLoadError = true;   
		    }
		    // console.log($scope.resource);


		   //定义默认选择值
	    	$scope.selection.subject=$scope.subject[0].id;
	    	$scope.selection.edition=$scope.edition[0].id;
	    	$scope.selection.grade  =$scope.grade[0].id;


            //定义导航栏
            $scope.a = $scope.subject[0].subjectName;
            $scope.b = $scope.edition[0].editionName;
            $scope.c = $scope.grade[0].gradeName;

            // 将首次选择项 赋给 列表页选择项方法的参数，以便使点击分页生效
		    if(sectionId && subjectId && editionId){
		        $scope.types = 2;
		        $scope.idvalue = $scope.edition[0].id;
		    }else if(sectionId && subjectId && !editionId){
		        $scope.types = 1;
		        $scope.idvalue = $scope.subject[0].id;
		    }else{
		        $scope.types = 1;
		        $scope.idvalue = $scope.subject[0].id;
		    }
            // alert($scope.selection.subject);
		}).error(function(){
	        if (confirm('数据加载失败，请刷新重新加载！')) {
	            location.reload() ;
	        }else{
	            window.location.href='/resource';
	        }
		});
    };


   //定义默认选择值
  //   $scope.selection = {
  //   	subject:$scope.subject[0].id,
  //   	edition:$scope.edition[0].id,
  //   	grade  :$scope.grade[0].id,
  //   	chapter: false,
		// resourceType: false,
		// orderBy: false,
		// pageIndex: $scope.paginationConf.currentPage,
  //       pageSize: $scope.paginationConf.itemsPerPage
  //   }

  //   $scope.selection = {
  //   	subject:'',
  //   	edition:'',
  //   	grade  :'',
  //   	chapter: '',
		// resourceType: '',
		// orderBy: '',
		// pageIndex: '',
  //       pageSize: ''
  //   }










    $scope.postData = function(clickType){
        
		myHttp.postData('/resource/resourceListSelect',$scope.selection).success(function (response) {
            
		    $scope.resourceLoad= false;
		    $scope.resourceBlock= true;
			$scope.resourceLoadError = false;

            $scope.paginationConf.totalItems = response.count;
			$scope.pageShow = response.trueCount;

            if(!response.status){
    		    $scope.resourceLoad= false;
			    $scope.resourceBlock= false;
				$scope.resourceLoadError = true;
            }

            // 判断选择项 并将 结果重新赋值
		    switch (clickType) {
				case 1:
					//版本
					$scope.edition = response.edition;
					$scope.selection.edition = response.edition[0].id;
					// console.log(response.edition[0].id);
					if (response.edition2.length == 0) {
				        $scope.editionMore = false;
					}else{
				        $scope.editionMore = true;
						$scope.edition2 = response.edition2;
					}
					//冊别
					$scope.grade = response.grade;
					$scope.selection.grade = response.grade[0].id;
					if (response.grade2.length == 0) {
				        $scope.gradeMore = false;
					}else{
				        $scope.gradeMore = true;
						$scope.grade2 = response.grade2;
					}

					//教材目录
					$scope.chapter = response.chapter;
				    
				    //资源类型
				    $scope.resourcetype = response.resourcetype;

				    //资源 
				    $scope.resource = response.resource;

	                //定义导航栏
		            $scope.b = $scope.edition[0].editionName;
		            $scope.c = $scope.grade[0].gradeName;
					break;
				case 2:
					//冊别
					$scope.grade = response.grade;
					$scope.selection.grade = response.grade[0].id;
					// console.log(response.grade[0].id);
					if (response.grade2.length == 0) {
				        $scope.gradeMore = false;
					}else{
				        $scope.gradeMore = true;
						$scope.grade2 = response.grade2;
					}

					//教材目录
					$scope.chapter = response.chapter;
				    
				    //资源类型
				    $scope.resourcetype = response.resourcetype;

				    //资源 
				    $scope.resource = response.resource;

	                //定义导航栏
		            $scope.c = $scope.grade[0].gradeName;
					break;
				case 3:
					//教材目录
					$scope.chapter = response.chapter;
				    
				    //资源类型
				    $scope.resourcetype = response.resourcetype;

				    //资源 
				    $scope.resource = response.resource;
					break;
				case 4:
					//资源 
				    $scope.resource = response.resource;
					break;
				case 5:
				    //资源 
				    $scope.resource = response.resource;	    
					break;
				case 6:	       
				    //资源 
				    $scope.resource = response.resource;					
					break;	    	
		    }

            // console.log($scope.selection);

		}).error(function (error) {
		    $scope.resourceLoad= false;
		    $scope.resourceBlock= false;
			$scope.resourceLoadError = true;
		});
    }



    $scope.select = function(clickType,idvalue,selname){
		// console.log(clickType+","+idvalue);
    	//将选择项 赋 给 分页参数，以便点击分页生效
        $scope.types = clickType;
        $scope.idvalue = idvalue;
        // 将分页配置 加 到 提交数据中
        $scope.selection.pageIndex = $scope.paginationConf.currentPage;
        $scope.selection.pageSize = $scope.paginationConf.itemsPerPage;

        //console.log($scope.types+':'+$scope.idvalue+':'+$scope.paginationConf.currentPage );

	    $scope.resourceBlock= false;
	    $scope.resourceLoad= true;
		$scope.resourceLoadError = false;  

    	//修改选择项 并 发送最终选择项
	    switch (clickType) {
			case 1:
        	    $scope.selection.level = 1;
        	    $scope.selection.subject = idvalue;

				//清空 教材目录 资源类型 排序顺序 等选项
				$scope.selection.chapter = false;
				$scope.selection.resourceType = false;
				$scope.selection.orderBy = false;

                //定义导航栏
	            $scope.a = selname;

				$scope.postData(clickType);
				break;
			case 2:
        	    $scope.selection.level = 2;
        	    $scope.selection.edition = idvalue;

				//清空 教材目录 资源类型 排序顺序 等选项
				$scope.selection.chapter = false;
				$scope.selection.resourceType = false;
				$scope.selection.orderBy = false;

                //定义导航栏
	            $scope.b = selname;

				$scope.postData(clickType);
				break;
			case 3:
        	    $scope.selection.level = 3;
        	    $scope.selection.grade = idvalue;

				//清空 教材目录 资源类型 排序顺序 等选项
				$scope.selection.chapter = false;
				$scope.selection.resourceType = false;
				$scope.selection.orderBy = false;

                //定义导航栏
	            $scope.c = selname;

				$scope.postData(clickType);
				break;
			case 4:
        	    $scope.selection.level = 4;
        	    $scope.selection.chapter = idvalue;
				$scope.postData(clickType);
				break;
			case 5:
        	    $scope.selection.level = 5;
        	    $scope.selection.resourceType = (idvalue==' and resourceType = 1' ? false : idvalue );
				$scope.postData(clickType);
				break;
			case 6:
        	    $scope.selection.level = 6;
        	    $scope.selection.orderBy = idvalue;
				$scope.postData(clickType);
				break;	  	
	    }
    }



    var aa = function(){
	     if ($scope.types == 1) {
	 	 	$scope.nn = $scope.a;
	 	 }else if($scope.types == 2){
	 	 	$scope.nn = $scope.b;
	 	 }else if ($scope.types == 3) {
	 	 	$scope.nn = $scope.c;
	 	 }

    	 if ($scope.paginationConf.currentPage <= 0) {
    	 	 if($scope.paginationConf.currentPage = 1){  
    	         $scope.select($scope.types,$scope.idvalue,$scope.nn);
    	     }
    	 }else{
    	     $scope.select($scope.types,$scope.idvalue,$scope.nn);
    	 }
    }

    //列表页点击选项 分页
    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage',aa);	
    
    //首次加载列表页 分页
    $scope.$watch('paginationConf.currentPageb + paginationConf.itemsPerPageb',bb);	



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


//教材目录样式
primeApp.directive('chapSty',function(){
	return {
		link:function(scope,element,attrs){
        	element.click(function(){
        		$(this).parent().next('.li_con_l_list_cont').slideToggle();
        	});

        	element.toggle(
			    function(){
			       // $(this).children('.jt2').html('▲');
			       $(this).html('▲');
			    },
			    function(){
			       // $(this).children('.jt2').html('▼');
			       $(this).html('▼');
			    }
		    );
		}
	}
});

primeApp.directive('shapStyt',function(){
	return {
		link:function(scope,element,sttrs){
	        element.click(function(){
			    $('.li_con_l_list_cont_d').removeClass("li_con_l_list_cont_d_2");
			    $(this).addClass("li_con_l_list_cont_d_2");	        	
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