<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title><?php echo Config::get('constants.site_name') . ' - ' . Config::get('constants.slogan') ?></title>

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">

    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo Config::get('constants.site_name') ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页</a></li>
                <li><a href="#">iOS 8图标</a></li>
                <li><a href="#">WebApp图标</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">PSD模板 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">iOS图标模板</a></li>
                        <li><a href="#">Andriod图标模板</a></li>
                        <li><a href="#">OS X图标模板</a></li>
                        <li><a href="#">截屏模板</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">来源</li>
                        <li><a href="http://appicontemplate.com/" target="_blank">App Icon Template</a></li>
                    </ul>
                </li>
                <li><a href="http://wuruihong.com" target="_blank">睿鸿游戏</a></li>
                <li><a href="#about">关于我们</a></li>
                <li><a href="#contact">联系我们</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <form class="jumbotron" action="/icon/upload" method="post" id="if_form">
        <h2><?php echo Config::get('constants.slogan') ?></h2>
        <div id="jumbotron_img_box">
            <img src="img/launcher.png" alt="" id="jumbotron_img"/>
            <div id="jumbotron_img_loading">
                <div class="circle"></div>
                <div class="circle1"></div>
            </div>
        </div>
        <p><strong>拖放您的设计文件到这里。</strong></p>
        <p>支持jpg, png, psd文件。上传1024x1024像素的图片以获得最佳效果。</p>
        <p><a href="javascript:;" class="btn btn-primary btn-lg" id="if_btn">或者点击这里上传</a></p>
        <div id="if_submitting" class="alert alert-success" role="alert">生成中，请稍候...</div>
        <input type="file" id="if" style="float:right; visibility: hidden"/>
    </form>

    <div class="row row-margin">
        <div class="col-md-4">
            <div class="media">
                <a class="media-left" href="#">
                    <img src="img/folder.png" />
                </a>
                <div class="media-body">
                    同时生成 <strong>iOS</strong> 和 <strong>Android</strong> 应用所需的各种尺寸的图标。遵循
                    <a href="https://developer.apple.com/library/ios/documentation/UserExperience/Conceptual/MobileHIG/IconMatrix.html" target="_blank">
                        <span class="label label-success">Apple</span></a>
                    和
                    <a href="https://developer.android.com/design/style/iconography.html#launcher" target="_blank">
                        <span class="label label-success">Google</span></a>
                    官方的最新标准。
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media">
                <a class="media-left" href="#">
                    <img src="img/eye.png" />
                </a>
                <div class="media-body">
                    快速预览将要在不同设备上显示的应用图标。使您无需部署即可通过预览来调整设计样式。
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media">
                <a class="media-left" href="#">
                    <img src="img/opt.png" />
                </a>
                <div class="media-body">
                    优化图标，尤其是尺寸较小的图标。保证清晰度，并优化图片内存占用，减小包体积，提高性能。
                </div>
            </div>
        </div>
    </div>

</div> <!-- /container -->

<div class="index-section bg-eee">
    <div class="container">
        <h1>使用PSD + Actions模板生成图标</h1>

        <div class="row">
            <a class="col-md-3" href="#">
                <img src="img/ios8.png" alt=""/>
                <h2>iOS应用图标</h2>
                <p class="description">从具有纹理，iOS渐变和颜色的单一大小图片快速渲染生成所有iOS 5, 6, 7 & 8的图标。预览图标在Wish list，App Store和Home屏上的效果，用Actions一键导出。</p>
                <p><strong>版本：4.0，更新于2014-09</strong></p>
            </a>
            <a class="col-md-3" href="#">
                <img src="img/android.png" alt=""/>
                <h2>Android启动器图标</h2>
                <p class="description">该模板可以快速渲染生成不同尺寸的Android启动器图标。包含纹理，以及Ice Cream Sandwich屏幕预览。可以使用Actions一键导出。</p>
                <p><strong>版本：1.1，更新于2014-03</strong></p>
            </a>
            <a class="col-md-3" href="#">
                <img src="img/osx.png" alt=""/>
                <h2>OS X桌面图标</h2>
                <p class="description">如果您正在为OS X桌面应用程序创建图标，这个模板可以帮助您生成不同尺寸的图标，并快速预览在Dock、Finder和App Store中的效果。</p>
                <p><strong>版本：1.0，更新于2014-06</strong></p>
            </a>
            <a class="col-md-3" href="#">
                <img src="img/iphonescreenshot.png" alt=""/>
                <h2>iPhone截屏</h2>
                <p class="description">从最大尺寸的截图快速生成4种尺寸的图片。通过内置的Actions，一键生成最多20张截屏！</p>
                <p><strong>版本：1.0，更新于2014-12</strong></p>
            </a>
        </div>

    </div>
</div>

<footer>
    <p>睿鸿游戏　版权所有　Copyright(C) 2015　All Rights Reserved　豫ICP备14010348号-1</p>
</footer>

<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="js/main.js"></script>
</body>
</html>
