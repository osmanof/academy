@extends('layouts.standart')

@section('title')
Вход – Delta Academy
@endsection

@section('scripts')
<script src="/js/second/index.js"></script>
<script src="/js/login/index.js" type="module"></script>
@endsection

@section('data')
<div class="content">
    <div class="content__wrapper">
    
        <div class="content__title">
            <div class="text">@yield("ctitle")</div>
            <div class="amount">@yield("camount")</div>
        </div>

        <div class="content__data">
            @yield("content")
        </div>
    </div>
</div>

<div class="button-new">
    <div class="button-new__plus-sign"></div>
</div>
@endsection
