(function(){
    'use strict';
    angular.module('rhIcon')
        .controller('GuideCtrl', function($scope, $stateParams, $platforms){
            $scope.platform = $platforms[$stateParams.platform];
        });
})();