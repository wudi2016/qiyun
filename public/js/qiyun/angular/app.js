var primeApp = angular.module('primeApp',['tm.pagination','tm.paginationb']);

primeApp.config(['$interpolateProvider', function($interpolateProvider) {
  $interpolateProvider.startSymbol('{[');
  $interpolateProvider.endSymbol(']}');
}]);


//http请求 请求
primeApp.factory("myHttp",["$http",function($http){
	
	var myHttpGet = function(myurl){
		return $http.get(myurl);
	}

    var myHttpPost = function(myurl,data){
    	return $http.post(myurl,data);
    }   

	return {
		getData: function (myurl){
        	return myHttpGet(myurl);
		},
		postData: function(myurl,data){
            return myHttpPost(myurl,data);
		}
	}

}]);


primeApp.controller('layoutCtrl',function($scope,myHttp) {

	myHttp.getData('/index/getSchoolInfo').success(function (response) {
		$scope.schoolName = response.schoolName;
		$scope.className  = response.className;
		// console.log(response);
	})

});

//日期过滤器
primeApp.filter('mDate', function(){

	var filter =function(input){

	  return input.split(' ')[0];

	};

	return filter;

});

//字数限制过滤器
primeApp.filter('mLimit', function(){

	var filter =function(input){

	  return input.substr(0,5);

	};

	return filter;

});

//格式时间
primeApp.filter('formatTime', function(){

	var filter =function(input){

	    return new Date(parseInt(input)).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");

	};

	return filter;

});

