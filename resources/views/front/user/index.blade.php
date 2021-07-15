@extends('layouts.FontTemplate')
@section('title','會員中心')

@section('css')
<link rel="stylesheet" href={{ asset('css/login.css') }}>
@endsection

@section('content')
<div class="member-center">
    <div class="m-center-index text-center">會員中心首頁</div>

    <div class="list-Group d-flex justify-content-center">
        <div class="list-groups p-0">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active text-center" id="list-memberCenter-list"
                    data-toggle="list" href="#list-memberCenter" role="tab"
                    aria-controls="memberCenter">會員中心</a>

                <a class="list-group-item list-group-item-action text-center"
                    href={{ asset('/front/user/passwordModify') }}>密碼修改</a>
                <form action={{ route('user_logout') }} method="POST">
                    @csrf
                    <button class="list-group-item list-group-item-action text-center" type="submit">會員登出</button>
                </form>
                @can('admin')
                    <a class="list-group-item list-group-item-action text-center" href={{ asset('/admin/home') }}>管理者</a>
                @endcan
            </div>
        </div>

        <div class="tab-contents">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-memberCenter" role="tabpanel"
                    aria-labelledby="list-memberCenter-list">
                    <div class="member-data">
                        <div class="row align-items-start">
                            <div class="col mt-4 d-flex justify-content-center">
                                <i class="fas fa-user"></i>

                                <div class="user-id">{{ $user->name }}</div>

                                <div class="general-member">一般會員</div>
                            </div>
                        </div>

                        <div class="User-edit mt-2 d-flex justify-content-center">
                            <i class="fas fa-pen mr-1"></i>

                            <div class="user-edit ml-1">編輯會員資料</div>
                        </div>

                        <form action={{ asset('/front/user/update') }} method="POST" class="member-container mx-auto">
                            @csrf
                            <div class="input-data col-md-12 ml-0 mt-2 row">
                                <div class="data-left col-md-6 pl-0">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <label class="label1 font-weight-bold col-3 mt-2">姓名</label>

                                                <input type="text" class="input font-weight-normal" name="name"
                                                    placeholder="林土木" value='{{ $user->name }}'>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <label
                                                    class="label1 font-weight-bold col-3 mt-2 pt-1">信箱</label>

                                                <input type="text" class="input font-weight-normal" name="email"
                                                    placeholder="test123@gmail.com" value="{{ $user->email }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <label
                                                    class="label1 font-weight-bold col-3 mt-2 pt-1">行動電話</label>

                                                <input type="text" class="input font-weight-normal pt-1" name="phone"
                                                    placeholder="0900 - 123456" value="{{ $user->phone }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <label
                                                    class="label1 font-weight-bold col-3 mt-2 pt-1">出生日期</label>
                                                <input type="date" class="input font-weight-normal pt-1" name="date"
                                                    placeholder="1995 / 01 / 24" value="{{ $user->date }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="data-right col-md-6">
                                    <div class="col">
                                        <div class="row">
                                            <div class="address-block col-12 pl-0 mt-1 pb-2 mb-3 d-flex">
                                                <label class="label1 font-weight-bold col-6 mt-1">聯絡地址</label>

                                                <div class="address city-selector-set row">
                                                    <select class="county"></select>

                                                    <select class="district"></select>

                                                    <input class="zipcode" type="text" size="3" readonly
                                                        placeholder="郵遞區號">

                                                    <input class="input1 mt-2" type="text" placeholder="詳細的地址" name="address" value="{{ $user->address }}">
                                                </div>
                                            </div>

                                            <label class="label1 font-weight-bold col-12 mt-4 mb-0 pt-2">訂閱電子報
                                                <i class="fas fa-check-square"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="member-btn mx-auto mt-3 mb-3">
                                    <button type="button" class="btn">取消</button>

                                    <button type="submit" class="btn">儲存變更</button>
                                </div>
                            </div>
                        </form>

                        <div class="order-five mt-2 text-center">訂單前5筆</div>

                        <div class="table-container mx-auto mt-1 text-center">

                            <table class="table table-borderless text-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="table-active">訂單編號</th>
                                        <th class="table-active">訂購日期</th>
                                        <th class="table-active">訂單狀態</th>
                                        <th class="table-active">收件方式</th>
                                        <th class="table-active">寄送方式</th>
                                        <th class="table-active">處理進度</th>
                                        <th class="table-active">應付金額</th>
                                        <th class="table-active">發票</th>
                                        <th class="table-active">退貨服務</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($list_order as $order)
                                        <tr>
                                            <td class="row">
                                                <div class="orderNumber font-weight-normal">{{ $order->order_no }}</div>
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>已出貨</td>
                                            <td>全家超商取貨</td>
                                            <td>全家店配</td>
                                            <td>處理中</td>
                                            <td>{{ $order->price }}</td>
                                            <td>
                                                <div class="checkInvoice">檢視發票</div>
                                            </td>
                                            <td>
                                                <div class="returnInfor">退貨資訊</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="table-icon">
                                <button class="fas fa-caret-left text-decoration-none"></button>

                                <span class="p-1 icon-number">1</span>

                                <button class="fas fa-caret-right text-decoration-none"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src={{ asset('js/tw-city-selector.js') }}></script>
    <script src={{ asset('js/address.js') }}></script>
@endsection
