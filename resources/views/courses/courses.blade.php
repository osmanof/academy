@extends('layouts.second')

@section('title')
    Курсы – Delta Academy
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/courses/index.css">
@endsection

@section('ctitle')
Курсы
@endsection

@section('camount')
<?php
    if ($countText) {
        echo strval($countText);
    }
?>
@endsection

@section('scripts')
    <script src="/js/courses/index.js" type="module"></script>
@endsection

@section('content')

<div class="my-courses__block">
    <div class="my-courses__block-title">
        Мои курсы
    </div>
    <div class="my-courses__list__block">
        <div class="my-courses__list">

            <?php
                foreach ($coursesArray as $key => $value) {
                    $title = $value->title;
                    $themas_count = $themasCount[$key];
                    $tasks_count = $tasksCount[$key];
                    $number = $value->color;

                    $course_sample = '<div class="course__block" data-id="'. $value->id .'">
                    <div class="course__block-header color_'. $number .'">
                        '. $title .'
                    </div>
                        <div class="course__block-content">
                            <div class="course__block-themas_amount__block">
                                Количество тем: <span>'. $themas_count .'</span>
                            </div>
                            <div class="course__block-assignments_amount__block">
                                Количество задач: <span>'. $tasks_count .'</span>
                            </div>
                        </div>
                    </div>';

                    echo $course_sample;
                }
            ?>
        </div>
    </div>
</div>
            </div>



<div class="modal-window">
    <div class="modal-window__block">
        <div class="modal-window__header">
            <div>Создать курс</div>
            <div class="close-button"></div>
        </div>
        <div class="modal-window__content">
            <div class="modal-window__content__wrapper">
            <div class="form">
                    <div class="form-row">
                        <div class="choose_color-block">
                            <div class="color-block">
                                <div class="color-circle color_1 chosen"></div>
                            </div>
                            <div class="color-block">
                                <div class="color-circle color_2"></div>
                            </div>
                            <div class="color-block">
                                <div class="color-circle color_3"></div>
                            </div>
                            <div class="color-block">
                                <div class="color-circle color_4"></div>
                            </div>
                            <div class="color-block">
                                <div class="color-circle color_5"></div>
                            </div>
                            <div class="color-block">
                                <div class="color-circle color_6"></div>
                            </div>
                            <div class="color-block">
                                <div class="color-circle color_7"></div>
                            </div>
                            <div class="color-block">
                                <div class="color-circle color_8"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-text">Название курса<span>*</span>:</div>
                        <div class="form-field">
                            <input type="text" name="course_title" autocomplete="no">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-text">Доступность<span>*</span>:</div>
                        <div class="form-field">
                            <select name="accessibility" id="accessibility">
                                <option value="0">Приватный</option>
                                <option value="1">Публичный</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row create-course__row">
                        <div class="create-course__button">
                            Создать курс
                        </div>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
