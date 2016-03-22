angular.module('rhIcon').config(function($stateProvider, $urlRouterProvider, cfpLoadingBarProvider){
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
        .state('guide', {
            url: '/guide/:platform',
            views: {
                "": {
                    templateUrl: 'views/guide/index.html',
                    controller: 'GuideCtrl'
                },
                "ad@guide": {
                    templateUrl: function (){
                        if (window.showAd) {
                            return 'views/guide/ad.html';
                        }
                        return null;
                    }
                }
            }
        })
        .state('admin', {
            url: '/admin',
            templateUrl: 'views/admin/index.html',
            controller: 'AdminCtrl'
        })
        .state('about', {
            url: '/about',
            templateUrl: 'views/about/index.html',
            controller: 'AboutCtrl'
        });
    $urlRouterProvider.otherwise('/home');

    cfpLoadingBarProvider.lightTheme = true;
});