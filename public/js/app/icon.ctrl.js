(function(){
    angular.module('rhIcon')
        .controller('IconCtrl', function($scope, $stateParams, CoreService, $state, $http, $platforms){
            $state.go('icon.detail', $stateParams);

            $scope.init = function () {
                $scope.$platforms = $platforms;
                $http.get('/icon/detail/' + $stateParams.id + '/api').success(function(data){
                    $scope.design = data.design;
                    $scope.platforms = data.platforms;
                });
            };
            $scope.init();

            $scope.subscribe = function () {
                var v = $.trim($scope.email);
                var reg = /^[a-z0-9-_]([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i;
                if (!v || !reg.test(v)) {
                    $('input[ng-model=email]').focus();
                    return;
                }
                $scope.subscribed = true;
                $.post('/icon/subscribe', {
                    design_id : $stateParams.id,
                    mail : v
                });
            };
        });
})();