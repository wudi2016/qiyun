primeApp.controller('formCtrl',function($scope,myHttp){
    
    //teacher表单默认信息
	$scope.teacher = {
		nickname : "",
		truename : "",
		password : "",
		repsd    : "",
		type     : 1,              //type  0学生  1教师  2家长
		status   : 0,              //status 0 表示用户来自注册  1 后台添加 
		sex      : 0,              //默认性别
		checks   : 0               //是否审核 默认 0 未审核 1 审核
	}
    
    //student表单默认信息
	$scope.student = {
		username : "",
		realname : "",
		password : "",
		repsd    : "",
		type     : 0,
		status   : 0,
		sex      : 0,
		checks   : 0
	}

    //parent表单默认信息
	$scope.parent = {
		nickname : "",
		truename : "",
		password : "",
		repsd    : "",
		type     : 2,
		status   : 0,
		sex      : 0,
		checks   : 0
	}

})
