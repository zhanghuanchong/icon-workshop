(function(){
    'use strict';
    angular.module('rhIcon', [
        'ui.router',
        'ui.bootstrap',
        'angular-loading-bar',
        'ngAnimate',
        'ngDialog'
    ]).config(function($stateProvider, $urlRouterProvider, cfpLoadingBarProvider){
        $stateProvider
            .state('home', {
                url: '/home',
                templateUrl: 'views/home/index.html',
                controller: 'HomeCtrl'
            })
            .state('home.ad', {
                templateUrl: 'views/home/ad.html'
            })
            .state('icon', {
                url: '/icon/:id',
                views: {
                    "": {
                        templateUrl: 'views/icon/index.html',
                        controller: 'IconCtrl'
                    },
                    "ad@icon": {
                        templateUrl: function (){
                            if (window.showAd) {
                                return 'views/icon/ad.html';
                            }
                            return null;
                        }
                    }
                }
            })
            .state('icon.detail', {
                url: '/:type',
                views: {
                    "detail@icon": {
                        templateUrl: function ($stateParams){
                            if ($stateParams.type) {
                                return 'views/icon/detail.' + _.toLower($stateParams.type) + '.html';
                            }
                        }
                    }
                }
            })
            .state('about', {
                url: '/about',
                templateUrl: 'views/about/index.html',
                controller: 'AboutCtrl'
            });
        $urlRouterProvider.otherwise('/home');

        cfpLoadingBarProvider.lightTheme = true;
    }).run(function($rootScope, cfpLoadingBar){
        $rootScope.$on('$stateChangeStart', function() {
            cfpLoadingBar.start();
        });

        $rootScope.$on('$stateChangeSuccess', function() {
            cfpLoadingBar.complete();
        });
    }).run(function ($rootScope, $state, $stateParams) {
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
    });

    $.material.init();
})();
