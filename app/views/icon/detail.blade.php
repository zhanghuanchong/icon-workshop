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