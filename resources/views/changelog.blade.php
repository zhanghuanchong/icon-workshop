@extends('master')
@section('container')
    <div class="container container-article">
        <div class="row">
            <div class="col-sm-9">
                <h1>更新日志</h1>
                <dl>
                    <dt>2019-05-16</dt>
                    <dd>
                        <ul>
                            <li>修复：页面卡顿问题。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2019-04-05</dt>
                    <dd>
                        <ul>
                            <li>更新：启动图生成工具 添加对 iPhone Xs Max 和 iPhone XR 的支持；</li>
                            <li>更新：启动图生成工具 完善界面“最大化”功能。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2019-02-13</dt>
                    <dd>
                        <ul>
                            <li>发布：基础启动图生成工具。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2018-11-28</dt>
                    <dd>
                        <ul>
                            <li>更新：添加 Quasar 平台支持（仅生成默认 PWA 图标）。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2018-10-30</dt>
                    <dd>
                        <ul>
                            <li>更新：Phonegap / Cordova 平台生成的 iOS 图标使用标准尺寸。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2018-10-28</dt>
                    <dd>
                        <ul>
                            <li>更新：恢复 iOS 的 57x57 和 72x72 尺寸。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2018-10-04</dt>
                    <dd>
                        <ul>
                            <li>更新：放宽文件大小限制至 10 MB。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2018-09-24</dt>
                    <dd>
                        <ul>
                            <li>更新：删除旧 iOS 格式支持。</li>
                            <li>更新：更新 iOS 预览图。</li>
                            <li>更新：更新 PhoneGap (Cordova) 中对 Android 图标的支持。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2018-05-05</dt>
                    <dd>
                        <ul>
                            <li>更新：优化大图生成速度。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2018-04-10</dt>
                    <dd>
                        <ul>
                            <li>修复：上传文件报 “文件无效” 错误。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2017-11-12</dt>
                    <dd>
                        <ul>
                            <li>更新：iOS appiconset 添加 1024x1024 尺寸。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2017-06-30</dt>
                    <dd>
                        <ul>
                            <li>更新：保存自定义大小以方便以后使用，添加清空自定义大小功能。</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>2017-03-06</dt>
                    <dd>
                        <ul>
                            <li>更新：添加 iOS 和 Android 的平台的使用教程。</li>
                        </ul>
                    </dd>
                </dl>
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

        <script src="//cdn1.lncld.net/static/js/3.0.4/av-min.js"></script>
        <script src='//unpkg.com/valine/dist/Valine.min.js'></script>
        <div id="vcomments"></div>
        <script>
          new Valine({
            el: '#vcomments',
            appId: 'EV3B7qpoac7VfyENfi1U0XXC-gzGzoHsz',
            appKey: 'A78Q7lpOQ4AgaJPwfh2n08xd',
            avatar: 'robohash',
            placeholder: '您发现了什么问题或者有什么建议？',
            recordIP: true
          })
        </script>
    </div>
    <script>
        window.state = 'changelog';
    </script>
@endsection
