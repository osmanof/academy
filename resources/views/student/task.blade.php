@extends('layouts.sixth')

@section('title')
{{ $task_title }} – Delta Academy
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/task/index.css">
    <link rel="stylesheet" href="/codemirror/css/codemirror.css">
@endsection

@section('scripts')
    <script src="/codemirror/js/codemirror.js"></script>
    <script src="/codemirror/js/python.js"></script>
    <script src="/codemirror/js/active-line.js"></script>
    <script src="/codemirror/js/matchbrackets.js"></script>
    <script src="/js/task/index.js" type="module"></script>
@endsection

@section('ctitle')
<div class="course-title">
    {{ $course_title }}/{{ $thema_title }}
</div>
{{ $task_title }}
@endsection

@section('camount')

@endsection

@section('left')

<div class="task__sections">
    <?php 

        foreach ($task_data as $stitle => $content) {
            $sample = '<div class="task__section">
                <div class="section__title">' . $stitle . '</div>
                <div class="section__content">
                    <div class="task-text__block">' . $content . '</div>
                </div>
            </div>';

            echo $sample;
        }
    
    ?>
</div>

@endsection

@section('right')

<div class="section__title">
    <div>Решение</div>
    <div class="send-solution__button">
        Сдать решение
    </div>
</div>

<div class="section__content">
    <div class="code-field__block">
        <?php 
            if ($last_status == 200)
                echo '<div class="code-file__block__header success">Задача решена</div>';

            elseif ($last_status == 300)
                echo '<div class="code-file__block__header error">Превышен лимит времени</div>';

            elseif ($last_status == 500)
                echo '<div class="code-file__block__header error">Неверный ответ</div>';

            else
                echo '<div class="code-file__block__header">Не решено</div>';
        ?>
        
        <div class="code-file__block__content">
            <textarea id="code" name="code" style="display: none;">{{ $last_code }}</textarea>
        </div>
    </div>
</div>

@endsection
