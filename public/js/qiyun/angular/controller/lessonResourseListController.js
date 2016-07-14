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
    console.log($scope.resId);
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


    $scope.lessonResourseList = false;
    $scope.lessonResourseListmsg = true;
    $scope.lessonResourseListblock = true;
    var getLessonResourseList = function () {

        var postData = {
            lessonId: $scope.resId,
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }

        myHttp.postData('/research/getLessonResourseList', postData).success(function (response) {
            if (response.status) {
                $scope.lessonResourseList = response.lessonResourseList;
                $scope.lessonResourseListmsg = true;
                $scope.lessonResourseListblock = false;
                $scope.paginationConf.totalItems = response.total;
            } else {
                $scope.lessonResourseList = true;
                $scope.lessonResourseListblock = false;
                $scope.lessonResourseListError = '没有资源上传！';
            }
        }).error(function (error) {
            $scope.lessonResourseList = true;
            $scope.lessonResourseListmsg = false;
        });

    }

    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 6
    };
    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getLessonResourseList);
    $scope.reloadcourse = function (type) {
        switch (type) {
            case "lessonResourseList" :
                // 教研组信息
                $scope.lessonResourseList = false;
                $scope.lessonResourseListmsg = true;
                $scope.lessonResourseListblock = true;

                var postData = {
                    lessonId: $scope.resId,
                    pageIndex: $scope.paginationConf.currentPage,
                    pageSize: $scope.paginationConf.itemsPerPage
                }

                myHttp.postData('/research/getLessonResourseList', postData).success(function (response) {
                    if (response.status) {
                        $scope.lessonResourseList = response.lessonResourseList;
                        $scope.lessonResourseListmsg = true;
                        $scope.lessonResourseListblock = false;
                        $scope.paginationConf.totalItems = response.total;
                    } else {
                        $scope.lessonResourseList = true;
                        $scope.lessonResourseListError = '没有资源上传！';
                    }
                }).error(function (error) {
                    $scope.lessonResourseList = true;
                    $scope.lessonResourseListmsg = false;
                });

        }
    };


    $scope.reload = function (key) {
        switch (key) {
            case "other":
                $scope.setView("other", "other");
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
                    $scope.setView("other", "other");
                });
                break;
        }
    };
}]);


