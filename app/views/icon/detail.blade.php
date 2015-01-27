@extends('master')

@section('content')

<style type="text/css">
    #tp_tabs li a {
        font-size: 16px;
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

        @include('icon.detail_ios')

        <div role="tabpanel" class="tab-pane fade" id="tp_android">
            <div class="row">
                <div class="col-md-6" style="background: url('/img/nexus5.png') no-repeat; height:743px;">
                    <div style="position: absolute; left:50px; top:180px;">
                        <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:64px; height:64px;" />
                        <p style="color: #ccc;font-weight: normal;font-size: 12px;text-align: center;padding-top: 8px; font-weight:bold">您的应用</p>
                    </div>
                </div>
                <div class="col-md-6 icons-col">
                    <div class="row icons-row">
                        <div class="col-sm-6">
                            <div style="line-height: 48px; vertical-align: middle">
                                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:36px; height:36px;" />
                            </div>
                            <div class="description">
                                1x<br/>
                                LDPI
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:48px; height:48px;" />
                            </div>
                            <div class="description">
                                1x<br/>
                                MDPI
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row">
                        <div class="col-sm-6">
                            <div style="line-height: 96px; vertical-align: middle">
                                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:72px; height:72px;" />
                            </div>
                            <div class="description">
                                1.5x<br/>
                                HDPI
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:96px; height:96px;" />
                            </div>
                            <div class="description">
                                2x<br/>
                                XDPI
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row">
                        <div class="col-sm-6">
                            <div style="line-height: 192px; vertical-align: middle">
                                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:144px; height:144px;" />
                            </div>
                            <div class="description">
                                3x<br/>
                                XXDPI
                            </div>
                        </div>
                        <div class="col-sm-6">
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