@extends('master')
@section('container')
    <div class="container" ng-controller="IconCtrl">
        <div class="well" role="alert" style="font-size:16px">
            <div class="row">
                <div class="col-md-7">
                    <strong>生成成功！</strong>在下面预览您的图标并
                    <a class="btn btn-raised btn-lg btn-success" href="javascript:;" ng-click="showDownloadPopup();"
                       style="padding: 6px 40px; margin-left: 10px;">
                        <i class="fa fa-download" style="margin-right: 10px"></i>
                        点击下载所有图标
                    </a>
                </div>
                <div class="col-md-5" style="text-align: right">
                    <form class="form-inline" role="form" onsubmit="return false;" ng-submit="subscribe();" ng-hide="subscribed">
                        <div class="form-group no-margin no-padding">
                            <input type="email" class="form-control" placeholder="发送到邮箱并订阅" ng-model="email"
                                   style="width:250px; display: inline-block">
                            <button type="button" class="btn btn-raised btn-success" ng-click="subscribe();">发送</button>
                        </div>
                    </form>
                    <div style="margin-top: 15px" ng-show="subscribed">订阅成功！即将发送到您的邮箱，请随后查收！</div>
                </div>
            </div>
        </div>

        @if(!App::environment('local'))
            <div class="row">
                <div class="col-md-8">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:728px;height:90px"
                         data-ad-client="ca-pub-5072970286349933"
                         data-ad-slot="9885771622"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div class="col-md-4">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:320px;height:100px"
                         data-ad-client="ca-pub-5072970286349933"
                         data-ad-slot="2362504825"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        @endif

        <div role="tabpanel" style="font-weight: bold">

            <ul class="nav nav-pills nav-justified" role="tablist" id="tp_tabs">
                <li ng-repeat="p in platforms" ng-class="tabCls(p);">
                    <a href="javascript:;" ng-click="switchDetail(p);" data-ripple-color="white">
                        @{{ $platforms[p].name }}
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="tp_contents" ng-if="basePath" ui-view></div>

        </div>

    </div>
@endsection

@section('scripts')
    <script>
        window.designId = '{{ $id }}';
    </script>
    <script src="/js/app/icon.ctrl.js"></script>
@endsection