(function(){
    'use strict';
    angular.module('rhIcon', [
        'ui.router',
        'ui.bootstrap',
        'angular-loading-bar',
        'ngAnimate',
        'ngDialog'
    ]).run(function($rootScope, cfpLoadingBar){
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
