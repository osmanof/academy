@extends('layouts.fiveth')

@section('title')
Вход – Delta Academy
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/tasks/index.css">
@endsection

@section('scripts')
<script src="/js/tasks/index.js" type="module"></script>
@endsection

@section('ctitle')
<div class="course-title">
    {{ $ttitle }}
</div>
Задачи по теме
@endsection

@section('camount')
 {{ $count_text }}
@endsection

@section('content')

<div class="tasks__sections">

    <?php
    
        foreach ([
            "Классные задачи" => $class_tasks,
            "Домашние задачи" => $home_tasks,
            "Дополнительные задачи" => $hard_tasks
        ] as $title => $tasks) {
            $amount = $tasks->count();

            if ($amount != 0) {
                echo '<div class="tasks__section">
                <div class="section__title">'. $title .'</div>
                <div class="section__content">';

                foreach ($tasks as $num => $task) {
                    $sample = '<div class="task">
                    <div class="task-info__block" data-id="' . $task->id . '">
                        <div class="task-info__number">' . ($num + 1) . '</div>
                        <div class="task-info__ta">
                            <div class="task-info__title">' . $task->title . '</div>
                        </div>
                        <div class="task-info__rd">
                            <div class="task-info__status">Не решено</div>
                        </div>
                    </div>
                </div>';

                    echo $sample;
                }

                echo '</div></div>';
            }
        }
    
    ?>


</div>


@endsection


<!--  -->