@extends('master')

@section('content')

<div class="well" role="alert" style="font-size:16px">
    <div class="row">
        <div class="col-md-6">
            <strong>生成成功！</strong>在下面预览您的图标并
            <a class="btn btn-raised btn-lg btn-success" style="padding: 6px 40px; margin-left: 10px;" href="/icon/download/<?php echo $design->id ?>">
                <i class="fa fa-download" style="margin-right: 10px"></i>
                点击下载所有图标
            </a>
        </div>
        <div class="col-md-6" style="text-align: right">
            <form class="form-inline" role="form" onsubmit="return false;">
                <div class="form-group no-margin no-padding">
                    <input type="email" class="form-control" placeholder="发送到邮箱并订阅" style="width:250px">
                    <button type="button" class="btn btn-raised btn-success" id="subscribe">发送</button>
                </div>
            </form>
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
        <?php $first = FALSE; ?>
        @if (in_array('ios', $platforms))
            <li role="presentation"><a href="#tp_ios" aria-controls="tp_ios" role="tab" data-toggle="tab">iOS</a></li>
        @endif
        @if (in_array('android', $platforms))
            <li role="presentation"><a href="#tp_android" aria-controls="tp_android" role="tab" data-toggle="tab">Android</a></li>
        @endif
        @if (in_array('windowsphone', $platforms))
            <li role="presentation"><a href="#tp_windowsphone" aria-controls="tp_windowsphone" role="tab" data-toggle="tab">Windows Phone</a></li>
        @endif
        @if (in_array('iwatch', $platforms))
            <li role="presentation"><a href="#tp_watch" aria-controls="tp_watch" role="tab" data-toggle="tab">iWatch</a></li>
        @endif
        @if (in_array('webapp', $platforms))
            <li role="presentation"><a href="#tp_webapp" aria-controls="tp_webapp" role="tab" data-toggle="tab">Web App</a></li>
        @endif
        @if (in_array('phonegap', $platforms))
            <li role="presentation"><a href="#tp_phonegap" aria-controls="tp_phonegap" role="tab" data-toggle="tab">PhoneGap</a></li>
        @endif
    </ul>

    <div class="tab-content" id="tp_contents">
        @if (in_array('ios', $platforms))
            @include('icon.detail_ios')
        @endif
        @if (in_array('android', $platforms))
            @include('icon.detail_android')
        @endif
        @if (in_array('windowsphone', $platforms))
            @include('icon.detail_windowsphone')
        @endif
        @if (in_array('iwatch', $platforms))
            @include('icon.detail_watch')
        @endif
        @if (in_array('webapp', $platforms))
            @include('icon.detail_webapp')
        @endif
        @if (in_array('phonegap', $platforms))
            @include('icon.detail_phonegap')
        @endif
    </div>

</div>
@stop
