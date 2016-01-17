(function(){
    angular.module('rhIcon')
        .controller('IconCtrl', function($scope, $stateParams, CoreService, $state, $timeout){
            $state.go('icon.detail', $stateParams);

            $scope.subscribe = function () {
                var v = $.trim($scope.email);
                var reg = /^[a-z0-9-_]([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i;
                if (!v || !reg.test(v)) {
                    $('input[ng-model=email]').focus();
                    return;
                }
                $scope.subscribed = true;
                $.post('/icon/subscribe', {
                    design_id : $stateParams.id,
                    mail : v
                });
            };
        });
})();