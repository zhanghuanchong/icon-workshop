(function(){
    'use strict';
    angular.module('rhIcon').config(function($stateProvider){
        $stateProvider
            .state('generate', {
                url: '/generate',
                templateUrl: '../views/icon/generate.html'
            })
            .state('detail', {
                url: '/:type',
                templateUrl: function ($stateParams){
                    if ($stateParams.type) {
                        return '../views/icon/detail.' + _.toLower($stateParams.type) + '.html';
                    }
                }
            });
    });

    angular.module('rhIcon')
        .controller('IconCtrl', function($scope, $stateParams, CoreService, $state, $http, $platforms, $timeout, ngDialog) {
            $scope.id = window.designId;

            $scope.init = function () {
                $scope.$platforms = $platforms;
                $scope.url = window.location.origin;
                $http.get('/icon/api-detail/' + $scope.id).success(function(data){
                    $scope.design = data.design;
                    $scope.androidFolder = $scope.design.android_folder ? $scope.design.android_folder : 'drawable';
                    $scope.androidName = $scope.design.sanitized_android_name;

                    $timeout(function(){
                        $.material.ripples();
                    });

                    if (data.generated === false && (data.platforms.length || data.sizes)) {
                        $scope.basePath = '/';
                        $state.go('generate');
                        return;
                    }

                    $scope.platforms = data.platforms;
                    $scope.sizes = data.sizes;

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
                $state.go('detail', $stateParams);
            };

            $scope.$on('$stateChangeSuccess', function (event, toState, toParams) {
                if (toState.name == 'detail' && $scope.design) {
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
                return '/icon/download/' + $scope.id;
            };

            $scope.showDownloadPopup = function () {
                ngDialog.open({
                    template: '/views/icon/download.html',
                    scope: $scope
                });
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
                    design_id : $scope.id,
                    mail : v
                });
            };

            $scope.generate = function () {
                if ($scope.generating) {
                    return;
                }
                $scope.generating = true;
                $http.get('/icon/api-generate/' + $scope.design.id).success(function(){
                    $scope.init();
                });
            };

            $scope.$on('$stateChangeSuccess', function (event, data) {
                if (data && data.name == 'generate') {
                    $scope.generate();
                }
            });
        });
})();