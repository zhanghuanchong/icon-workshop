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
        <a href="javascript:;" class="btn btn-primary btn-lg" id="if_btn">或者点击这里上传</a>
        <label for="platform" style="margin-left: 20px">选择平台:</label>
        <select name="platform" id="platform" multiple style="width: 400px; height: 30px">
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
    <div class="col-md-4">
        <div class="media">
            <a class="media-left" href="#">
                <img src="/img/folder.png" />
            </a>
            <div class="media-body">
                同时生成 <strong>iOS</strong>、 <strong>安卓</strong> 和 <strong>Windows Phone</strong> 应用的图标。遵循
                <a href="https://developer.apple.com/library/ios/documentation/UserExperience/Conceptual/MobileHIG/IconMatrix.html" target="_blank">
                    <span class="label label-info" style="font-size:12px">Apple</span></a>
                、
                <a href="https://developer.android.com/design/style/iconography.html#launcher" target="_blank">
                    <span class="label label-info" style="font-size:12px">Google</span></a>
                、
                <a href="https://msdn.microsoft.com/en-us/library/windows/apps/jj662924(v=vs.105).aspx" target="_blank">
                    <span class="label label-info" style="font-size:12px">Microsoft</span></a>
                官方标准。
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="media">
            <a class="media-left" href="#">
                <img src="/img/eye.png" />
            </a>
            <div class="media-body">
                快速预览将要在不同设备上显示的应用图标。使您无需部署即可通过预览来调整设计样式。
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="media">
            <a class="media-left" href="#">
                <img src="/img/opt.png" />
            </a>
            <div class="media-body">
                优化图标，尤其是尺寸较小的图标。保证清晰度，并优化图片内存占用，减小包体积，提高性能。
            </div>
        </div>
    </div>
</div>

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
<div class="index-section bg-eee">
    <div class="container">
        <h1>使用PSD + Actions模板生成图标</h1>

        <div class="row" style="text-align: center">
            <a class="col-md-3" href="#">
                <img src="/img/ios8.png" alt=""/>
                <h2>iOS应用图标</h2>
                <p class="description">从具有纹理，iOS渐变和颜色的单一大小图片快速渲染生成所有iOS 5, 6, 7 & 8的图标。预览图标在Wish list，App Store和Home屏上的效果，用Actions一键导出。</p>
                <p><strong>版本：4.0，更新于2014-09</strong></p>
            </a>
            <a class="col-md-3" href="#">
                <img src="/img/android.png" alt=""/>
                <h2>Android启动器图标</h2>
                <p class="description">该模板可以快速渲染生成不同尺寸的Android启动器图标。包含纹理，以及Ice Cream Sandwich屏幕预览。可以使用Actions一键导出。</p>
                <p><strong>版本：1.1，更新于2014-03</strong></p>
            </a>
            <a class="col-md-3" href="#">
                <img src="/img/osx.png" alt=""/>
                <h2>OS X桌面图标</h2>
                <p class="description">如果您正在为OS X桌面应用程序创建图标，这个模板可以帮助您生成不同尺寸的图标，并快速预览在Dock、Finder和App Store中的效果。</p>
                <p><strong>版本：1.0，更新于2014-06</strong></p>
            </a>
            <a class="col-md-3" href="#">
                <img src="/img/iphonescreenshot.png" alt=""/>
                <h2>iPhone截屏</h2>
                <p class="description">从最大尺寸的截图快速生成4种尺寸的图片。通过内置的Actions，一键生成最多20张截屏！</p>
                <p><strong>版本：1.0，更新于2014-12</strong></p>
            </a>
        </div>

    </div>
</div>
@stop
