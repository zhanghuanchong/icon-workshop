<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="app图标缩放,应用图标生成工具,批量生成iOS图标,批量生成Android图标,app图标,图标缩放,iwatch图标,phonegap图标,图标模板">
    <meta name="description" content="一键快速生成iOS, Android，Windows Phone, WebApp, iWatch(watchOS), PhoneGap(Cordova)等移动平台不同大小(规格尺寸)的App图标，快速预览，提供丰富选项，可以直接打包发布到应用市场，并提供相应的PSD模板。">
    <meta name="author" content="睿鸿游戏">
    <link rel="icon" href="/favicon.ico">

    <title>{{ Config::get('constants.site_name') . ' - ' . Config::get('constants.slogan') }}</title>

    @if(App::environment('local'))
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/sweet-alert.css">
        <link rel="stylesheet" href="/css/select2.min.css">
        <link rel="stylesheet" href="/css/main.css">
    @else
        <link rel="stylesheet" href="/css/all.css?_={{Config::get('constants.version')}}">
    @endif

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
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
            <a class="navbar-brand" href="/" style="color: white">
                <img src="/img/rh_site_icon_20.png" alt="" style="display: inline; vertical-align: top"/>
                <?php echo Config::get('constants.site_name') ?>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">首页</a></li>
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
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    @yield('content')

</div> <!-- /container -->

@yield('bottom')

<footer>
    <p>
        <a href="http://wuruihong.com" target="_blank" style="color:white">睿鸿游戏</a>　
        版权所有　Copyright(C) 2015　All Rights Reserved　豫ICP备14010348号-1
        <script>
            var _hmt = _hmt || [];
            (function() {
                var hm = document.createElement("script");
                hm.src = "//hm.baidu.com/hm.js?692ad0a1a2349a69b58c26d6ee6e2790";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </p>
</footer>

@if(App::environment('local'))
    <script src="/js/jquery-1.11.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/sweet-alert.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/select2.zh-CN.js"></script>
    <script src="/js/main.js"></script>
@else
    <script src="/js/all.js?_={{Config::get('constants.version')}}"></script>
@endif
<!--[if IE 10]>
<script src="/js/ie10-viewport-bug-workaround.js"></script>
<![endif]-->
@yield('footer')
</body>
</html>
