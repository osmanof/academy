@extends('layouts.fourth')

@section('title')
    Новое задание – Delta Academy
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/thema/new-task.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    @endsection

@section('ctitle')
Новое задание
@endsection

@section('camount')
к теме "Основы ООП"
@endsection

@section('scripts')
    <script src="/js/newTask.js" type="module"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="/wysiwyg/script.js"></script>
@endsection

@section('left')

    <div class="task__form">

        <div class="task__form__row">
            <div class="task__form__row-title">Название задачи<span>*</span>:</div>
            <div class="task__form__row-content">
                <input type="text">
            </div>
        </div>
    
        <div class="task__form__row">
            <div class="task__form__row-title">Условие<span>*</span>:</div>
            <div class="task__form__row-content">
                <div class="wysiwyg__block" contenteditable="false">
                    <section class="wysiwyg__toolbar">
                        <div class="wysiwyg__toolbar_buttons">


                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="bold" class="icon fas fa-bold"></div>
                                <div id="italic" class="icon fas fa-italic"></div>
                                <div id="underline" class="icon fas fa-underline"></div>
                            </div>

                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="strikeThrough" class="icon fas fa-strikethrough"></div>
                                <div id="createLink" class="icon fas fa-link"></div>
                            </div>

                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="insertUnorderedList" class="icon fas fa-list-ul"></div>
                                <div id="insertOrderedList" class="icon fas fa-list-ol"></div>
                            </div>

                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="justifyLeft" class="icon fas fa-align-left"></div>
                                <div id="justifyRight" class="icon fas fa-align-right"></div>
                                <div id="justifyCenter" class="icon fas fa-align-center"></div>
                                <div id="justifyFull" class="icon fas fa-align-justify"></div>
                            </div>
                        </div>
                    </section>

                    <section class="wysiwyg__content_block" contenteditable="true">
                        <p id="wysiwyg__content"></p>
                    </section>
                </div>
            </div>
        </div>

        <div class="task__form__row">
            <div class="task__form__row-title">Формат входных данных:</div>
            <div class="task__form__row-content">
                <div class="wysiwyg__block" contenteditable="false">
                    <section class="wysiwyg__toolbar">
                        <div class="wysiwyg__toolbar_buttons">


                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="bold" class="icon fas fa-bold"></div>
                                <div id="italic" class="icon fas fa-italic"></div>
                                <div id="underline" class="icon fas fa-underline"></div>
                            </div>

                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="strikeThrough" class="icon fas fa-strikethrough"></div>
                                <div id="createLink" class="icon fas fa-link"></div>
                            </div>

                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="insertUnorderedList" class="icon fas fa-list-ul"></div>
                                <div id="insertOrderedList" class="icon fas fa-list-ol"></div>
                            </div>

                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="justifyLeft" class="icon fas fa-align-left"></div>
                                <div id="justifyRight" class="icon fas fa-align-right"></div>
                                <div id="justifyCenter" class="icon fas fa-align-center"></div>
                                <div id="justifyFull" class="icon fas fa-align-justify"></div>
                            </div>
                        </div>
                    </section>

                    <section class="wysiwyg__content_block" contenteditable="true">
                        <p id="wysiwyg__content"></p>
                    </section>
                </div>
            </div>
        </div>

        <div class="task__form__row">
            <div class="task__form__row-title">Формат выходных данных:</div>
            <div class="task__form__row-content">
                <div class="wysiwyg__block" contenteditable="false">
                    <section class="wysiwyg__toolbar">
                        <div class="wysiwyg__toolbar_buttons">


                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="bold" class="icon fas fa-bold"></div>
                                <div id="italic" class="icon fas fa-italic"></div>
                                <div id="underline" class="icon fas fa-underline"></div>
                            </div>

                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="strikeThrough" class="icon fas fa-strikethrough"></div>
                                <div id="createLink" class="icon fas fa-link"></div>
                            </div>

                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="insertUnorderedList" class="icon fas fa-list-ul"></div>
                                <div id="insertOrderedList" class="icon fas fa-list-ol"></div>
                            </div>

                            <div class="wysiwyg__toolbar_buttons-section">
                                <div id="justifyLeft" class="icon fas fa-align-left"></div>
                                <div id="justifyRight" class="icon fas fa-align-right"></div>
                                <div id="justifyCenter" class="icon fas fa-align-center"></div>
                                <div id="justifyFull" class="icon fas fa-align-justify"></div>
                            </div>
                        </div>
                    </section>

                    <section class="wysiwyg__content_block" contenteditable="true">
                        <p id="wysiwyg__content"></p>
                    </section>
                </div>
            </div>
        </div>

        <div class="task__form__row">
            <div class="task__form__row-title">Примеры<span></span>:</div>
            <div class="task__form__row-content">
                <table border="1" class="task__sample-table">
                    <tr>
                        <th>Ввод</th>
                        <th>Вывод</th>
                    </tr>
                    <tr contenteditable>
                        <td>Учитывайте \n на конце ввода</td>
                        <td>Учитывайте \n на конце вывода</td>
                    </tr>
                </table>
                <hr>
                <div class="task__sample-table_add-row">
                    <div class="task__sample-table_add-row_button">
                        <div class="task__sample-table_add-row_button-icon"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="create-task_button">
        Добавить задание
    </div>

@endsection

@section('right')

<div class="checking_way__block">

    <div class="block__title">
        Проверка задачи
    </div>

    

</div>

@endsection
