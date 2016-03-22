(function(){
    'use strict';
    angular.module('rhIcon')
        .controller('RootCtrl', function($scope, $state, $platforms){
            $scope.$platforms = $platforms;

            $scope.stateCls = function (state) {
                if (window.state == state) {
                    return 'active';
                }
                return $state.is(state) ? 'active' : '';
            };
        });
})();