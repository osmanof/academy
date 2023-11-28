@extends('layouts.fiveth')

@section('title')
Вход – Delta Academy
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/themas/index.css">
@endsection

@section('scripts')
<script src="/js/themas/index.js" type="module"></script>
@endsection

@section('ctitle')
<div class="course-title">
    {{ $course_title }}
</div>
Уроки по темам
@endsection

@section('camount')
{{ $count_text }}
@endsection

@section('content')

<div class="themas">

    <?php 

        foreach ($themas as $key => $thema) {
            $deadline = $thema->deadline_date;
            $time = $thema->deadline_time;

            $deadline_parts = explode("-", $deadline);

            $year = $deadline_parts[0];
            $month = $deadline_parts[1];
            $day = $deadline_parts[2];

            $thema_sample = '<div class="thema">
            <div class="thema-info__block" data-id="' . $thema->id . '">
                <div class="thema-info__number">' . ($key + 1) . '</div>
                <div class="thema-info__ta">
                    <div class="thema-info__title">' . $thema->title . '</div>
                    <div class="thema-info__amount">Количество задач: 11</div>
                </div>
                <div class="thema-info__rd">
                    <div class="thema-info__rating">43%</div>
                    <div class="thema-info__deadline">Дедлайн: '. $day .'.'. $month .'.'. $year .' '. $time .'</div>
                </div>
                    </div>
                </div>';
                
            echo $thema_sample;

        }


    
    ?>
</div>

@endsection
