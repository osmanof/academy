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
<?php
        if ($countText) {
            echo strval($countText);
        }
    ?>
@endsection

@section('scripts')
    <script src="/js/course/index.js" type="module"></script>
@endsection

@section('content')

<div class="thema__wrapper">
                <!-- <div class="thema__number">1</div>
                <div class="thema__info-ta">
                    <div class="thema-title">Основы Python</div>
                    <div class="thema-amount">Количество задач</div>
                </div>
                <div class="thema__info-dr">
                    <div class="thema-rating">43%</div>
                    <div class="thema-deadline">Дедлайн: 23.11.2023 17:30</div>
                </div>
            </div>
            <div class="lock-button__block">
                <div class="lock-button"></div>
            </div> -->

<div class="themas__block">
    <div class="themas">

    <?php 
        foreach ($themas as $key => $thema) {
            $id = $thema->id;
            $title = $thema->title;
            $deadline = $thema->deadline_date;
            $time = $thema->deadline_time;

            $deadline_parts = explode("-", $deadline);

            $year = $deadline_parts[0];
            $month = $deadline_parts[1];
            $day = $deadline_parts[2];

            $card_code = '        <div class="thema">
            <div class="thema-info__block" data-id="' . $id . '">
                <div class="thema-info__number">'. ($key + 1) .'</div>
                <div class="thema-info__ta">
                    <div class="thema-info__title">'. $title .'</div>
                    <div class="thema-info__amount">Количество задач: 11</div>
                </div>
                <div class="thema-info__rd">
                    <div class="thema-info__rating">43%</div>
                    <div class="thema-info__deadline">Дедлайн: '. $day .'.'. $month .'.'. $year .' '. $time .'</div>
                </div>
            </div>
            <div class="thema-lock__block locked" title="Показать">
                <div class="thema-lock__button"></div>
            </div>
        </div>';
            echo $card_code;

        }
 

    ?>
    
        <!-- <div class="thema">
            <div class="thema-info__block">
                <div class="thema-info__number">1</div>
                <div class="thema-info__ta">
                    <div class="thema-info__title">Основы Python</div>
                    <div class="thema-info__amount">Количество задач: 11</div>
                </div>
                <div class="thema-info__rd">
                    <div class="thema-info__rating">43%</div>
                    <div class="thema-info__deadline">Дедлайн: 23.11.2023 17:30</div>
                </div>
            </div>
            <div class="thema-lock__block locked" title="Показать">
                <div class="thema-lock__button"></div>
            </div>
        </div> -->
    </div>
</div>


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

