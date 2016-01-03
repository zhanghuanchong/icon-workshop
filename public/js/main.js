(function(){
    'use strict';
    angular.module('rhIcon', [
        'ui.router'
    ]).config(function($stateProvider, $urlRouterProvider){
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
            });
        $urlRouterProvider.otherwise('/home');
    });

    $.material.init();
})();
