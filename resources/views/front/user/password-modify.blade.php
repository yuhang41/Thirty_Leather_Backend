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
    <div class="password-window mt-5 mx-auto">
        <div class="input-data col-md-12 row">
            <form action={{ asset('/front/user/passwordModify/update') }} method="POST" id="password-modify" class="input-block col-md-6 mt-4">
                @csrf
                <div class="col">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="modify-title font-weight-bold">修改密碼
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2 d-flex mt-4">
                            <input type="text" class="input font-weight-normal mt-1" id="old-password" name="old_password" placeholder="請輸入舊密碼">
                            {{ Session::get('error') }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2 d-flex mt-3">
                            <input type="password" class="input font-weight-normal" id="new-password" name="new_password" placeholder="新密碼">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2 d-flex mt-3">
                            <input type="password" class="input font-weight-normal" id="confirm-password" placeholder="新密碼再確認">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mt-4">
                            <button type="button" class="modify-btn mt-1">確定修改</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-md-6 p-0">
                <div class="col">
                    <div class="row">
                        <div class="col-12 pr-0 d-flex justify-content-end">
                            <button class="delete-btn p-0">X</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-12 ml-2 d-flex justify-content-center">
                            <div class="safe-validate1 font-weight-bold">個人資料安全驗證
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2 mt-4 d-flex justify-content-center">
                            <div class="safe-validate2 mt-1">為了保障您的資料安全</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2 mt-2 d-flex justify-content-center">
                            <div class="safe-validate2 mt-1">必須再次輸入密碼驗證</div>
                        </div>
                    </div>

                    <div class="col-12 d-flex pr-0 ml-5 justify-content-end">
                        <img class="lock-img" src="/img/padlock.svg" alt="padlock">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="member-center">
    <div class="m-center-index text-center">訊息</div>

    <div class="list-Group d-flex justify-content-center">
        <div class="list-groups p-0">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action text-center" href={{ asset('/front/user') }}>會員中心</a>

                <a class="list-group-item list-group-item-action active text-center" id="list-passwordModify-list"
                    data-toggle="list" href="#list-passwordModify" role="tab"
                    aria-controls="passwordModify">密碼修改</a>

                <a class="list-group-item list-group-item-action text-center" href="/index.html">會員登出</a>
            </div>
        </div>

        <div class="tab-contents">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-passwordModify" role="tabpanel"
                    aria-labelledby="list-passwordModify-list">
                    <div class="member-data">
                        <div class="nowNews text-center mt-4">目前尚未收到訊息！</div>

                        <div class="input-container mx-auto">
                            <input class="input-message" type="text" placeholder="輸入訊息">
                        </div>

                        <div class="button-container row justify-content-between mt-4 mx-auto">
                            <button class="add-img-btn">
                                <i class="fas fa-plus-circle"></i>
                                <span>加入圖片</span>
                            </button>

                            <button class="transform-btn">傳送</button>
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
