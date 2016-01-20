(function(){
    'use strict';
    angular.module('rhIcon')
        .controller('RootCtrl', function($scope, $state){
            $scope.stateCls = function (state) {
                return $state.is(state) ? 'active' : '';
            };
        });
})();