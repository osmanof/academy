@extends('layouts.second')

@section('title')
    Курс – Delta Academy
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/course/index.css">
@endsection

@section('ctitle')
<div class="course-title">
    {{ $title }}
</div>
Уроки по темам
@endsection

@section('camount')
27 уроков
@endsection

@section('scripts')
    <script src="/js/course/index.js" type="module"></script>
@endsection

@section('content')
Всем Приветик!!!


<div class="modal-window">
    <div class="modal-window__block">
        <div class="modal-window__header">
            <div>Добавить тему</div>
            <div class="close-button"></div>
        </div>
        <div class="modal-window__content">
            <div class="modal-window__content__wrapper">
            <div class="form">
                    <div class="form-row">
                        <div class="form-text">Название темы<span>*</span>:</div>
                        <div class="form-field">
                            <input type="text" name="thema_title" autocomplete="no">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-text">Время дедлайна<span>*</span>:</div>
                        <div class="form-field">
                            <div class="deadline-input">
                                <div class="deadline-input__date-field__block">
                                    <input type="date" name="deadline_date" min="1970-01-01" onfocus="this.min=new Date().toISOString().split('T')[0]">
                                </div>
                                <div class="deadline-input__time-field__block">
                                    <input type="time" name="deadline_time">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-text">Вид темы<span>*</span>:</div>
                        <div class="form-field">
                            <select name="thema_type" id="thema-type">
                                <option value="0">Учебная тема</option>
                                <option value="1">Самостоятельная работа</option>
                                <option value="2">Контрольная работа</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row add-thema__row">
                        <div class="add-thema__button">
                            Добавить тему
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

