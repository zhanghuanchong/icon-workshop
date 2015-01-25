@extends('master')

@section('content')

<style type="text/css">
    #tp_tabs li a {
        font-size: 16px;
    }
    #tp_ios .icons-row .icon-row {
        vertical-align: middle;
        height: 56px;
        line-height: 56px;
    }
    #tp_contents {
        padding:30px 70px 0;
    }
    #tp_contents .icons-row {
        margin-bottom: 45px;
    }
    #tp_contents .icons-col {
        font-weight: normal;
        text-align: center;
        padding-top:50px;
        color: #999;
        font-size:11px;
    }
    #tp_contents .description {
        border-top: 1px solid silver;
        margin-top: 5px;
        padding-top: 5px;
    }
    #tp_contents #tp_android .description {
        border-top-width: 0;
        line-height: 1.8em;
        margin-top: 0;
    }
    #tp_contents #tp_android .icons-row {
        margin-bottom: 15px;
    }
</style>

<div class="alert alert-info" role="alert" style="font-size:16px">
    <div class="row">
        <div class="col-md-6">
            <strong>生成成功！</strong>在下面预览您的图标并 <button type="button" class="btn btn-primary">下载</button>
        </div>
        <div class="col-md-6" style="text-align: right">
            <form class="form-inline" role="form">
                <dif class="form-group">
                    <input type="email" class="form-control" placeholder="发送到邮箱并订阅" style="width:250px">
                    <button type="button" class="btn btn-primary">发送</button>
                </dif>
            </form>
        </div>
    </div>
</div>

<div role="tabpanel" style="font-weight: bold">

    <ul class="nav nav-tabs nav-justified" role="tablist" id="tp_tabs">
        <li role="presentation" class="active"><a href="#tp_ios" aria-controls="tp_ios" role="tab" data-toggle="tab">iOS</a></li>
        <li role="presentation"><a href="#tp_android" aria-controls="tp_android" role="tab" data-toggle="tab">Android</a></li>
        @if (isset($withExtra))
        <li role="presentation"><a href="#tp_winphone" aria-controls="tp_winphone" role="tab" data-toggle="tab">Windows Phone</a></li>
        <li role="presentation"><a href="#tp_webapp" aria-controls="tp_webapp" role="tab" data-toggle="tab">Web App</a></li>
        @endif
    </ul>

    <div class="tab-content" id="tp_contents">
        <div role="tabpanel" class="tab-pane fade in active" id="tp_ios">
            <div class="row">
                <div class="col-md-6" style="background: url('/img/iphone6.png') no-repeat; height:743px; position: relative">
                    <div style="position: absolute; left:235px; top:489px;">
                        <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:61px; height:61px;" />
                        <p style="color: #ccc;font-weight: normal;font-size: 12px;text-align: center;padding-top: 4px;">您的应用</p>
                    </div>
                </div>
                <div class="col-md-6 icons-col">
                    <div class="row icons-row">
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:29px; height:29px;" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:56px; height:56px;" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPhone<br/>
                                Spotlight - iOS 6,6<br/>
                                Settings - iOS 5-8<br/>
                                29pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-12">
                                    <img src="/files/<?php echo $design->getFilePath() ?>" alt="" style="width:56px; height:56px;"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">2x</div>
                            </div>
                            <div class="description">
                                iPhone Spotlight<br/>
                                iOS 7, 8<br/>
                                40pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:56px; height:56px;" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:56px; height:56px;" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPhone App<br/>
                                iOS 5,6<br/>
                                57pt
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row">
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:56px; height:56px;" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:56px; height:56px;" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">2x</div>
                                <div class="col-xs-6">3x</div>
                            </div>
                            <div class="description">
                                iPhone App<br/>
                                iOS 7,8<br/>
                                60pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath() ?>" alt="" style="width:29px; height:29px;"/>
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath() ?>" alt="" style="width:56px; height:56px;"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPad Settings<br/>
                                iOS 5, 8<br/>
                                29pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:40px; height:40px;" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:56px; height:56px;" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPad Spotlight<br/>
                                iOS 7,8<br/>
                                40pt
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row">
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:56px; height:56px;" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:56px; height:56px;" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPad Spotlight<br/>
                                iOS 5,6<br/>
                                50pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath() ?>" alt="" style="width:56px; height:56px;"/>
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath() ?>" alt="" style="width:56px; height:56px;"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPad Add<br/>
                                iOS 5, 8<br/>
                                72pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:56px; height:56px;" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:56px; height:56px;" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPad App<br/>
                                iOS 7,8<br/>
                                76pt
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 20px">
                        <div class="col-md-12" style="color: black; font-size:13px">
                            以及
                            <a href="#"><span class="label label-info" style="font-size:13px;">iTunesArtwork.png</span></a>
                            和
                            <a href="#"><span class="label label-info" style="font-size:13px;">iTunesArtwork@2x.png</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tp_android">
            <div class="row" style="padding:0 50px">
                <div class="col-md-6" style="background: url('/img/nexus5.png') no-repeat; height:743px;">
                    <div style="position: absolute; left:50px; top:180px;">
                        <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:64px; height:64px;" />
                        <p style="color: #ccc;font-weight: normal;font-size: 12px;text-align: center;padding-top: 8px; font-weight:bold">您的应用</p>
                    </div>
                </div>
                <div class="col-md-6 icons-col">
                    <div class="row icons-row">
                        <div class="col-sm-6">
                            <div style="line-height: 72px; vertical-align: middle">
                                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:48px; height:48px;" />
                            </div>
                            <div class="description">
                                1x<br/>
                                MDPI
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:72px; height:72px;" />
                            </div>
                            <div class="description">
                                1.5x<br/>
                                HDPI
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row">
                        <div class="col-sm-6">
                            <div style="line-height: 144px; vertical-align: middle">
                                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:96px; height:96px;" />
                            </div>
                            <div class="description">
                                2x<br/>
                                XDPI
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:144px; height:144px;" />
                            </div>
                            <div class="description">
                                3x<br/>
                                XXDPI
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row">
                        <div class="col-sm-12">
                            <div>
                                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:192px; height:192px;" />
                            </div>
                            <div class="description">
                                4x<br/>
                                XXXDPI
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row" style="padding-top: 30px">
                        <div class="col-sm-12">
                            以及
                            <a href="#"><span class="label label-info" style="font-size:13px;">Google Play 图标</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (isset($withExtra))
        <div role="tabpanel" class="tab-pane fade" id="tp_winphone">

        </div>
        <div role="tabpanel" class="tab-pane fade" id="tp_webapp">

        </div>
        @endif
    </div>

</div>

<!--<img src="/files/--><?php //echo $design->getFilePath(); ?><!--" />-->
<?php
//var_dump($design);
?>
@stop