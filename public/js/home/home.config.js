(function(){
    'use strict';
    angular.module('rhIcon.home')
        .run(function($rootScope){
            $("#platform").select2({
                minimumResultsForSearch: Infinity
            });

            var if_form = $("#if_form"),
                dom = if_form.get(0);
            dom.addEventListener("dragover", function(e){
                e.stopPropagation();
                e.preventDefault();

                if (!$rootScope.enableDropping) {
                    return;
                }

                if_form.addClass('dropping');
            }, false);
            dom.addEventListener("dragleave", function(e){
                e.stopPropagation();
                e.preventDefault();

                if (!$rootScope.enableDropping) {
                    return;
                }

                if_form.removeClass('dropping');
            }, false);
            dom.addEventListener("drop", function(e){
                e.stopPropagation();
                e.preventDefault();

                if (!$rootScope.enableDropping) {
                    return;
                }

                if_form.removeClass('dropping');

                if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files.length) {
                    var scope = if_form.scope();
                    scope.$apply(function(){
                        scope.startUploading(e.dataTransfer.files[0]);
                    });
                }
            }, false);
        });
})();