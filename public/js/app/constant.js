(function(){
    'use strict';
    angular.module('rhIcon')
        .constant('$platforms', {
            ios: {
                name: 'iOS',
                folder: 'ios/AppIcon.appiconset'
            },
            android: {
                name: 'Android',
                folder: 'android'
            },
            windowsphone: {
                name: 'Windows Phone',
                folder: 'windowsphone'
            },
            iwatch: {
                name: 'iWatch',
                folder: 'iwatch/AppIcon.appiconset'
            },
            webapp: {
                name: 'Web App',
                folder: 'webapp'
            },
            phonegap: {
                name: 'PhoneGap (Cordova)',
                folder: 'phonegap'
            },
            quasar: {
                name: 'Quasar',
                folder: 'quasar'
            },
            custom: {
                name: '自定义',
                folder: 'custom'
            }
        });
})();
