(function(){
    'use strict';
    angular.module('rhIcon', [
        'ui.router',
        'angular-loading-bar',
        'ngAnimate'
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
                url: '/icon/:id/:type',
                templateUrl: 'views/icon/index.html',
                controller: 'IconCtrl'
            })
            .state('icon.detail', {
                views: {
                    ad: {
                        templateUrl: function ($stateParams){
                            if (window.showAd) {
                                return 'views/icon/ad.html';
                            }
                            return null;
                        }
                    },
                    detail: {
                        templateUrl: function ($stateParams){
                            return 'views/icon/detail.' + $stateParams['type'] + '.html';
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
    });

    $.material.init();
})();
