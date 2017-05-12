@extends('master')
@section('container')
    <div class="container">
        <h1>关于我们</h1>
        <p>
            睿鸿游戏, 教育类移动游戏专家.
        </p>
        <p>
            欢迎您对本工具提出宝贵的意见和建议!
        </p>
        <ul style="list-style:none">
            <li><i class="fa fa-envelope-o"></i>: <a href="mailto:admin@wuruihong.com">admin@wuruihong.com</a></li>
        </ul>

        @include('ad')
    </div>
    <script>
        window.state = 'about';
    </script>
@endsection