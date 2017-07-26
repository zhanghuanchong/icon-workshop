(function(){
    'use strict';
    angular.module('rhIcon')
        .service('CoreService', function(){
            this.resCallback = function(response, successCallback, failCallback){
                try {
                    var json = response;
                    if (typeof(response) == 'string') {
                        json = JSON.parse(response);
                    }
                    if (json.e) {
                        swal({
                            title : json.d,
                            type : 'error',
                            confirmButtonText : '确定'
                        }, failCallback);
                    } else {
                        if (typeof(successCallback) == 'function') {
                            successCallback(json.d);
                        }
                    }
                } catch (e) {
                    failCallback(true, e);
                    console.log(response);
                    console.log(e);
                    throw e;
                }
            };
        });
})();