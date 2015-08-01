@extends('master')

@section('content')

<div class="alert alert-info" role="alert" style="font-size:16px">
    <div class="row">
        <div class="col-md-6">
            <strong>生成成功！</strong>在下面预览您的图标并
            <a class="btn btn-success" style="padding: 6px 40px; margin-left: 10px;" href="/icon/download/<?php echo $design->id ?>">点击下载</a>
        </div>
        <div class="col-md-6" style="text-align: right">
            <form class="form-inline" role="form" onsubmit="return false;">
                <dif class="form-group">
                    <input type="email" class="form-control" placeholder="发送到邮箱并订阅" style="width:250px">
                    <button type="button" class="btn btn-primary" id="subscribe">发送</button>
                </dif>
            </form>
        </div>
    </div>
</div>

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

<div role="tabpanel" style="font-weight: bold">

    <ul class="nav nav-tabs nav-justified" role="tablist" id="tp_tabs">
        <li role="presentation" class="active"><a href="#tp_ios" aria-controls="tp_ios" role="tab" data-toggle="tab">iOS</a></li>
        <li role="presentation"><a href="#tp_android" aria-controls="tp_android" role="tab" data-toggle="tab">Android</a></li>
        <li role="presentation"><a href="#tp_watch" aria-controls="tp_watch" role="tab" data-toggle="tab">iWatch</a></li>
        <li role="presentation"><a href="#tp_webapp" aria-controls="tp_webapp" role="tab" data-toggle="tab">Web App</a></li>
        <li role="presentation"><a href="#tp_phonegap" aria-controls="tp_phonegap" role="tab" data-toggle="tab">PhoneGap</a></li>
        @if (isset($withExtra))
        <li role="presentation"><a href="#tp_winphone" aria-controls="tp_winphone" role="tab" data-toggle="tab">Windows Phone</a></li>
        @endif
    </ul>

    <div class="tab-content" id="tp_contents">

        @include('icon.detail_ios')

        @include('icon.detail_android')

        @include('icon.detail_watch')

        @include('icon.detail_webapp')

        @include('icon.detail_phonegap')

        @if (isset($withExtra))
        <div role="tabpanel" class="tab-pane fade" id="tp_winphone">

        </div>
        @endif
    </div>

</div>
@stop
