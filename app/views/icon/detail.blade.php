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
</style>

<div class="alert alert-info" role="alert" style="font-size:16px">
    <div class="row">
        <div class="col-md-6">
            <strong>生成成功！</strong>在下面预览您的图标并
            <a class="btn btn-success" style="padding: 6px 40px; margin-left: 10px;" href="/icon/download/<?php echo $design->id ?>">点击下载</a>
        </div>
        <div class="col-md-6" style="text-align: right">
            <form class="form-inline" role="form" onsubmit="return false;">
                <dif class="form-group">
                    <input type="email" class="form-control" placeholder="发送到邮箱并订阅" style="width:250px">
                    <button type="button" class="btn btn-primary" id="subscribe">发送</button>
                </dif>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-5072970286349933"
             data-ad-slot="9885771622"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <div class="col-md-4">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:inline-block;width:320px;height:100px"
             data-ad-client="ca-pub-5072970286349933"
             data-ad-slot="2362504825"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
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

        @include('icon.detail_android')

        @if (isset($withExtra))
        <div role="tabpanel" class="tab-pane fade" id="tp_winphone">

        </div>
        <div role="tabpanel" class="tab-pane fade" id="tp_webapp">

        </div>
        @endif
    </div>

</div>
@stop

@section('footer')
<script type="text/javascript">
    $(function(){
        var btnSubscribe = $("#subscribe");
        var form = btnSubscribe.parents('form').eq(0);
        btnSubscribe.on('click', function(){
            var t = $(this);
            var input = form.find('input[type=email]');
            var v = $.trim(input.val());
            var reg = /^[a-z0-9-_]([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i;
            if (!v || !reg.test(v)) {
                input.focus();
                return;
            }
            form.hide().after('<div style="margin-top: 5px">订阅成功！即将发送到您的邮箱，请随后查收！</div>');
            $.post('/icon/subscribe', {
                design_id : '<?php echo $design->id ?>',
                mail : v
            });
        });

        form.on('submit', function(){
            btnSubscribe.click();
        });
    });
</script>
@stop