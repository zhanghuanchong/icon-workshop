(function(){
    'use strict';
    angular.module('rhIcon')
        .controller('AdminCtrl', function($scope, $http, CoreService) {
            $scope.validated = false;

            $scope.login = function () {
                if (!$scope.validated) {
                    return;
                }
                $scope.validated.password = $scope.password;
                $http.post('/admin/login', $scope.validated).success(function (r) {
                    CoreService.resCallback(r, function (d) {
                        console.log(d);
                    });
                });
            };
        });
})();