@extends('layouts.header')
    
@section('css')
    <link 
        rel="stylesheet" 
        href="{{ asset('css/date.css') }}"
    >
@endsection

@section('content')
    <div class="register">
        <span class="register__title">会員登録</span>
        <form class="register-form" action="/register" method="POST">
            @csrf
            <div class="register-form__item">
                <input 
                    type="名前" 
                    class="register-form__item-input"
                    name="name"
                    value="{{ old('name','名前')}}"
                >
            </div>
            <div class="register-form__item">
                <input 
                    type="email" 
                    class="register-form__item-input"
                    name="email"
                    value="{{old('email','メールアドレス')}}"
                >
            </div>
            <div class="register-form__item">
                <input 
                    type="text" 
                    class="login-form__item-input"
                    name="password"
                    value="{{old('password','パスワード')}}"
                >
            </div>
            <div class="register-form__item">
                <input 
                    type="text" 
                    class="register-form__item-input"
                    name="password_confirmation"
                    value="確認パスワード"
                >
            </div>
            <div class="register-form__button">
                <button class="register-form__button-submit">
                    会員登録
                </button>
            </div>
        </form>

        <div class="login-register">
            <p>アカウントをお持ちの方はこちらから</p>
            <a href="" class="login__link">
                ログイン
            </a>
        </div>
    </div>
@endsection