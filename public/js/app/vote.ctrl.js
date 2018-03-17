(function(){
    'use strict';
    angular.module('rhIcon')
        .controller('VoteCtrl', function($scope, $state, $http){
            $scope.newRequirement = '';

            $scope.submit = function () {
                $http.post('/vote', {
                    title: $scope.newRequirement
                }).success(function () {
                    swal('', '提交成功！审核通过后就可以投票了', 'success');
                });
            };
        });
})();