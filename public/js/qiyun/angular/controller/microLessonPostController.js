primeApp.controller("microLessonPostController", ["$scope","myHttp", function ($scope,myHttp) {

	//微课选择列表
	$scope.micLesson = list;
	console.log($scope.micLesson);

	//定义默认选择值
	$scope.selection = {
		section:1,
		grade  :$scope.micLesson.grade[0].id,
		subject:$scope.micLesson.subject[0].id
	}

	$scope.upData = {
		section:1,
		grade  :$scope.selection.grade,
		subject:$scope.selection.subject,

		path   : '',
		name   : '',
		descirpt : '',
		coverPic: '',
		headPic : '',
		type   :  ''
	};

	// 年级列表
	$scope.grade   = $scope.micLesson.grade;
	// 学科列表
	$scope.subject   = $scope.micLesson.subject;

	$scope.postSel = function(type){

		myHttp.postData('/microLesson/microLessonSelect',$scope.selection).success(function (response) {

            // 判断选择项 并将 结果重新赋值
		    switch (type) {
				case 1:
					//grade
					$scope.grade = response.grade;
				    
				    //subject
				    $scope.subject = response.subject;

					$scope.upData.grade = response.grade[0].id;
					$scope.upData.subject = response.subject[0].id;
					// console.log($scope.selection.grade,$scope.selection.subject);
					break;
				case 2:
				    //subject
				    $scope.subject = response.subject;

					$scope.upData.subject = response.subject[0].id;
					// console.log($scope.selection.grade,$scope.selection.subject);

					break;
		    }

		}).error(function (error) {

		});		

	}    

    $scope.select = function(type,id){

    	switch(type){
        	case 1:
        	    $scope.selection.level = 1;
                $scope.selection.section = id;
				$scope.upData.section = id;
                $scope.postSel(type);
        		break;
        	case 2:
        	    $scope.selection.level = 2;
                $scope.selection.grade = id;
				$scope.upData.grade = id;

				$scope.postSel(type);
        		break; 
        	case 3:
        	    $scope.selection.level = 3;
                $scope.selection.subject = id;
				$scope.upData.subject = id;

				$scope.postSel(type);
        		break;         		       	
    	}
    	console.log($scope.selection);
    };

	$scope.postData = function(){
		$scope.upData.path = micLessonPath;
		$scope.upData.headPic = headPic;
		$scope.upData.coverPic = coverPic;


		if(!$scope.upData.path){
			alert('请选择微课！');
		}else if(!$scope.upData.name){
			alert('请选填写微课名称！');
		}else if(!$scope.upData.descirpt){
			alert('请填写微课简介！');
		}else{
			//console.log($scope.upData);
			$scope.upData.addTime = new Date().getTime();

			myHttp.postData('/microLesson/microLessonAdd',$scope.upData).success(function (response) {
            	if(response.status == true){
					//response.id  //上传成功微课id
					alert('上传成功！');
					window.location.href="/microLesson";
				}else if(response.status == 'yes'){
            		alert('您已上传过同名微课');
				}else{
					alert('上传失败！');
				}
			}).error(function (error) {
				alert('上传失败！');
			});
		}
	}

	$scope.reset = function(){
		location.reload([true]);
	}




}]);







//select 样式
primeApp.directive("checkSel", [function () {
	return {
		link: function (scope, element, attrs) {

			element.click(
				function(){
					$(this).siblings().removeClass('now');
					$(this).addClass('now');
			    }
			);

		}
	};
}]);



