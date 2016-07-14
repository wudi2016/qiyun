/**
 * Created by Mr.H on 2016/2/1.
 */
primeApp.controller('addSubjectCtrl',function($scope,myHttp) {
    // 判断备课是否唯一
    $scope.isOnly = function () {
        $scope.info = {
            'table': 'department_theme',
            'fieldName': 'name',
            'value': $scope.postdata.name
        };
        myHttp.postData('/research/isOnlyThis', $scope.info).success(function (response) {
            if (response.status == '1') {
                $scope.errorMsg = {
                    'onlyMsg': '该名称已存在,请重新输入'
                };
                $scope.postdata.name = '';
            } else if (response.status == '2') {
                $scope.errorMsg = {
                    'onlyMsg': ''
                };
            }
        }).error(function (error) {

        });
    }
})