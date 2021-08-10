@extends('layouts.FontTemplate')
@section('title','密碼修改')

@section('css')
<link rel="stylesheet" href={{ asset('css/passwordModify.css') }}>
@endsection

@section('content')
<div class="password-background">
    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="password-window  mt-5">
        <div class="data-block1 d-flex justify-content-end">
            <button class="delete-btn">X</button>
        </div>

        <div class="data-block2 d-flex">
            <form action={{ asset('/front/user/passwordModify/update') }} method="POST" class="block2-left">
                @csrf
                <div class="col">
                    <div class="modify-title font-weight-bold d-flex justify-content-center">修改密碼</div>


                    <div class="modify-content mt-4 d-flex justify-content-center">
                        <input type="text" class="input font-weight-normal" name="old_password" placeholder="請輸入舊密碼">
                    </div>
                    <div class="modify-content mt-1">
                        <p class="wrong-password">{{ Session::get('error') }}</p>
                    </div>

                    <div class="modify-content d-flex justify-content-center mt-3">
                        <input type="password" class="input font-weight-normal" name="new_password" placeholder="新密碼">
                    </div>


                    <div class="modify-content d-flex justify-content-center mt-3">
                        <input type="password" class="input font-weight-normal" placeholder="新密碼再確認">
                    </div>


                    <div class="sure-modify d-flex justify-content-center">
                        <button type="submit" class="modify-btn">確定修改</button>
                    </div>
                </div>
            </form>

            <div class="block2-right">
                <div class="safe-validate1 font-weight-bold d-flex justify-content-center">個人資料安全驗證</div>

                <div class="safe-validate2 d-flex justify-content-center mt-4">為了保障您的資料安全</div>

                <div class="safe-validate3 d-flex justify-content-center mt-3">必須再次輸入密碼驗證</div>

                <div class="lock">
                    <img class="lock-img" src={{ asset('img/padlock.svg') }} alt="padlock">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="member-center">
    <div class="m-center-index text-center">訊息</div>

    <div class="list-Group d-flex justify-content-center">
        <form action={{ route('user_logout') }} method="POST" class="list-group text-center font-weight-bold" id="list-tab" role="tablist">
            @csrf
            <a class="list-group-item list-group-item-action font-weight-bold" href="{{ asset('/front/user/') }}">會員<span>中心</span></a>

            <a class="list-group-item list-group-item-action active" id="list-profile-list"
                href={{ asset('/front/user/passwordModify') }}>密碼<span>修改</span>
            </a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" href={{ asset('/front/user/follow') }}>追蹤<span>清單</span></a>
            <button type="submit" id="list-profile-list" class="list-group-item list-group-item-action">會員<span>登出</span></button>
            @can('admin')
                <a class="list-group-item list-group-item-action" id="list-profile-list" href={{ asset('/admin/home') }}>管理者</a>
            @endcan
        </form>

        <div class="tab-contents">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-passwordModify" role="tabpanel"
                    aria-labelledby="list-passwordModify-list">
                    <div class="member-data">
                        <div class="nowNews text-center mt-4">目前尚未收到訊息！</div>

                        <div class="input-container mx-auto">
                            <textarea class="input-message" type="text" placeholder="輸入訊息" cols="30"
                                rows="10"></textarea>
                        </div>

                        <div class="button-container row justify-content-between mt-4 mx-auto">
                            <label class="btn btn-upload">
                                <input class="d-none" type="file">
                                <i class="fas fa-plus-circle"></i> 加入圖片
                            </label>

                            <button type="submit" class="transform-btn">傳送</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src={{ asset('js/password-modify.js') }}></script>
@endsection
