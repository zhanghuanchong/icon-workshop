(function(){
    'use strict';
    angular.module('rhIcon')
        .controller('HomeCtrl', function($scope, CoreService, $http, $timeout, $location) {
            $.material.ripples();

            var path = $location.path();
            if (path) {
                var paths = path.split('/');
                if (paths.length > 2 && paths[0] == '' && paths[1] == 'icon') {
                    path  = '/icon/' + paths[2];
                    if (paths.length > 3) {
                        path += '#/' + paths[3];
                    }
                    location.href = path;
                }
            }

            $scope.slogan = $("meta[name=slogan]").attr('content');

            $scope.init = function () {
                $scope.status = false;
                $scope.progress = 0;
                $scope.id = null;
                $scope.ready = false;
                $scope.sizes = [];
                $scope.bgColor = null;
                $scope.androidFolder = 'mipmap';
                $scope.androidName = 'ic_launcher';
                $scope.hasAndroid = true;
                $scope.platforms = ['ios', 'android'];
                $scope.radius_type = '0';
                $scope.radius = 0;
                $scope.file = null;
                $scope.presets = [{
                    length: 28,
                    icon: 'wechat',
                    selected: false
                }, {
                    length: 108,
                    icon: 'wechat',
                    selected: false
                }];
                $("#jumbotron_img").attr('src', '/img/launcher.png');
            };
            $scope.init();

            $("#platform").select2({
                minimumResultsForSearch: Infinity
            }).on('change', function () {
                $scope.$apply(function () {
                    var platforms = $("#platform").val();
                    $scope.hasAndroid = $.inArray('android', platforms) >= 0;
                    $scope.platforms = platforms ? platforms : [];
                    console.log(platforms);
                });
            });

            var if_form = $("#if_form"),
                dom = if_form.get(0);
            dom.addEventListener("dragover", function(e){
                e.stopPropagation();
                e.preventDefault();

                if ($scope.status) {
                    return;
                }

                if_form.addClass('dropping');
            }, false);
            dom.addEventListener("dragleave", function(e){
                e.stopPropagation();
                e.preventDefault();

                if ($scope.status) {
                    return;
                }

                if_form.removeClass('dropping');
            }, false);
            dom.addEventListener("drop", function(e){
                e.stopPropagation();
                e.preventDefault();

                if ($scope.status) {
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
                var t = $("#if");
                t[0].type = '';
                t[0].type = 'file';
                t.click();
            };

            $scope.selectedFile = function (that) {
                if (that.files && that.files.length) {
                    $scope.$apply(function(){
                        $scope.startUploading(that.files[0]);
                    });
                }
            };

            $scope.checkFile = function (file) {
                if (!file || !file.type) {
                    return false;
                }
                var list = [
                    'image/jpeg',
                    'image/jpg',
                    'image/png',
                    'image/gif',
                    'image/vnd.adobe.photoshop'
                ];
                if ($.inArray(file.type, list) >= 0) {
                    return true;
                }

                swal({
                    title : '不支持的文件格式.',
                    type : 'error',
                    confirmButtonText : '确定'
                });

                return false;
            };

            $scope.startUploading = function (file) {
                if (!$scope.checkFile(file)) {
                    return;
                }
                $scope.init();

                $scope.file = file;
                $scope.status = 'setting';

                var oFReader = new FileReader();
                oFReader.readAsDataURL(file);

                oFReader.onload = function (oFREvent) {
                    if (file.type != '' && file.type != 'image/vnd.adobe.photoshop') {
                        $("#jumbotron_img").get(0).src = oFREvent.target.result;
                    }
                };

                var formData = new FormData();
                formData.append('file', file);

                var oReq = new XMLHttpRequest();
                oReq.open("POST", "/icon/upload", true);
                oReq.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                oReq.onreadystatechange = function() {
                    if (oReq.readyState == 4) {
                        if (oReq.status == 200) {
                            CoreService.resCallback(oReq.responseText, function(id){
                                $scope.$apply(function () {
                                    $scope.id = id;
                                    if ($scope.ready) {
                                        $scope.doGenerate();
                                    }
                                });
                            }, function() {
                                $scope.$apply(function () {
                                    $scope.init();
                                });

                                $("#jumbotron_img").get(0).src = 'img/launcher.png';
                            });
                        }
                    }
                };
                oReq.upload.onprogress = function(e) {
                    $scope.$apply(function () {
                        $scope.progress = Math.round(e.loaded / e.total * 100);
                    });
                };
                oReq.send(formData);
            };

            $scope.progressStyle = function () {
                return {
                    width: $scope.progress + '%'
                };
            };

            $scope.progressTipStyle = function () {
                return {
                    left: ($scope.progress - 1) + '%'
                };
            };

            $scope.generate = function () {
                if ($scope.id) {
                    $scope.doGenerate();
                } else {
                    $scope.ready = true;
                }
            };

            $scope.doGenerate = function () {
                $scope.status = 'generating';
                var sizes = $scope.sizes;
                angular.forEach($scope.presets, function (value, key) {
                    if (value.selected) {
                        sizes.push({
                            length: value.length
                        });
                    }
                });

                $http.post('/icon/generate', {
                    id: $scope.id,
                    platforms: $("#platform").val(),
                    sizes: sizes,
                    radius: $scope.radius,
                    bgColor: $scope.bgColor,
                    androidFolder: $scope.androidFolder,
                    androidName: $.trim($scope.androidName)
                }).success(function(){
                    location.href = '/icon/' + $scope.id;
                });
            };

            $scope.addCustomSize = function () {
                $scope.sizes.push({
                    length: 0
                });
            };

            $scope.setRadius = function (radius) {
                $scope.radius = radius;
            };

            $scope.fileName = function () {
                if (!$scope.file) {
                    return 'icon';
                }
                return _.join(_.initial(_.split($scope.file.name, '.')), '.');
            };
        });
})();