@extends('layouts.first')

@section('title')
Регистрация – Delta Academy
@endsection

@section('scripts')
<script src="/js/auth/indexTeacher.js" type="module"></script>
@endsection

@section('content')

<form action="{{ route('tregister') }}" class="trform" method="post" autocomplete="off" novalidate>
    @csrf
    <div class="modal-window teacher-register__modal">
        <div class="modal-window__wrapper">
            <div class="modal-window__header">Зарегистрироваться как преподаватель</div>
            <div class="modal-window__content teacher-register__modal__content">
                <div class="form">
                    
                    <div class="form-row">
                        <div class="form-text">Имя<span>*</span>:</div>
                        <div class="form-field">
                            <input type="text" name="tname" autocomplete="no">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-text">Фамилия<span>*</span>:</div>
                        <div class="form-field">
                            <input type="text" name="tsname" autocomplete="no">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-text">Отчество<span>*</span>:</div>
                        <div class="form-field">
                            <input type="text" name="tlname" autocomplete="no">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-text">E-mail<span>*</span>:</div>
                        <div class="form-field">
                            <input type="text" name="temail" autocomplete="no">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-text">Пароль<span>*</span>:</div>
                        <div class="form-field">
                            <input type="password" name="tpass" autocomplete="no">
                        </div>
                    </div>

                    <div class="form__link">
                        Уже есть аккаунт? Войдите <a href="/login">здесь</a>.
                    </div>
                
                </div>
            </div>
            <div class="modal-window__footer">
                <div type="submit" class="button next">
                    Далее
                </div>
            </div>
        </div>
    </div>
</form>
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
