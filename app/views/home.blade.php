@extends('master')

@section('content')
<form class="jumbotron" action="/icon/upload" method="post" id="if_form">
    <h2><?php echo Config::get('constants.slogan') ?></h2>
    <div id="jumbotron_img_box">
        <img src="/img/launcher.png" alt="" id="jumbotron_img"/>
        <div id="jumbotron_img_loading">
            <div class="circle"></div>
            <div class="circle1"></div>
        </div>
    </div>
    <p><strong>拖放您的设计文件到这里。</strong></p>
    <p>支持jpg, png, psd文件。上传1024x1024像素的图片以获得最佳效果。</p>
    <div id="if_btn_box">
        <a href="javascript:;" class="btn btn-primary btn-raised btn-lg" id="if_btn">或者点击这里上传</a>
        <label for="platform" style="margin-left: 20px">选择平台:</label>
        <select name="platform" id="platform" multiple style="width: 300px; height: 30px">
            <option value="ios" selected>iOS</option>
            <option value="android" selected>Android</option>
            <option value="windowsphone">Windows Phone</option>
            <option value="phonegap">PhoneGap</option>
            <option value="iwatch">iWatch</option>
            <option value="webapp">Web App</option>
        </select>
    </div>
    <div id="if_submitting" class="alert alert-success" role="alert">
        <img src="/img/loading.gif" />
        生成中，请耐心等待(可能需要1-5分钟时间)...
    </div>
    <input type="file" id="if" style="float:right; visibility: hidden"/>
</form>

<div class="row row-margin">
    <div class="col-md-1">
        <img src="/img/folder.png" />
    </div>
    <div class="col-md-3">
        同时生成
        <strong class="label label-info">iOS</strong>、<strong class="label label-info">安卓</strong>、
        <strong class="label label-info">PhoneGap</strong> 和 <strong class="label label-info">Windows Phone</strong> 应用的图标。遵循
        <a href="https://developer.apple.com/library/ios/documentation/UserExperience/Conceptual/MobileHIG/IconMatrix.html" target="_blank">Apple</a>、
        <a href="https://developer.android.com/design/style/iconography.html#launcher" target="_blank">Google</a>、
        <a href="https://msdn.microsoft.com/en-us/library/windows/apps/jj662924(v=vs.105).aspx" target="_blank">Microsoft</a>
        官方标准。
    </div>
    <div class="col-md-1">
        <img src="/img/eye.png" />
    </div>
    <div class="col-md-3">
        快速预览将要在不同设备上显示的应用图标。使您无需部署即可通过预览来调整设计样式。
    </div>
    <div class="col-md-1">
        <img src="/img/opt.png" />
    </div>
    <div class="col-md-3">
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
@stop