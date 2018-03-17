(function(){
    'use strict';
    angular.module('rhIcon')
        .directive('focusLast', function ($timeout) {
            return {
                restrict : 'A',
                link : function($scope, el) {
                    if ($scope.$last) {
                        $timeout(function () {
                            el.focus().select();
                        });
                    }
                }
            };
        });
})();