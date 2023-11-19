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

@endsection





<!--form action="{{ route('tregister') }}" method="post" novalidate>
    @csrf
    Имя: <input type="text" name="tname"><br>
    Фамилия: <input type="text" name="tsname"><br>
    Отчество: <input type="text" name="tlname"><br>
    E-mail: <input type="email" name="temail"><br>
    Пароль: <input type="password" name="tpass"><br>
    <button type="submit">Регистрация</button>
</form-->  

<!--div class="card">
        <div class="card__info">
            <div class="card__info__class-data">
                <div class="card__info__class-data__title">9 х/б</div>
                <div class="card__info__class-data__students">Учеников: <span>58</span></div>
            </div>
            <div class="card__info__class-info">
                <div class="card__info__class-info__score">Средняя успеваемость: <span class="bad">27%</span></div>
                <div class="card__info__class-info__tutor">Кл. руководитель: <span>Мурлыкова Ъ. Ы.</span></div>
            </div>
        </div>
        <div class="card__footer">
            <div class="button-open">
                Открыть
            </div>
        </div>
    </div-->


    <!--div class="student-card">
        <div class="students-list__columns">
            <div class="students-list__number-column">1</div>
            <div class="students-list__name-column">Османов Осман Арсаналиевич</div>
            <div class="students-list__rating-column">100</div>
            <div class="students-list__progress-column data">100%</div>
        </div>
    </div>
    <div class="student-card">
        <div class="students-list__columns">
            <div class="students-list__number-column">1</div>
            <div class="students-list__name-column">Османов Осман Арсаналиевич</div>
            <div class="students-list__rating-column">100</div>
            <div class="students-list__progress-column data green">100%</div>
        </div>
    </div>
    <div class="student-card">
        <div class="students-list__columns">
            <div class="students-list__number-column">1</div>
            <div class="students-list__name-column">Османов Осман Арсаналиевич</div>
            <div class="students-list__rating-column">100</div>
            <div class="students-list__progress-column data red">100%</div>
        </div>
    </div>
    <div class="student-card">
        <div class="students-list__columns">
            <div class="students-list__number-column">1</div>
            <div class="students-list__name-column">Османов Осман Арсаналиевич</div>
            <div class="students-list__rating-column">100</div>
            <div class="students-list__progress-column data yellow">100%</div>
        </div>
    </div-->