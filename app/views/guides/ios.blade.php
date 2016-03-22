@extends('master')
@section('container')
    <div class="container container-article">
        <div class="row">
            <div class="col-md-12">
                <h1>使用教程 - {{ $platform }}</h1>
                <p>程序猿正在拼(wo)命(niu)写教程，请稍候...</p>

                @if(!App::environment('local'))
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
                @endif
            </div>
        </div>
    </div>

    <script>
        window.state = 'guide';
    </script>
@endsection