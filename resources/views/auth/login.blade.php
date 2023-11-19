@extends('layouts.first')

@section('title')
Вход – Delta Academy
@endsection

@section('scripts')
<script src="/js/login/index.js" type="module"></script>
@endsection

@section('content')

<form action="{{ route('login') }}" class="trform" method="post" autocomplete="off" novalidate>
    @csrf
    <div class="modal-window teacher-login__modal">
        <div class="modal-window__wrapper">
            <div class="modal-window__header">Войти в платформу</div>
            <div class="modal-window__content teacher-login__modal__content">
                <div class="form">
                    
                    <div class="form-row">
                        <div class="form-text">E-mail<span>*</span>:</div>
                        <div class="form-field">
                            <input type="text" name="email" autocomplete="no">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-text">Пароль<span>*</span>:</div>
                        <div class="form-field">
                            <input type="password" name="pass" autocomplete="no">
                        </div>
                    </div>
                    <div class="form__link">
                        Ещё нет аккаунта? Создайте его <a href="/">здесь</a>.
                    </div>
                </div>
            </div>
            <div class="modal-window__footer">
                <div type="submit" class="button next">
                    Войти
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
