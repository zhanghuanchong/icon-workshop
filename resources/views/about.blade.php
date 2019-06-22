@extends('master')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>关于我们</h1>
                <p class="mt-10">
                    欢迎您对本工具提出宝贵的意见和建议!
                </p>
                <p class="mt-10 lh-28 flex">
                    如果帮到你了，请
                    <span class="ml-10">
                        <a class="github-button" href="https://github.com/zhanghuanchong/icon-workshop"
                           data-size="large" data-show-count="true"
                           aria-label="Star zhanghuanchong/icon-workshop on GitHub">Star</a>
                    </span>
                    <span class="ml-10">
                        <a class="github-button" href="https://github.com/zhanghuanchong/icon-workshop/issues"
                           data-size="large" data-show-count="true"
                           aria-label="Issue zhanghuanchong/icon-workshop on GitHub">Issue</a>
                    </span>
                </p>
                <ul style="list-style:none">
                    <li><i class="fa fa-envelope-o"></i>
                        <a href="mailto:" class="ml-10 admin-email">ceo at wuruihong.com</a></li>
                    <li class="mt-10"><i class="fa fa-road"></i>
                        <a href="https://github.com/zhanghuanchong/icon-workshop/projects/1"
                           class="ml-10" target="_blank">开发路线</a></li>
                </ul>
                <p class="mt-10">感谢以下开源社区贡献者：</p>
                <ul style="margin-bottom: 20px">
                    <li>
                        <a href="https://github.com/kuaifan" target="_blank">https://github.com/kuaifan</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8" style="padding-top: 70px;">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- 关于页 -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-5072970286349933"
                     data-ad-slot="6004594517"
                     data-ad-format="auto"></ins>
                <script>
                    window.onload = function () {
                      (adsbygoogle = window.adsbygoogle || []).push({});
                    };
                </script>
            </div>
        </div>

        @include('comment', ['name' => 'about'])
    </div>
    <script>
        window.state = 'about';
    </script>
@endsection

@section('scripts')
    <script>
      $(function () {
        var mail = 'ceo' + '@' + 'wuruihong.com';
        $('.admin-email').attr('href', 'mailto:' + mail).text(mail);
      });
    </script>
@stop