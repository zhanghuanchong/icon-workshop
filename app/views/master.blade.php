<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="应用图标生成工具,批量生成iOS图标,批量生成Android图标,图标,icon,生成,图标模板">
    <meta name="description" content="一键生成iOS, Android平台的应用图标，并提供PSD模板">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title><?php echo Config::get('constants.site_name') . ' - ' . Config::get('constants.slogan') ?></title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/sweet-alert.css">
    <link rel="stylesheet" href="/css/main.css">

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
            <a class="navbar-brand" href="/">
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
                <li><a href="#contact">联系我们</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    @yield('content')

</div> <!-- /container -->

@yield('bottom')

<footer>
    <p>睿鸿游戏　版权所有　Copyright(C) 2015　All Rights Reserved　豫ICP备14010348号-1</p>
</footer>

<script src="/js/jquery-1.11.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<!--[if IE 10]>
<script src="/js/ie10-viewport-bug-workaround.js"></script>
<![endif]-->
<script src="/js/sweet-alert.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
