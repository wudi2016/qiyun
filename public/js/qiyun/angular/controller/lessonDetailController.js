primeApp.factory("lessonDetailFactory", ["$http", function ($http) {

	var api = function (path, id) {
		return $http.get('/lessonDetail' +
			'/'+ path +'/'+ id);
	};

	var contributionListCount = 1;

	return {
		api: function (path, id) {
			return api(path, id);
		},
		setContributionList: function () {
			return contributionListCount++;
		}
	};

}]);

primeApp.directive("contributionCount", ["lessonDetailFactory", function (lessonDetailFactory) {
	return {
		link: function (scope, element, attrs) {
			var html = lessonDetailFactory.setContributionList();
			element.html(html);
		}
	};
}]);

primeApp.controller("lessonDetailController", ["$scope", "lessonDetailFactory", "$location","myHttp", function ($scope, lessonDetailFactory, $location,myHttp) {

	$scope.id = $location.absUrl();
	$scope.id = $scope.id.split('/')[5];
	$scope.loading = {
		commomCase: false,
		singleCase: false,
		content: false,
		article: false,
		image: false,
		video: false,
		contribution: false,
		topic: false,
		relevant: false,
		count: false,
		lessonMember: false
	};

	$scope.error = {
		commomCase: true,
		singleCase: true,
		content: true,
		article: true,
		image: true,
		video: true,
		contribution: true,
		topic: true,
		relevant: true,
		count: true,
		lessonMember: true
	};

	$scope.empty = {
		commomCase: true,
		singleCase: true,
		content: true,
		article: true,
		image: true,
		video: true,
		contribution: true,
		topic: true,
		relevant: true,
		count: true,
		lessonMember: true
	};

	$scope.data = {
		lessonDetail: lessonDetail,
		commomCase: {},
		singleCase: {},
		content: {},
		article: {},
		image: {},
		video: {},
		contribution: {},
		topic: {},
		relevant: {},
		count: {},
		lessonMember: {}
	};

	$scope.setView = function (loading, error) {
		if (loading) $scope.loading[loading] = !$scope.loading[loading];
		if (error) $scope.error[error] = !$scope.error[error];
	};
    
    //共案列表
	lessonDetailFactory.api("getCommomCase", $scope.id).success(function (response) {
		if (response.type) {
			$scope.data.commomCase = response.commomCase;
			$scope.setView("commomCase", false);
		} else {
			$scope.empty.commomCase = !$scope.empty.commomCase;
			$scope.loading.commomCase = !$scope.loading.commomCase;
		}
	}).error(function (error) {
		if (error)	$scope.setView("commomCase", "commomCase");
	});
    //个案列表
	lessonDetailFactory.api("getSingleCase", $scope.id).success(function (response) {
		if (response.type) {
			$scope.data.singleCase = response.singleCase;
			$scope.setView("singleCase", false);
		} else {
			$scope.empty.singleCase = !$scope.empty.singleCase;
			$scope.loading.singleCase = !$scope.loading.singleCase;
		}
	}).error(function (error) {
		if (error)	$scope.setView("singleCase", "singleCase");
	});

    //初备 反思
	lessonDetailFactory.api("getContent", $scope.id).success(function (response) {
		if (response.type) {
			$scope.data.content = response.content;
			$scope.setView("content", false);
		} else {
			$scope.empty.content = !$scope.empty.content;
			$scope.loading.content = !$scope.loading.content;
		}
	}).error(function (error) {
		if (error)	$scope.setView("content", "content");
	});
    //资源
	lessonDetailFactory.api("getArticle", $scope.id).success(function (response) {
		if (response.type) {
			$scope.data.article = response.article;
			$scope.setView("article", false);
		} else {
			$scope.empty.article = !$scope.empty.article;
			$scope.loading.article = !$scope.loading.article;
		}
	}).error(function (error) {
		if (error)	$scope.setView("article", "article");
	});
    //图片
	lessonDetailFactory.api("getImage", $scope.id).success(function (response) {
		if (response.type) {
			$scope.data.image = response.image;
			$scope.setView("image", false);
		} else {
			$scope.empty.image = !$scope.empty.image;
			$scope.loading.image = !$scope.loading.image;
			// console.log($scope.empty.image);
			// $scope.empty.image = false;
			// $scope.loading.image = true;
		}
	}).error(function (error) {
		if (error)	$scope.setView("image", "image");
	});
    //视屏
	lessonDetailFactory.api("getVideo", $scope.id).success(function (response) {
		if (response.type) {
			$scope.data.video = response.video;
			$scope.setView("video", false);
		} else {
			$scope.empty.video = !$scope.empty.video;
			$scope.loading.video = !$scope.loading.video;
		}
	}).error(function (error) {
		if (error)	$scope.setView("video", "video");
	});
	//话题
	lessonDetailFactory.api("getTopic", $scope.id).success(function (response) {
		if (response.type) {
			$scope.data.topic = response.topic;
			$scope.setView("topic", false);
		} else {
			$scope.empty.topic = !$scope.empty.topic;
			$scope.loading.topic = !$scope.loading.topic;
		}
	}).error(function (error) {
		if (error)	$scope.setView("topic", "topic");
	});
    //相关协备
	lessonDetailFactory.api("getRelevant", $scope.id).success(function (response) {
		if (response.type) {
			$scope.data.relevant = response.relevant;
			$scope.setView("relevant", false);
		} else {
			$scope.empty.relevant = !$scope.empty.relevant;
			$scope.loading.relevant = !$scope.loading.relevant;
		}
	}).error(function (error) {
		$scope.setView("relevant", "relevant");
	});

    //统计
	lessonDetailFactory.api("getCount", $scope.id).success(function (response) {
		if (response.type) {
			$scope.data.count = response.count;
			$scope.setView("count", false);
		} else {
			$scope.setView("count", "count");
		}
	}).error(function (error) {
		$scope.setView("count", "count");
	});

    //成员
	lessonDetailFactory.api("getLessonMember", $scope.id).success(function (response) {
		if (response.type) {
			$scope.data.lessonMember = response.lessonMember;
			$scope.setView("lessonMember", false);
		} else {
			$scope.empty.lessonMember = !$scope.empty.lessonMember;
			$scope.loading.lessonMember = !$scope.loading.lessonMember;
		}
	}).error(function (error) {
		$scope.setView("lessonMember", "lessonMember");
	});

	$scope.publishCommonCase = function(id){
		var info = {
			//'type' : '3', // 是否是创建者或主备人
			'type' : '1',
			'id' : id
		}
		myHttp.postData('/research/isMember', info).success(function (response) {
			if(response.status == '1'){
				location.href = '/research/publishCommonCase/' + id;
			}else if(response.status == '2'){
				alert('您不是该备课的成员，不能发表');
				//alert('您不是该备课的创建者或主备人,不能上传共案');
			}else if(response.status == '3'){
				alert('请先登录！');location.href = '/';
			}
		});
	}
	$scope.publishPic = function(id){
		var info = {
			'type' : '1',
			'id' : id
		}
		myHttp.postData('/research/isMember', info).success(function (response) {
			if(response.status == '1'){
				location.href = '/research/publishPic/' + id;
			}else if(response.status == '2'){
				alert('您不是该备课的成员，不能发表');
			}else if(response.status == '3'){
				alert('请先登录！');location.href = '/';
			}
		});
	}
	$scope.publishAudio = function(id){
		var info = {
			'type' : '1',
			'id' : id
		}
		myHttp.postData('/research/isMember', info).success(function (response) {
			if(response.status == '1'){
				location.href = '/research/publishAudio/' + id;
			}else if(response.status == '2'){
				alert('您不是该备课的成员，不能发表');
			}else if(response.status == '3'){
				alert('请先登录！');location.href = '/';
			}
		});
	}
	$scope.publishResource = function(id){
		var info = {
			'type' : '1',
			'id' : id
		}
		myHttp.postData('/research/isMember', info).success(function (response) {
			if(response.status == '1'){
				location.href = '/research/publishResource/' + id;
			}else if(response.status == '2'){
				alert('您不是该备课的成员，不能发表');
			}else if(response.status == '3'){
				alert('请先登录！');location.href = '/';
			}
		});
	}
	$scope.publishTopic = function(id){
		var info = {
			'type' : '1',
			'id' : id
		}
		myHttp.postData('/research/isMember', info).success(function (response) {
			if(response.status == '1'){
				var boxcontent = $("#content");
				boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
				boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
				boxcontent.css('display','block');
				$("#shadow").css('display','block');
				$("#btnRes").click(function(){
					$("#content").css('display','none');
					$("#shadow").css('display','none');
				});
				$("textarea[name='content']").keyup(function (){
					var content = $("textarea[name='content']").val()
					$('.content_div3').children('span').html(200 - content.length);
				})
			}else if(response.status == '2'){
				alert('您不是该备课的成员，不能发表');
			}else if(response.status == '3'){
				alert('请先登录！');location.href = '/';
			}
		});
	}






	$scope.reload = function (pathName, dataName) {
		$scope.setView(dataName, dataName);
		lessonDetailFactory.api(pathName, $scope.id).success(function (response) {
			if (response.type) {
				$scope.data.dataName = response.dataName;
				$scope.setView(dataName, false);
			} else {
				$scope.setView(dataName, dataName);
			}
		}).error(function () {
			if (error)	$scope.setView(dataName, dataName);
		});
	};


    






    //文章
	$scope.realArticleCon = false;
	$scope.realArticleLoad = true;
	$scope.realArticleMsg = false;
	$scope.realArticleEmpty = false;
	myHttp.getData('/lessonDetail/getRealArticle/'+$scope.id).success(function (response) {
		if(response.type){
        	$scope.realArticle = response.realArticle;

        	$scope.realArticleCon = true;
			$scope.realArticleLoad = false;
			$scope.realArticleMsg = false;
 		}else{
        	$scope.realArticleCon = false;
			$scope.realArticleLoad = false;
			$scope.realArticleEmpty = true;
		}
    	// console.log(response);
	}).error(function (error) {
        	$scope.realArticleCon = false;
			$scope.realArticleLoad = false;
			$scope.realArticleMsg = true;
	});


    $scope.reloadTwo = function(type){
    	switch(type) {
    		case "realArticle" :
				$scope.realArticleCon = false;
				$scope.realArticleLoad = true;
				$scope.realArticleMsg = false;
				myHttp.getData('/lessonDetail/getRealArticle/'+$scope.id).success(function (response) {
					if(response.type){
			        	$scope.realArticle = response.realArticle;

			        	$scope.realArticleCon = true;
						$scope.realArticleLoad = false;
						$scope.realArticleMsg = false;
			 		}else{
			        	$scope.realArticleCon = false;
						$scope.realArticleLoad = false;
						$scope.realArticleEmpty = true;
					}
			    	console.log(response);
				}).error(function (error) {
			        	$scope.realArticleCon = false;
						$scope.realArticleLoad = false;
						$scope.realArticleMsg = true;
				});
    			break;	
    	}    	
    }
}]);
primeApp.controller('topicCtrl',function($scope,$location,myHttp){
	$scope.url = $location.absUrl();
	$scope.urlarr = $scope.url.split('/');
	$scope.id = $scope.urlarr[$scope.urlarr.length - 1];

	$scope.insertTopic = function(title,content){
		if(title == null){
			alert('标题不能为空！');
			return;
		}
		if(content == null){
			alert('内容不能为空！');
			return;
		}
		$scope.topic = {
			'lessonId' : $scope.id,
			'title' : $scope.topic.title,
			'content' : $scope.topic.content
		}
		myHttp.postData('/research/insertTopic',$scope.topic).success(function (response) {
			if(response.status == '1'){
				$("#content").css('display','none');
				$("#shadow").css('display','none');
				location.href = '/research/lessonDetail/' + $scope.id;
			}else if(response.status == '2'){
				alert('发布失败'); location.href = '/research/lessonDetail/' + $scope.id;
			}else if(response.status == '3'){
				alert('请先登录'); location.href = '/';
			}
		});
	}
})