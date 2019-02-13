@extends('master')
@section('container')
    <div class="container container-article">
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

        <div class="alert alert-success">
            公测中，欢迎试用！
            <a href="javascript:"
               onclick="$('#SOHUCS')[0].scrollIntoView()"
               class="btn btn-raised pull-right"
               style="margin: -8px 0; color:#1976d2; margin-left:20px;">提供反馈</a>
            <a href="javascript:" class="btn btn-raised pull-right" style="margin: -8px 0; color:#1976d2">视频演示</a>
        </div>

        <iframe src="/dist/spa-mat/index.html" id="main-frame" frameborder="0"></iframe>

        <div id="SOHUCS" sid="splash"></div>
        <script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
        <script type="text/javascript">
          window.changyan.api.config({
            appid: 'cysYYpGQc',
            conf: 'prod_e3f50564abc49adec1eeba0d0a97d66b'
          });
        </script>
    </div>
    <script>
      window.state = 'splash';
    </script>
    <style>
        #main-frame {
            width: 100%;
            height: 700px;
        }
    </style>
@endsection
