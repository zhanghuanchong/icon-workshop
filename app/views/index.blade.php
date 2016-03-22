@extends('master')
@section('container')
    <div class="container" ui-view></div>
@endsection

@section('scripts')
    @if(App::environment('local'))
        <script src="/js/routes.js"></script>
        <script src="/js/app/home.ctrl.js"></script>
        <script src="/js/app/icon.ctrl.js"></script>
        <script src="/js/app/admin.ctrl.js"></script>
    @else
        <script src="/js/routes.js?_={{ $GLOBALS['_VER_'] }}"></script>
    @endif
@endsection