primeApp.factory("resourceDetailFactory", ["$http", function ($http) {

    var getRelevantSubject = function () {
        return $http.get('/research/getRelevantSubject');
    };
    return {
        getRelevantSubject: function () {
            return getRelevantSubject();
        }
    };
}]);

primeApp.controller("resourceDetailController", ["$scope", "$location", "resourceDetailFactory", "myHttp", function ($scope, $location, resourceDetailFactory, myHttp) {
    //资源id
    $scope.resId = $location.absUrl().split('/')[$location.absUrl().split('/').length - 1];
    $scope.loading = {
        other: false,
        comment: false
    };

    $scope.empty = {
        other: true,
        comment: true
    };

    $scope.error = {
        other: true,
        comment: true
    };

    $scope.data = {
        // detail: resourceDetails,
        other: {},
        comment: {},
        commentCount: 0
    };

    $scope.setView = function (loading, error) {
        if (loading) $scope.loading[loading] = !$scope.loading[loading];
        if (error) $scope.error[error] = !$scope.error[error];
    };

    resourceDetailFactory.getRelevantSubject().success(function (response) {
        if (response.type) {
            $scope.data.other = response.other;
            $scope.setView("other", false);
        } else {
            // $scope.setView("other", "other");
            $scope.loading.other = !$scope.loading.other;
            $scope.empty.other = !$scope.empty.other;
        }

    }).error(function (error) {
        if (error)    $scope.setView("other", "other");
    });


    $scope.lessonTopicList = false;
    $scope.lessonTopicListmsg = true;
    $scope.lessonTopicListblock = true;
    var getLessonTopicList = function () {

        var postData = {
            lessonId: $scope.resId,
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }

        myHttp.postData('/research/getLessonTopicList', postData).success(function (response) {
            if (response.status) {
                $scope.lessonTopicList = response.lessonTopicList;
                $scope.lessonTopicListmsg = true;
                $scope.lessonTopicListblock = false;
                $scope.paginationConf.totalItems = response.total;
            } else {
                $scope.lessonTopicList = true;
                $scope.lessonTopicListblock = false;
                $scope.lessonTopicListError = '没有发布话题！';
            }
        }).error(function (error) {
            $scope.lessonTopicList = true;
            $scope.lessonTopicListmsg = false;
        });

    }

    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 6
    };
    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getLessonTopicList);
    $scope.reload = function (type) {
        switch (type) {
            case "other":
                $scope.setView("other", "other");
                resourceDetailFactory.getRelevantSubject().success(function (response) {
                    if (response.type) {
                        $scope.data.other = response.other;
                        $scope.setView("other", false);
                    } else {
                        $scope.loading.other = !$scope.loading.other;
                        $scope.empty.other = !$scope.empty.other;
                    }
                }).error(function (error) {
                    $scope.setView("other", "other");
                });
                break;
            case "lessonTopicList" :
                // 教研组信息
                $scope.subjectTopicList = false;
                $scope.subjectTopicListmsg = true;
                $scope.subjectTopicListblock = true;

                var postData = {
                    lessonId: $scope.resId,
                    pageIndex: $scope.paginationConf.currentPage,
                    pageSize: $scope.paginationConf.itemsPerPage
                }

                myHttp.postData('/research/getLessonTopicList', postData).success(function (response) {
                    if (response.status) {
                        $scope.lessonTopicList = response.lessonTopicList;
                        $scope.lessonTopicListmsg = true;
                        $scope.lessonTopicListblock = false;
                        $scope.paginationConf.totalItems = response.total;
                    } else {
                        $scope.lessonTopicList = true;
                        $scope.lessonTopicListError = '没有发布话题！';
                    }
                }).error(function (error) {
                    $scope.lessonTopicList = true;
                    $scope.lessonTopicListmsg = false;
                });

        }
    };
}]);


