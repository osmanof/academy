@extends('layouts.sstandart')

@section('title')
Темы – Delta Academy
@endsection

@section('scripts')
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
@endsection
