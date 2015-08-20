@extends('splash/master')

@section('content')
<form class="jumbotron form-horizontal" action="/icon/upload" method="post">
    <div class="row">
        <div class="col-md-8">
            <h2 style="margin-bottom: 40px; margin-top: 0;">一键生成iOS不同尺寸的启动图片</h2>
            <div class="form-group">
                <label for="inputLogoFile" class="col-sm-2 control-label text-left">Logo: </label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputLogoFile">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-left">背景:</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left">
                            <input type="radio" id="inputBgRadioColor" name="bgRadio" checked>
                            <label for="inputBgRadioColor">纯色</label>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputBgColor" value="#0073d1" style="max-width: 120px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label text-left">
                            <input type="radio" id="inputBgRadioImage" name="bgRadio">
                            <label for="inputBgRadioImage">图片</label>
                        </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="inputBgFile" disabled>
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
            <div style="margin-top: 30px">
                <a href="javascript:;" class="btn btn-primary btn-lg" id="generate_splash">开始生成!</a>
                <div id="if_submitting" class="alert alert-success" role="alert">
                    <img src="/img/loading.gif" />
                    生成中，请耐心等待(可能需要1-5分钟时间)...
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="jumbotron_img_box" class="splash">
                <img src="/img/iphone_xs.png" alt="" id="splash_preview_phone"/>
                <div id="splash_preview_bg" style="position: absolute; background-color: #0073d1; width: 139px; height: 248px; top: 37px; left: 11px;"></div>
                <div id="jumbotron_img_loading">
                    <div class="circle"></div>
                    <div class="circle1"></div>
                </div>
            </div>
        </div>
    </div>
</form>

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
@stop

@section('bottom')
@stop
