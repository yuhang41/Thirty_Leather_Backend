@extends('layouts.FontTemplate')
@section('title','登入與註冊')

@section('css')
<link rel="stylesheet" href={{ asset('css/register.css') }}>
@endsection

@section('content')
<div class="main-container">
    <div class="cont">
        <form action={{ route('signin') }} method="POST" class="form sign-in" id="user-signin">
            @csrf
            <h2>會員登入</h2>
            <label>
                <span>信箱</span>
                <input type="email" name="email" id="login-email"/>
            </label>
            <label>
                <span>密碼</span>
                <input type="password" name="password" id="login-passwrd"/>
            </label>
            <p class="forgot-pass">忘記密碼?</p>
            <button class="submit" id="user-login">登入</button>
            <button type="button" class="fb-btn">Connect with <span>facebook</span></button>
        </form>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>會員註冊</h2>
                    <p>要訂購商品或是要使用商品評論時，必須先註冊會員。點擊 「 註冊 」 後開始進行註冊</p>
                </div>
                <div class="img__text m--in">
                    <h2>已註冊完</h2>
                </div>
                <div class="img__btn">
                    <span class="m--up">點我註冊</span>
                    <span class="m--in">點我登入</span>
                </div>
            </div>
            <form action={{ route('login_register') }} method="POST" class="form sign-up" id="user-signin-register">
                @csrf
                <h2>會員註冊</h2>
                @php
                    // dd();
                @endphp
                <label>
                    <span>名稱</span>
                    <input type="text" name="name"/>
                </label>
                <label>
                    <span>信箱</span>
                    <input type="email" name="email"/>
                </label>
                <label>
                    <span>密碼</span>
                    <input type="password" name="password"/>
                </label>
                <label>
                    <span>確認密碼</span>
                    <input type="password" name="password_confirmation"/>
                </label>
                <label>
                    <span>電話</span>
                    <input type="text" name="phone"/>
                </label>
                <label>
                    <span>地址</span>
                    <input type="text" name="address"/>
                </label>
                <button class="submit" id="user-register">註冊</button>
                <button type="button" class="fb-btn">Join with <span>facebook</span></button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src={{ asset('js/register.js') }}></script>
@endsection
