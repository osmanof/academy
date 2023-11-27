@extends('layouts.third')

@section('title')
    Класс – Delta Academy
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/class/index.css">
@endsection

@section('ctitle')
{{ $ctitle }}
@endsection

@section('camount')
Код класса: {{ $ccode }}
@endsection

@section('scripts')
    <script src="/js/class/index.js" type="module"></script>
@endsection

@section('content')

<div class="content__sections">
    <div class="content__section">
        <div class="section__title">Курс обучения</div>
        <div class="section__content">
            <div class="form">
                <div class="form-row">
                    <div class="form-field">
                        <select name="set_course" id="set_course">
                            <option value="0" selected>не назначен</option>
                            <?php
                            
                                foreach ($courses as $key => $value) {
                                    $cid = $value->id;
                                    $title = $value->title;
                                    
                                    if ($course_id == $cid) {
                                        $option_sample = '<option value="'. $cid .'" selected>'. $title . '</option>';
                                    } else {
                                        $option_sample = '<option value="'. $cid .'">'. $title . '</option>';
                                    }
                                    echo $option_sample;
                                }

                            ?>
                            
                            
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content__section">
        <div class="section__title">Список учеников</div>
        <div class="section__content">
            <div class="students-list__block">
                <div class="students-list__info">
                    <div class="students-list__columns">
                        <div class="students-list__number-column">№</div>
                        <div class="students-list__name-column">ФИО</div>
                        <div class="students-list__rating-column">Баллы</div>
                        <div class="students-list__progress-column">Успеваемость</div>
                    </div>
                </div>

                <?php

                    foreach ($students as $key => $value) {
                        $progress = $value["progress"];

                        if ($progress <= 20)
                            $color = "red";

                        elseif ($progress < 50)
                            $color = "yellow";

                        else
                            $color = "green";

                        $progress_block = '<div class="students-list__progress-column data '. $color .'">'. $progress .'%</div>';
                        $sample = '    <div class="student-card">
                        <div class="students-list__columns">
                            <div class="students-list__number-column">'. ($key + 1) .'.</div>
                            <div class="students-list__name-column">'. $value["name"] .'</div>
                            <div class="students-list__rating-column">'. $value["rating"] .'</div>

                            ' . $progress_block . '

                        </div>
                    </div>';
                    echo $sample;
                    }

                ?>
            
            </div>
        </div>
    </div>
</div>

@endsection


