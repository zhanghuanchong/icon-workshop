@extends('master')
@section('container')
    <div class="container container-article">
        <h1>更新日志</h1>
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