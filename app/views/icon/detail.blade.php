@extends('master')

@section('content')

<div class="alert alert-success" role="alert" style="text-align: center; font-size:16px">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
    <strong>生成成功！</strong>预览您的图标并下载：
</div>

<div role="tabpanel" style="font-weight: bold">

    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">iOS</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Android</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Web App</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home">...</div>
        <div role="tabpanel" class="tab-pane fade" id="profile">...</div>
        <div role="tabpanel" class="tab-pane fade" id="messages">...</div>
    </div>

</div>

<h1>Icon Detail</h1>
<img src="/files/<?php echo $design->getFilePath(); ?>" />
<?php
var_dump($design);
?>
@stop