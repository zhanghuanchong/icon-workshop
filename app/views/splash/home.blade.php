@extends('splash/master')

@section('content')
<form class="jumbotron form-horizontal" id="if_form" action="/splash/upload" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <h2 style="margin-bottom: 40px; margin-top: 0;">一键生成iOS不同尺寸的启动图片</h2>
            <div class="form-group">
                <label for="inputLogoFile" class="col-sm-2 control-label text-left">Logo: </label>
                <div class="col-sm-10">
                    <input type="file" name="logo" class="form-control" id="inputLogoFile">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-left">背景:</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left">
                            <input type="radio" id="inputBgRadioColor" name="bgRadio" value="color" checked>
                            <label for="inputBgRadioColor">纯色</label>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputBgColor" name="color" value="#0088cb" style="max-width: 120px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left">
                            <input type="radio" id="inputBgRadioImage" name="bgRadio" value="file">
                            <label for="inputBgRadioImage">图片</label>
                        </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="inputBgFile" name="bg" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-left">方向:</label>
                <div class="col-sm-10">
                    <label class="control-label" style="margin-right: 20px">
                        <input type="radio" name="orientation" id="orientation_portrait" value="portrait" checked/>
                        <label for="orientation_portrait">竖屏</label>
                    </label>
                    <labe class="control-label">
                        <input type="radio" name="orientation" id="orientation_landscape" value="landscape"/>
                        <label for="orientation_landscape">横屏</label>
                    </labe>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-left" for="platform">设备:</label>
                <div class="col-sm-10">
                    <select name="platform[]" id="platform" multiple style="width: 400px; height: 30px">
                        <option value="iphone" selected>iPhone</option>
                        <option value="ipad" selected>iPad</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 30px">
                <a href="javascript:;" class="btn btn-primary btn-lg" id="generate_splash">开始生成!</a>
                <div id="if_submitting" class="alert alert-success" role="alert" style="max-width: 100%">
                    <img src="/img/loading.gif" />
                    生成中，请耐心等待(可能需要1-5分钟时间)...
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="jumbotron_img_box" class="splash">
                <img src="/img/iphone_xs.png" alt="" id="splash_preview_phone"/>
                <div id="splash_preview_bg">
                    <img id="splash_preview_logo" src="img/ruihong.sm.png" />
                </div>
                <div id="jumbotron_img_loading">
                    <div class="circle"></div>
                    <div class="circle1"></div>
                </div>
            </div>
        </div>
    </div>
</form>

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
@stop
