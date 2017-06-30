@extends('master')
@section('container')
    <div class="container container-article">
        <div class="row">
            <div class="col-sm-9">
                <h1 style="margin-bottom: 20px;">需求投票</h1>
                <p>为你最想要的需求投上一票(每人3票)！你也可以提交新的需求。我们将优先开发票数得最多的需求。</p>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10"></div>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-2">
                        <div class="form-group label-floating">
                            <div class="input-group">
                                <label class="control-label" for="new_requirement">您有新的需求？</label>
                                <input type="text" id="new_requirement" class="form-control" name="new_requirement">
                                <span class="input-group-btn">
                                <button class="btn btn-primary btn-raised">提交</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
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
        window.state = 'vote';
    </script>
@endsection