@extends('master')
@section('container')
    <div class="container container-article">
        <div class="row">
            <div class="col-sm-9">
                <h1>常见问题</h1>
                <dl>
                    <dt>Q: iOS 生成的图标：PNG透明背景原图片，生成后为什么变成了白色背景效果图标？</dt>
                    <dd>
                        <ul>
                            <li>A: iOS 图标不支持透明图层。生成时会默认添加白色背景。背景颜色可以在“可选参数”中设置。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>Q: 请问 iOS 不可以生成圆角么？</dt>
                    <dd>
                        <ul>
                            <li>A: iOS 系统会自动添加圆角。推荐上传正方形（不含圆角）的图片。生成的图片也全是正方形的，可以直接拖放到 Xcode 里（以及上传到 AppStore Connect）。</li>
                        </ul>
                    </dd>
                </dl>
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
      window.state = 'faq';
    </script>
@endsection
