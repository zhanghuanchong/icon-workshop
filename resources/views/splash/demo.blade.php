@extends('master')
@section('container')
    <div class="container container-article">
        <h2 style="margin-bottom: 30px;">启动图生成工具视频演示</h2>

        @if(!App::environment('local'))
            <div class="row">
                <div class="col-md-8">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- splash left -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:728px;height:90px"
                         data-ad-client="ca-pub-5072970286349933"
                         data-ad-slot="9575098734"></ins>
                    <script>
                      (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div class="col-md-4">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- splash right -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:320px;height:100px"
                         data-ad-client="ca-pub-5072970286349933"
                         data-ad-slot="3909383671"></ins>
                    <script>
                      (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        @endif

        <video src="/img/splash/demo.mp4" controls autoplay style="width:100%"></video>
    </div>
    <script>
      window.state = 'splash';
    </script>
@endsection
