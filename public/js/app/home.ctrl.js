(function(){
    angular.module('rhIcon')
        .controller('HomeCtrl', function($scope, CoreService, $state, $timeout) {
            $scope.generating = false;

            if (window.showAd) {
                $state.go('home.ad');
            }

            $("#platform").select2({
                minimumResultsForSearch: Infinity
            });

            var if_form = $("#if_form"),
                dom = if_form.get(0),
                enableDropping = true;
            dom.addEventListener("dragover", function(e){
                e.stopPropagation();
                e.preventDefault();

                if (!enableDropping) {
                    return;
                }

                if_form.addClass('dropping');
            }, false);
            dom.addEventListener("dragleave", function(e){
                e.stopPropagation();
                e.preventDefault();

                if (!enableDropping) {
                    return;
                }

                if_form.removeClass('dropping');
            }, false);
            dom.addEventListener("drop", function(e){
                e.stopPropagation();
                e.preventDefault();

                if (!enableDropping) {
                    return;
                }

                if_form.removeClass('dropping');

                if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files.length) {
                    $scope.$apply(function(){
                        $scope.startUploading(e.dataTransfer.files[0]);
                    });
                }
            }, false);

            $scope.uploadFromBtn = function () {
                $("#if").click();
            };

            $scope.selectedFile = function (that) {
                if (that.files && that.files.length) {
                    $scope.$apply(function(){
                        $scope.startUploading(that.files[0]);
                    });
                }
            };

            $scope.startUploading = function (file) {
                enableDropping = false;
                $scope.generating = true;

                var oFReader = new FileReader();
                oFReader.readAsDataURL(file);

                oFReader.onload = function (oFREvent) {
                    if (file.type != '' && file.type != 'image/vnd.adobe.photoshop') {
                        $("#jumbotron_img").get(0).src = oFREvent.target.result;
                    }
                };

                var formData = new FormData();
                formData.append('file', file);
                formData.append('platform', $("#platform").val());

                var oReq = new XMLHttpRequest();
                oReq.open("POST", "/icon/upload", true);
                oReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                oReq.onreadystatechange = function() {
                    if (oReq.readyState == 4) {
                        if (oReq.status == 200) {
                            CoreService.resCallback(oReq.responseText, function(id){
                                $state.go('icon', {
                                    id: id
                                });
                            }, function(){
                                enableDropping = true;
                                $scope.generating = false;

                                $("#jumbotron_img").get(0).src = 'img/launcher.png';
                            });
                        }
                    }
                };
                oReq.send(formData);
            };
        });
})();