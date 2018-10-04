@extends('master')
@section('container')
    <div class="container" ng-controller="IconCtrl">
        <div class="well" role="alert" style="font-size:16px; padding: 6px 20px;">
            <div class="row">
                <div class="col-md-7" style="padding-top: 20px;">
                    生成成功, 在下面预览您的所有图标！
                </div>
                <div class="col-md-5" style="text-align: right">
                    <a class="btn btn-raised btn-lg btn-success" href="javascript:;" ng-click="showDownloadPopup();"
                       style="padding: 12px 40px;">
                        <i class="fa fa-download" style="margin-right: 10px"></i>
                        点击下载所有图标
                    </a>
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
                    <a href="javascript:;" ng-click="switchDetail(p);" data-ripple-color="white"
                       ng-bind="$platforms[p].name"></a>
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
    <script src="/js/app/icon.ctrl.js?v=1"></script>
@endsection
