@extends('master')
@section('container')
    <div class="container container-article">
        <h1>更新日志</h1>
        <dl>
            <dt>2016-11-22</dt>
            <dd>
                <ul>
                    <li>更新: 添加对iOS 10新图标尺寸的支持</li>
                    <li>更新: Android文件夹默认使用mipmap, 保留对drawable的支持。</li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>2016-05-01</dt>
            <dd>
                <ul>
                    <li>更新: 为iOS和Windows Phone平台添加背景颜色的选项. 调整自定义大小的背景颜色为透明</li>
                    <li>更新: 自动删除15天前生成的图标. 支持自动重新生成</li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>2016-03-22</dt>
            <dd>
                <ul>
                    <li>修复: 去除iOS及Windows Phone平台的Alpha通道</li>
                    <li>更新: 优化菜单结构, 添加使用教程(待完善)及更新日志菜单</li>
                </ul>
            </dd>
        </dl>
        <dl>
            <dt>2016-02-20</dt>
            <dd>
                <ul>
                    <li>更新: 添加对iOS 9新图标尺寸的支持</li>
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
    <script>
        window.state = 'changelog';
    </script>
@endsection