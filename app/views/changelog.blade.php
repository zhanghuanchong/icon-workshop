@extends('master')
@section('container')
    <div class="container container-article">
        <div class="row">
            <div class="col-sm-9">
                <h1>更新日志</h1>
                <dl>
                    <dt>2017-02-21</dt>
                    <dd>
                        <ul>
                            <li>更新：为 Android 平台添加设置文件名的支持。</li>
                            <li>更新：站点字体使用微软雅黑。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2016-12-30</dt>
                    <dd>
                        <ul>
                            <li>更新：为 Android 和 Web App 平台添加自动圆角支持。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2016-12-21</dt>
                    <dd>
                        <ul>
                            <li>修复：优化缓存策略，删除不必要的缓存，增加系统稳定性。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2016-11-22</dt>
                    <dd>
                        <ul>
                            <li>更新: 添加对 iOS 10 新图标尺寸的支持</li>
                            <li>更新: Android 文件夹默认使用 mipmap, 保留对 drawable 的支持。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2016-05-01</dt>
                    <dd>
                        <ul>
                            <li>更新: 为 iOS 和 Windows Phone 平台添加背景颜色的选项. 调整自定义大小的背景颜色为透明</li>
                            <li>更新: 自动删除 15 天前生成的图标. 支持自动重新生成</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2016-03-22</dt>
                    <dd>
                        <ul>
                            <li>修复: 去除 iOS 及 Windows Phone 平台的 Alpha 通道</li>
                            <li>更新: 优化菜单结构, 添加使用教程(待完善)及更新日志菜单</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2016-02-20</dt>
                    <dd>
                        <ul>
                            <li>更新: 添加对 iOS 9 新图标尺寸的支持</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2016-01-24</dt>
                    <dd>
                        <ul>
                            <li>更新: 上传图片时, 添加上传进度条</li>
                            <li>更新: 上传图片时, 可以通过设置表单修改生成参数</li>
                            <li>更新: 添加对自定义大小的支持</li>
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
        window.state = 'changelog';
    </script>
@endsection