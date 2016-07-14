/**
 * Created by Mr.H on 2016/3/14.
 */
primeApp.controller('resourceDetailController',function($scope,myHttp){
    $scope.loading = {
        other: false
    };
    $scope.error = {
        other: true
    };
    $scope.empty = {
        other: true
    };
    $scope.setView = function (loading, error) {
        if (loading) $scope.loading[loading] = !$scope.loading[loading];
        if (error) $scope.error[error] = !$scope.error[error];
    };
    myHttp.getData('/research/getRelevantDepartment').success(function (response) {
        if (response.type) {
            $scope.other = response.other;
            $scope.setView("other", false);
        } else {
            $scope.loading.other = !$scope.loading.other ;
            $scope.empty.other = !$scope.empty.other ;
        }
    })

    $scope.reload = function (key) {
        switch (key) {
            case "other":
                $scope.setView("other", "other");
                myHttp.getData('/research/getRelevantDepartment').success(function (response) {
                    if (response.type) {
                        $scope.other = response.other;
                        $scope.setView("other", false);
                    } else {
                        $scope.loading.other = !$scope.loading.other ;
                        $scope.empty.other = !$scope.empty.other ;
                    }
                }).error(function (error) {
                    $scope.setView("other", "other");
                });
                break;
        }
    };
});