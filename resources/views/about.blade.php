@extends('master')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>关于我们</h1>
                <p style="margin: 20px 0">
                    使用中有什么问题建议在 GitHub 里
                    <a href="https://github.com/zhanghuanchong/icon-workshop/issues/new"
                       style="color: orangered; text-decoration: underline"
                       target="_blank"><strong>提交 issue</strong></a>，
                    并附上问题说明和截图等文件，以便我们尽快修复或改进，谢谢。
                </p>

                <p class="lh-28 flex" style="margin: 20px 0">
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

                <ul style="list-style:none; margin-bottom: 30px">
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
