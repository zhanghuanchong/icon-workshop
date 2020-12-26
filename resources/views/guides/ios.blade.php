@extends('master')
@section('container')
    <div class="container container-article container-single">
        <div class="row">
            <div class="col-sm-9">
                <h1>使用教程 - {{ $platform }}</h1>
                <h3>第一步：上传并生成图片</h3>
                <img class="normal-image" src="/img/guide/ios_1.jpg" alt="">
                <h3>第二步：下载图标</h3>
                <img class="normal-image" src="/img/guide/ios_2.jpg" alt="">
                <h3>第三步：集成到Xcode</h3>
                <p>删除项目文件Assets.xcassets中原有的AppIcon，将下载的压缩包中的AppIcon.appiconset拖放进去。你也可以在Finder中覆盖这个文件。</p>
                <img class="normal-image" src="/img/guide/ios_3.jpg" alt="">
                <h3>第四步：编译完成</h3>
                <p>Enjoy!</p>
                <img class="normal-image" src="/img/guide/ios_4.jpg" alt="">
            </div>

            <div class="col-sm-3">
                @if(!App::environment('local'))
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:300px;height:600px"
                         data-ad-client="ca-pub-5072970286349933"
                         data-ad-slot="5196596422"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                @endif
            </div>
        </div>
    </div>

    <script>
        window.state = 'guide';
    </script>
@endsection
