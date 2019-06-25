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
            第一次使用请先观看 <a style="text-decoration: underline" href="/splash/demo">视频演示</a>，请提前准备好图片或文字资料。
            <a href="javascript:"
               onclick="$('#vcomments')[0].scrollIntoView()"
               class="btn btn-raised pull-right"
               style="margin: -8px 0; color:#1976d2; margin-left:20px;">提供反馈</a>
            <a href="/splash/demo" target="_blank" class="btn btn-raised pull-right" style="margin: -8px 0; color:#1976d2">视频演示</a>
        </div>

        <iframe src="/dist/spa-mat/index.html?_={{ $GLOBALS['_VER_'] }}" id="main-frame" frameborder="0"></iframe>

        <div class="alert alert-success" style="margin-top: 15px">
            感谢开源社区贡献者：<a href="https://github.com/kuaifan" target="_blank">https://github.com/kuaifan</a>
        </div>

        @include('comment', ['name' => 'splash'])
    </div>
    <script>
      window.state = 'splash';

      window.addEventListener('message', function (evt) {
        if (evt.origin !== location.origin) {
          return;
        }
        if (evt.data === 'iframe-fullscreen-on') {
          $('body').addClass('iframe-fullscreen');
        } else if (evt.data === 'iframe-fullscreen-off') {
          $('body').removeClass('iframe-fullscreen');
        }
      }, false);
    </script>
    <style>
        #main-frame {
            width: 100%;
            height: 700px;
            box-shadow: 0 0 5px #027BE3;
        }

        body.iframe-fullscreen {
            overflow: hidden;
        }

        body.iframe-fullscreen #main-frame {
            width: 100vw;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 99999999999;
        }
    </style>
@endsection
