primeApp.factory("resourceDetailFactory", ["$http", function ($http) {

    var getRelevantDepartment = function () {
        return $http.get('/research/getRelevantDepartment');
    };
    return {
        getRelevantDepartment: function () {
            return getRelevantDepartment();
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

    resourceDetailFactory.getRelevantDepartment().success(function (response) {
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


    $scope.subjectVideoList = false;
    $scope.subjectVideoListmsg = true;
    $scope.subjectVideoListblock = true;
    var getSubjectVideoList = function () {

        var postData = {
            themeId: $scope.resId,
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }

        myHttp.postData('/research/getSubjectVideoList', postData).success(function (response) {
            if (response.status) {
                $scope.subjectVideoList = response.subjectVideoList;
                $scope.subjectVideoListmsg = true;
                $scope.subjectVideoListblock = false;
                $scope.paginationConf.totalItems = response.total;
            } else {
                $scope.subjectVideoList = true;
                $scope.subjectVideoListblock = false;
                $scope.subjectVideoListError = '没有视频上传！';
            }
        }).error(function (error) {
            $scope.subjectVideoList = true;
            $scope.subjectVideoListmsg = false;
        });

    }

    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 6
    };
    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getSubjectVideoList);
    $scope.reloadcourse = function (type) {
        switch (type) {
            case "subjectVideoList" :
                // 教研组信息
                $scope.subjectVideoList = false;
                $scope.subjectVideoListmsg = true;
                $scope.subjectVideoListblock = true;

                var postData = {
                    themeId: $scope.resId,
                    pageIndex: $scope.paginationConf.currentPage,
                    pageSize: $scope.paginationConf.itemsPerPage
                }

                myHttp.postData('/research/getSubjectResourceList', postData).success(function (response) {
                    if (response.status) {
                        $scope.subjectVideoList = response.subjectVideoList;
                        $scope.subjectVideoListmsg = true;
                        $scope.subjectVideoListblock = false;
                        $scope.paginationConf.totalItems = response.total;
                    } else {
                        $scope.subjectResourceList = true;
                        $scope.subjectResourceListError = '没有视频上传！';
                    }
                }).error(function (error) {
                    $scope.subjectVideoList = true;
                    $scope.subjectVideoListmsg = false;
                });

        }
    };


    $scope.reload = function (key) {
        switch (key) {
            case "other":
                $scope.setView("other", "other");
                resourceDetailFactory.getRelevantDepartment().success(function (response) {
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
        }
    };
}]);


