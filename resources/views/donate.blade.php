@extends('master')

@section('head')
    <style>
        .container.container-article p, .container.container-article ul {
            padding-bottom: 8px;
        }

        .container.container-article h3 {
            margin-bottom: 15px;
        }

        .container.container-article .donate-methods {
            text-align: center;
        }

        .container.container-article .donate-methods .col-sm-6 {
            margin-bottom: 40px;
        }

        .container.container-article .donate-methods .col-sm-6 img {
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('container')
    <div class="container container-article">
        <h1>捐助我们</h1>
        <p>感谢您使用“图标工场”提供的服务。我们承诺应用图标（不含其他服务）生成功能永久免费，您可以自由使用，并且我非常乐意您能将它推荐给朋友们。</p>
        <p>如果您感觉到图标工场能带来帮助，希望您能进行捐赠，这将是图标工场未来持续改进的保障。捐助的资金将用于：</p>
        <ul>
            <li>站点服务器、域名费用</li>
            <li>站点日常维护</li>
            <li>新功能开发和 bug 修复</li>
        </ul>
        <p>在捐赠时您可以给我们留言，附上最想添加的新功能（可以用短链接形式附上详情需求），我们会根据需求度尽快开发上线。</p>

        <div class="row donate-methods">
            <div class="col-sm-6">
                <img src="/img/WeChatPay_sm.png" alt="">
                <div>微信支付捐赠</div>
            </div>
            <div class="col-sm-6">
                <img src="/img/AliPay_sm.png" alt="">
                <div>支付宝捐赠</div>
            </div>
        </div>

        <h3>捐赠者列表</h3>
        <p>所有捐赠者、金额、留言都会在下面列出，感谢您的支持。</p>
        <table class="table table-hover table-dense table-primary table-bordered">
            <thead>
            <tr>
                <th>捐赠时间</th>
                <th>金额</th>
                <th>捐赠人</th>
                <th>捐赠方式</th>
                <th>留言</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>2019-09-02 15:32:08</td>
                <td>20.00元</td>
                <td>*瑞红</td>
                <td>微信</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
    <script>
      window.state = 'donate';
    </script>
@endsection
