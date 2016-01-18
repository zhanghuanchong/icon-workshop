(function(){
    angular.module('rhIcon')
        .controller('IconCtrl', function($scope, $stateParams, CoreService, $state, $http, $platforms, $timeout){
            $scope.init = function () {
                $scope.$platforms = $platforms;
                $http.get('/icon/detail/' + $stateParams.id + '/api').success(function(data){
                    $scope.design = data.design;
                    $scope.platforms = data.platforms;

                    var type = $state.params.type;
                    if (type && _.indexOf(data.platforms, type) >= 0) {
                        $scope.switchDetail(type);
                    } else if ($scope.platforms.length) {
                        $scope.switchDetail($scope.platforms[0]);
                    }

                    $timeout(function(){
                        $.material.ripples();
                    });
                });
            };
            $scope.init();

            $scope.switchDetail = function (p) {
                $stateParams.type = p;
                $state.go('icon.detail', $stateParams);
            };

            $scope.tabCls = function (p) {
                return p == $stateParams.type ? 'active' : '';
            };

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