@extends('layouts.standart')

@section('data')
<div class="content">
    <div class="content__wrapper">
    
        <div class="content__title">
            <div class="text">@yield("ctitle")</div>
            <div class="amount">@yield("camount")</div>
        </div>

        <div class="content__data fluid">
            <div class="content__data-left">@yield("left")</div>
            <div class="content__data-right">@yield("right")</div>
        </div>
    </div>
</div>
@endsection
