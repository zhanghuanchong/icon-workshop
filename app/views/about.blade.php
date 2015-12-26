@extends('master')

@section('content')
    <h1>关于我们</h1>
    <p>
        睿鸿游戏, 教育类移动游戏专家.
    </p>
    <p>
        欢迎您对本工具提出宝贵的意见和建议!
    </p>
    <ul>
        <li>Mail: <a href="#" id="mail_link"></a></li>
    </ul>

    <div style="margin-top: 40px">
        <!-- UY BEGIN -->
        <div id="uyan_frame"></div>
        <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=1724540"></script>
        <!-- UY END -->
    </div>
@stop

@section('footer')
    <script>
        $(function(){
            var mail = 'admin' + '@' + 'wuruihong.com';
            $("#mail_link").attr('href', 'mailto:' + mail).html(mail);
        });
    </script>
@stop
