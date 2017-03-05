@extends('master')
@section('container')
    <div class="container container-article">
        <div class="row">
            <div class="col-sm-9">
                <h1 style="margin-bottom: 20px;">需求投票</h1>
                <p>为你最想要的需求投上一票(每人3票)！你也可以添加新的需求。</p>
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
        window.state = 'vote';
    </script>
@endsection