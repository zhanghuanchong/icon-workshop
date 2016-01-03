(function(){
    angular.module('rhIcon.home')
        .controller('HomeCtrl', function($rootScope, $scope, CoreService){
            $rootScope.enableDropping = true;
            $scope.generating = false;

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
                $rootScope.enableDropping = false;
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
                                location.href = '/icon/detail/' + id;
                            }, function(){
                                $rootScope.enableDropping = true;
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