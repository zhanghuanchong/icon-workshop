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
                url: '/icon',
                templateUrl: 'views/icon/index.html',
                controller: 'IconCtrl'
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
