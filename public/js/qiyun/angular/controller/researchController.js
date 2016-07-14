primeApp.factory("researchFactory", ["$http", function ($http) {
	var getGroup = function () {
		return $http.get('/research/getGroup');
	};

	var getSubject = function () {
		return $http.get('/research/getSubject');
	};

	var getEvaluation = function () {
		return $http.get('/research/getEvaluation');
	};

	var getTheme = function () {
		return $http.get('/research/getTheme');
	};

	var makeGroup = function(){
		return $http.get('/research/isTeacher');
	}
	var makeLesson = function(){
		return $http.get('/research/isTeacher');
	}
	var addEvaluation = function(){
		return $http.get('/research/isTeacher');
	}
	var addSubject = function(){
		return $http.get('/research/isTeacher');
	}

	return {
		getGroup: function () {
			return getGroup();
		},
		getSubject: function () {
			return getSubject();
		},
		getEvaluation: function () {
			return getEvaluation();
		},
		getTheme: function () {
			return getTheme();
		},
		makeGroup: function(){
			return makeGroup();
		},
		makeLesson: function(){
			return makeLesson();
		},
		addEvaluation: function(){
			return addEvaluation();
		},
		addSubject: function(){
			return addSubject();
		}
};

}]);

primeApp.directive("evaluationStar", [function () {
	return {
		link: function (scope, element, attrs) {
			var num = attrs.ngValue;
			var str = '♥';
			var html = '';
			for (var i = 0; i < num; i++) {
				html += str;
			};
			element.html(html);
		}
	};
}]);

primeApp.controller("researchController", ["$scope", "researchFactory", function ($scope, researchFactory) {

	$scope.loading = {
		group: false,
		subject: false,
		evaluation: false,
		theme: false
	};

	$scope.error = {
		group: true,
		subject: true,
		evaluation: true,
		theme: true
	};

	$scope.data = {
		group: {},
		subject: {},
		evaluation: {},
		theme: {}
	};

	$scope.setView = function (loading, error) {
		if (loading) $scope.loading[loading] = !$scope.loading[loading];
		if (error) $scope.error[error] = !$scope.error[error];
	};

	researchFactory.getGroup().success(function (response) {
		if (response.type) {
			$scope.data.group = response.group;
			$scope.setView("group", false);
		} else {
			$scope.setView("group", "group");
		}
	}).error(function (error) {
		if (error)	$scope.setView("group", "group");
	});

	researchFactory.getSubject().success(function (response) {
		if (response.type) {
			$scope.data.subject = response.subject;
			// console.log($scope.data.subject);
			$scope.setView("subject", false);
		} else {
			$scope.setView("subject", "subject");
		}
	}).error(function (error) {
		if (error)	$scope.setView("subject", "subject");
	});

	researchFactory.getEvaluation().success(function (response) {
		if (response.type) {
			$scope.data.evaluation = response.evaluation;
			$scope.setView("evaluation", false);
		} else {
			$scope.setView("evaluation", "evaluation");
		}
	}).error(function (error) {
		if (error)	$scope.setView("evaluation", "evaluation");
	});

	researchFactory.getTheme().success(function (response) {
		if (response.type) {
			$scope.data.theme = response.theme;
			$scope.setView("theme", false);
		} else {
			$scope.setView("theme", "theme");
		}
	}).error(function (error) {
		if (error)	$scope.setView("theme", "theme");
	});





	$scope.reload = function (key) {
		switch (key) {
			case "group":
				$scope.setView("group", "group");
				researchFactory.getGroup().success(function (response) {
					if (response.type) {
						$scope.data.group = response.group;
						$scope.setView("group", false);
					} else {
						$scope.setView("group", "group");
					}
				}).error(function (error) { 
					$scope.setView("group", "group"); 
				});
				break;
			case "subject":
				$scope.setView("subject", "subject");
				researchFactory.getSubject().success(function (response) {
					if (response.type) {
						$scope.data.subject = response.subject;
						$scope.setView("subject", false);
					} else {
						$scope.setView("subject", "subject");
					}
				}).error(function (error) { 
					$scope.setView("subject", "subject"); 
				});
				break;
			case "evaluation":
				$scope.setView("evaluation", "evaluation");
				researchFactory.getEvaluation().success(function (response) {
					if (response.type) {
						$scope.data.evaluation = response.evaluation;
						$scope.setView("evaluation", false);
					} else {
						$scope.setView("evaluation", "evaluation");
					}
				}).error(function (error) { 
					$scope.setView("evaluation", "evaluation"); 
				});
				break;
			case "theme":
				$scope.setView("theme", "theme");
				researchFactory.getTheme().success(function (response) {
					if (response.type) {
						$scope.data.theme = response.theme;
						$scope.setView("theme", false);
					} else {
						$scope.setView("theme", "theme");
					}
				}).error(function (error) { 
					$scope.setView("theme", "theme"); 
				});
				break;
		}
	};

	$scope.makeGroup = function(){
		researchFactory.makeGroup().success(function (response) {
			if(response.status == '1'){
				location.href = '/research/makeGroup';
			}else if(response.status == '2'){
				alert('您不是教师，不能创建教研组！');
			}else if(response.status == '3'){
				alert('请先登录！');location.href = '/';
			}
		})
	}
	$scope.makeLesson = function(){
		researchFactory.makeLesson().success(function (response) {
			if(response.status == '1'){
				location.href = '/research/makeLesson';
			}else if(response.status == '2'){
				alert('您不是教师，不能创建备课！');
			}else if(response.status == '3'){
				alert('请先登录！');location.href = '/';
			}
		})
	}
	$scope.addEvaluation = function(){
		researchFactory.addEvaluation().success(function (response) {
			if(response.status == '1'){
				location.href = '/research/addEvaluation';
			}else if(response.status == '2'){
				alert('您不是教师，不能创建评课！');
			}else if(response.status == '3'){
				alert('请先登录！');location.href = '/';
			}
		})
	}
	$scope.addSubject = function(){
		researchFactory.addSubject().success(function (response) {
			if(response.status == '1'){
				location.href = '/research/addSubject';
			}else if(response.status == '2'){
				alert('您不是教师，不能创建主题！');
			}else if(response.status == '3'){
				alert('请先登录！');location.href = '/';
			}
		})
	}
}]);




