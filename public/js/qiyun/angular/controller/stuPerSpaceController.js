primeApp.controller('stuPerSpaceCtrl',function($scope,myHttp){
	// 获取当前登录用户信息
	
    myHttp.getData('/perSpace/getUserInfo').success(function (response) {
		$scope.stuInfo ={
			username:response.username,
			realname:response.realname,
			sex:response.sex,
			phone:response.phone,
			IDcard:response.IDcard,
			grade:response.grade,
			pic:response.pic,
			email:response.email,
			class:response.class,
			sno:response.sno,
			stuType:response.stuType,
			nationId:response.nationId
		}
    	console.log($scope.stuInfo);
        
	}).error(function (error) {
        alert('抱歉，用户信息获取失败，请刷新重试！');
	});


	$scope.getMyCollect = function(){
		//获取收藏
		$scope.content  = false;
		$scope.loading  = true;
		$scope.errormeg = false;
		$scope.reload   = false;
		myHttp.getData('/perSpace/getCollect').success(function (response) {
			if(response.status){
				$scope.collect = response.data;

				$scope.content  = true;
				$scope.loading  = false;
				$scope.errormeg = false;
				$scope.reload   = false;

			}else{ //没有收藏
				$scope.content  = false;
				$scope.loading  = false;
				$scope.errormeg = true;
				$scope.reload   = false;
			}
			console.log(response.data);
		}).error(function (error) {
			$scope.content  = false;
			$scope.loading  = false;
			$scope.errormeg = false;
			$scope.reload   = true;
		});
	}

	$scope.collectDetail = function(url,isdel){
		if(!isdel){
			alert('该资源已被删除！');
		}else {
			window.location.href = url;
		}
	}

    //重新加载
	$scope.reloadfunc = function(type){
    	switch(type) {
    		case "collect" :
			    $scope.content  = false;
			    $scope.loading  = true;
			    $scope.errormeg = false;
				$scope.reload   = false;
				myHttp.getData('/perSpace/getCollect').success(function (response) {
					if(response.status){
						$scope.collect = response.data;

			            $scope.content  = true;
					    $scope.loading  = false;
					    $scope.errormeg = false;
						$scope.reload   = false;

					}else{ //没有收藏
						$scope.collect = false;
			            $scope.content  = false;
					    $scope.loading  = false;
					    $scope.errormeg = true;
						$scope.reload   = false;
					}
				}).error(function (error) {
			            $scope.content  = false;
					    $scope.loading  = false;
					    $scope.errormeg = false;
						$scope.reload   = true;
				});
    			break;		
	    }
	}

	//单文件 删除收藏
	$scope.delCollect = function(id){
		if(confirm('确定删除吗？')){
			myHttp.postData('/perSpace/delCollect',id).success(function (response) {
				if(response){
					//重新加载 收藏
					$scope.reloadfunc('collect');
					alert('删除成功');
				}else{
					alert('删除失败');
				}
			}).error(function (error) {
				alert('请求失败，请重新操作！');
			});
		}

	}

	//全选
	$scope.checkall = false;
	$scope.checkAll = function(a){
		//console.log($scope.checkall);
		$scope.checkall = !$scope.checkall;
		if($scope.checkall) {
			for (var i in a) {
				$scope.ids[a[i].id] = true;
			}
		}else{
			for (var i in a) {
				$scope.ids[a[i].id] = false;
			}
		}
	}

	//多文件删除 收藏
	$scope.ids = {};

	$scope.mutidelCollect = function () {

		//console.log($scope.ids);
		//return false;
		myHttp.postData('/perSpace/mutidelCollect', $scope.ids).success(function (response) {
			console.log($scope.ids);
			if (response.stat) {
				$scope.reloadfunc('collect');
				alert("请选择删除项！");
				return;
			}

			if (response.status) {
				//重新加载 收藏
				$scope.reloadfunc('collect');
				alert('删除成功');
				$scope.ids = {};
			} else {
				alert('有' + response.num + '条删除失败');
			}
		}).error(function (error) {
			alert('请求失败，请重新操作！');
		});

	}



	myHttp.getData('/perSpace/systemMessage').success(function (response) {
		if(response.status){
			$scope.msg = response.msg;
		}else{

		}

	}).error(function (error) {

	});

	$scope.insert = function(id,resourceType,url,resourceCheck){
		if(resourceType == '资源'){
				if(resourceCheck == '0'){
					location.href = url;
				}else if(resourceCheck == '1'){
					alert('该资源正在审核中');
				}else if(resourceCheck == '2'){
					alert('该资源未通过审核');
				}
		}else if(resourceType == '协作组' || resourceType == '主题' || resourceType == '备课' || resourceType == '评课'){
			alert('抱歉，只有教师才可以参与');
		}
	}

})
