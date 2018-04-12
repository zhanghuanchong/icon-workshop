@extends('master')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>关于我们</h1>
                <p>
                    睿鸿游戏, 教育类移动游戏专家.
                </p>
                <p>
                    欢迎您对本工具提出宝贵的意见和建议!
                </p>
                <ul style="list-style:none">
                    <li><i class="fa fa-envelope-o"></i>: <a href="mailto:admin@wuruihong.com">admin@wuruihong.com</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- 关于页 -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-5072970286349933"
                     data-ad-slot="6004594517"
                     data-ad-format="auto"></ins>
                <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>

        @include('comment', ['name' => '1'])
    </div>
    <script>
        window.state = 'about';
    </script>
@endsection