(function(){
    angular.module('rhIcon')
        .controller('IconCtrl', function($scope, $stateParams, CoreService, $state, $http, $platforms, $timeout){
            $scope.init = function () {
                $scope.$platforms = $platforms;
                $scope.url = window.location.origin;
                $http.get('/icon/detail/' + $stateParams.id + '/api').success(function(data){
                    $scope.design = data.design;
                    $scope.platforms = data.platforms;

                    $timeout(function(){
                        $.material.ripples();
                    });

                    var type = $state.params.type;
                    if (type && _.indexOf(data.platforms, type) >= 0) {
                        // Do nothing
                    } else if ($scope.platforms.length) {
                        type = $scope.platforms[0];
                        $scope.switchDetail(type);
                    }

                    if (type) {
                        $scope.updateBasePath(type);
                    }
                });
            };
            $scope.init();

            $scope.switchDetail = function (p) {
                $stateParams.type = p;
                $state.go('icon.detail', $stateParams);
            };

            $scope.$on('$stateChangeSuccess', function (event, toState, toParams) {
                if (toState.name == 'icon.detail' && $scope.design) {
                    $scope.updateBasePath(toParams.type);
                }
            });

            $scope.updateBasePath = function (type) {
                var platform = $platforms[type];
                $scope.basePath = [
                    '',
                    'files',
                    $scope.design.folder,
                    $scope.design.id,
                    platform.folder,
                    ''
                ].join('/');
            };

            $scope.tabCls = function (p) {
                return p == $state.params.type ? 'active' : '';
            };

            $scope.downloadLink = function () {
                return '/icon/download/' + $state.params.id;
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