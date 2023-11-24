@extends('layouts.second')

@section('title')
    Курс – Delta Academy
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/thema/index.css">
@endsection

@section('ctitle')
<div class="thema-title">
    {{ $ttitle }}
</div>
Задачи
@endsection

@section('camount')
Задач: 11
@endsection

@section('scripts')
    <script src="/js/thema/index.js" type="module"></script>
@endsection

@section('content')

@endsection

