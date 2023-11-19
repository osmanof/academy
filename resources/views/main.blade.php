@extends('layouts.first')

@section('title')
Главная – Delta Academy
@endsection

@section('scripts')
<script src="/js/main.js" type="module"></script>
@endsection

@section('content')

    <div class="modal-window choose-role__modal">
        <div class="modal-window__wrapper">
            <div class="modal-window__header welcome__text">Добро пожаловать!</div>

            <div class="modal-window__register-block">
                <div class="block__title">Регистрация</div>
                <div class="modal-window__content choose-role__modal-content">
                    <div class="choose-role__button teacher">Я учитель</div>
                    <div class="choose-role__button student">Я ученик</div>
                </div>
            </div>
            <div class="modal-window__login-block">
                <div class="block__or">
                    <hr>
                    <span>или</span>
                </div>
                <div class="modal-window__content choose-role__modal-content">
                    <div class="login__button">Войти в аккаунт</div>
                </div>
            </div>
        </div>
    </div>

@endsection
