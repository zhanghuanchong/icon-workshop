(function(){
    'use strict';
    angular.module('rhIcon')
        .constant('$platforms', {
            ios: 'iOS',
            android: 'Android',
            windowsphone: 'Windows Phone',
            iwatch: 'iWatch',
            webapp: 'Web App',
            phonegap: 'PhoneGap'
        });
})();