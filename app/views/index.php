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

<!-- Fixed navbar -->
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
                <li><a href="#about">睿鸿游戏</a></li>
                <li><a href="#about">关于我们</a></li>
                <li><a href="#contact">联系我们</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="jumbotron">
        <h2><?php echo Config::get('constants.slogan') ?></h2>
        <p><strong>拖放您的设计文件到这里。</strong>支持jpg, png, psd文件。上传1024x1024像素的图片以获得最佳效果。</p>
        <p><a href="#" class="btn btn-primary btn-lg">或者点击这里上传</a></p>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="media">
                <a class="media-left" href="#">
                    <img src="img/folder.png" />
                </a>
                <div class="media-body">
                    同时生成iOS和Andriod应用所需的各种尺寸的图标。遵循
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

    <hr>

    <footer>
        <p>&copy; Company 2014</p>
    </footer>

</div> <!-- /container -->

<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
