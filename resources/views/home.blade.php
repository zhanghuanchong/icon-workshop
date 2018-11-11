@extends('master')
@section('container')
    <div class="container" ng-controller="HomeCtrl">
        <form class="jumbotron form-horizontal" action="/icon/upload" method="post" id="if_form">
            <h3 class="text-primary">
                <strong ng-bind="slogan"></strong>
            </h3>
            <div id="jumbotron_img_box">
                <img src="/img/launcher.png" alt="" id="jumbotron_img"/>
                <div id="jumbotron_img_loading" ng-show="status == 'generating'">
                    <div class="circle"></div>
                    <div class="circle1"></div>
                </div>
            </div>
            <p class="margin-top-20">支持 jpg, png, psd 文件。上传 1024 x 1024 像素的图片以获得最佳效果</p>
            <div ng-show="!status">
                <a href="javascript:;" class="btn btn-primary btn-raised btn-lg" ng-click="uploadFromBtn();">点击这里上传</a>
                <span class="grey margin-left-10 font-16 va-m">或者拖放您的设计文件到这里 (<=10MB)</span>
            </div>
            <div ng-show="status == 'setting'" class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">生成参数：</h3>
                </div>
                <div class="panel-body" style="padding-right: 40px;">
                    <div class="form-group margin-top-0">
                        <label class="control-label col-md-3">上传进度:</label>
                        <div class="col-md-9">
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" ng-style="progressStyle();"></div>
                                <div class="progress-tip hint--top hint--always hint--success" data-hint="@{{ progress + '%' }}"
                                     ng-style="progressTipStyle()"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 no-margin" for="platform">选择平台:</label>
                        <div class="col-md-9">
                            <select name="platform" id="platform" multiple style="width: 70%; height: 30px">
                                <option value="ios" selected>iOS</option>
                                <option value="android" selected>Android</option>
                                <option value="phonegap">PhoneGap (Cordova)</option>
                                <option value="webapp">Web App</option>
                                <option value="iwatch">iWatch</option>
                                <option value="windowsphone">Windows Phone</option>
                                <option value="quasar">Quasar</option>
                                {{--<option value="win_ico">Windows ico</option>--}}
                                {{--<option value="mac_icns">Mac icns</option>--}}
                            </select>
                        </div>
                    </div>

                    <div class="text-center" style="margin-top: 10px;">
                        <a href='javascript:;' class="withripple" ng-click="showOptional = !showOptional;">
                            可选参数 <i class="fa" ng-class="showOptional ? 'fa-caret-up' : 'fa-caret-down'"></i></a>
                    </div>

                    <div class="form-group" ng-show="(hasIOS || hasWinPhone) && showOptional">
                        <label class="control-label col-md-3 no-margin"></label>
                        <div md-color-picker
                             ng-model="bgColor"
                             type="0"
                             label="背景颜色"
                             open-on-input="true"
                             md-color-alpha-channel="false"
                             click-outside-to-close="true"></div>
                        <div class="col-md-offset-3 col-md-9" style="margin-top: -5px; color: silver">适用于iOS 及 Windows Phone。 默认是白色。</div>
                    </div>
                    <div class="form-group" ng-show="hasAndroid && showOptional">
                        <label class="control-label col-md-3 no-margin">Android目录:</label>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="radio radio-primary">
                                        <label>
                                            <input type="radio" name="androidFolder" ng-model="androidFolder" value="mipmap" checked="checked">
                                            mipmap
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="radio radio-primary">
                                        <label>
                                            <input type="radio" name="androidFolder" ng-model="androidFolder" value="drawable">
                                            drawable
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" ng-show="hasAndroid && showOptional">
                        <label class="control-label col-md-3 no-margin">Android文件名:</label>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" ng-model="androidName" name="androidName">
                                </div>
                                <div class="col-sm-4">
                                    <a href='javascript:;' ng-click="androidName=fileName();" class="withripple" style="margin-right:10px">上传的文件名</a>
                                    <a href='javascript:;' ng-click="androidName='ic_launcher';" class="withripple">默认</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" ng-show="(hasAndroid || hasWebApp) && showOptional">
                        <label class="control-label col-md-3 no-margin">自动圆角:</label>
                        <div class="col-md-9">
                            <div class="row" style="min-height: 45px">
                                <div class="col-md-4">
                                    <div class="radio radio-primary">
                                        <label ng-click="setRadius(0)">
                                            <input type="radio" name="radius_type" ng-model="radius_type" value="0">
                                            无
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="radio radio-primary">
                                        <label ng-click="setRadius(17.54)">
                                            <input type="radio" name="radius_type" ng-model="radius_type" value="1">
                                            有
                                        </label>
                                        <input type="number" name="android_radius" ng-model="radius" step="0.01" min="0" max="50"
                                               ng-hide="radius_type == '0'" style="margin-top:-5px"
                                               class="width-60 margin-left-10" />
                                        <span ng-hide="radius_type == '0'">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="color: silver">
                                <div class="col-md-12">适用于Android 及 Web App。</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" ng-show="showOptional">
                        <label class="control-label col-md-3 no-margin">
                            自定义大小:
                        </label>
                        <div class="col-md-9 padding-top-5">
                            <a href='javascript:;' class="toggle-input" ng-repeat="s in presets"
                               ng-class="s.selected ? 'active' : ''" ng-click="s.selected = !s.selected;">
                                <span ng-bind="s.length"></span>
                                <i class="fa" ng-if="s.icon" ng-class="'fa-' + s.icon"></i>
                            </a><input type="number" min="0" max="1024" step="1"
                                   ng-model="s.length" ng-repeat="s in sizes" focus-last/>
                            <div style="color: silver">点击选中。
                                <a href='javascript:;' class="withripple" ng-click="addCustomSize()">
                                    <i class="fa fa-plus"></i> 添加</a>
                                <a href='javascript:;' class="withripple" style="margin-left: 10px;" ng-click="clearCustomSizes()">
                                    <i class="fa fa-remove"></i> 清空</a></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <a href='javascript:;' class="silver margin-right-20" ng-click="init()">取消</a>
                            <a href="javascript:;" class="btn btn-primary btn-raised btn-lg no-margin"
                               ng-disabled="platforms.length <= 0"
                               ng-click="platforms.length ? generate() : null;" ng-hide="ready">开始生成</a>
                            <a href='javascript:;' class="btn btn-default btn-raised btn-lg no-margin" disabled="disabled"
                               ng-show="ready">上传完后将立即开始</a>
                        </div>
                    </div>
                </div>
            </div>
            <div ng-show="status == 'generating'" class="alert alert-success" role="alert" style="margin-bottom: 8px;">
                <i class="fa fa-spinner fa-spin"></i>
                生成中，请耐心等待（可能需要1-5分钟时间）...
            </div>
            <input type="file" id="if" style="float:right; visibility: hidden" onchange="$('#if_form').scope().selectedFile(this);"/>
        </form>

        <div class="row row-margin">
            <div class="col-md-4 text-center">
                <img src="/img/folder.png" /><br><br>
                同时生成
                <strong class="label label-info">iOS</strong>、<strong class="label label-info">安卓</strong>、
                <strong class="label label-info">PhoneGap</strong> 和 <strong class="label label-info">Windows Phone</strong> 应用的图标。遵循
                <a href="https://developer.apple.com/library/ios/documentation/UserExperience/Conceptual/MobileHIG/IconMatrix.html" target="_blank">Apple</a>、
                <a href="https://developer.android.com/design/style/iconography.html#launcher" target="_blank">Google</a>、
                <a href="https://msdn.microsoft.com/en-us/library/windows/apps/jj662924(v=vs.105).aspx" target="_blank">Microsoft</a>
                官方标准。
            </div>
            <div class="col-md-4 text-center">
                <img src="/img/eye.png" /><br><br>
                快速预览将要在不同设备上显示的应用图标。使您无需部署即可通过预览来调整设计样式。
            </div>
            <div class="col-md-4 text-center">
                <img src="/img/opt.png" /><br><br>
                优化图标，尤其是尺寸较小的图标。保证清晰度，并优化图片内存占用，减小包体积，提高性能。
            </div>
        </div>

        @if(!App::environment('local'))
            <div class="row row-margin">
                <div class="col-md-8">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:728px;height:90px"
                         data-ad-client="ca-pub-5072970286349933"
                         data-ad-slot="2920908022"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div class="col-md-4">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:320px;height:100px"
                         data-ad-client="ca-pub-5072970286349933"
                         data-ad-slot="6330202821"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        window.state = 'home';
    </script>
    <script src="/js/app/home.ctrl.js?_={{ $GLOBALS['_VER_'] }}"></script>
@endsection
