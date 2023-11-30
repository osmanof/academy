@extends('layouts.second')

@section('title')
    Классы – Delta Academy
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/classes/index.css">
@endsection

@section('ctitle')
Классы
@endsection

@section('camount')
    <?php
        if ($countText) {
            echo strval($countText);
        }
    ?>
@endsection

@section('scripts')
    <script src="/js/classes/index.js" type="module"></script>
@endsection

@section('content')
<div class="cards__block">
    <div class="cards">
    <?php
        foreach ($cr as $key => $value) {
            $_count = $counts[$key];
            $card_code = '<div class="card" data-code="'.$value->code.'">
                <div class="card__info">
                    <div class="card__info__class-data">
                        <div class="card__info__class-data__title">'.$value->title.'</div>
                        <div class="card__info__class-data__students">Учеников: <span>'. $_count .'</span></div>
                    </div>
                    <div class="card__info__class-info">
                        <div class="card__info__class-info__score">Средняя успеваемость: <span>0%</span></div>
                        <div class="card__info__class-info__tutor">Кл. руководитель: <span>'.$value->tutor.'</span></div>
                    </div>
                </div>
            </div>';

            echo $card_code;
        }
    ?>
    </div>
</div>
<div class="modal-window">
    <div class="modal-window__block">
        <div class="modal-window__header">
            <div>Создать класс</div>
            <div class="close-button"></div>
        </div>
        <div class="modal-window__content">
            <div class="modal-window__content__wrapper">
            <div class="form">
                    <div class="form-row">
                        <div class="form-text">Название класса<span>*</span>:</div>
                        <div class="form-field">
                            <input type="text" name="ctitle" autocomplete="no">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-text">Кл. руководитель<span>*</span>:</div>
                        <div class="form-field">
                            <input type="text" name="ctutor" autocomplete="no">
                        </div>
                    </div>
                    <div class="form-row button-generate__block">
                        <div class="button">
                            Cгенерировать код класса
                        </div>
                    </div>
                    <div class="form-row class-code__block">
                        <div class="class-code">
                            <div class="class-code__digit digit_1">
                                
                            </div>
                            <div class="class-code__digit digit_2">
                                
                            </div>
                            <div class="class-code__digit digit_3">
                                
                            </div>
                            <div class="class-code__digit digit_4">
                                
                            </div>
                            <div class="class-code__digit digit_5">
                                
                            </div>
                            <div class="class-code__digit digit_6">
                                
                            </div>
                            <div class="class-code__digit digit_7">
                                
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
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