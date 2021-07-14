@extends('layouts.app')
@section('page-title','種類編輯')
@section('css')

@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/type') }}">種類管理</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/type/edit') }}/{{ $edit->id }}">編輯</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>種類編輯</h2></div>
                <div class="card-body">
                    <form action="{{ asset('/admin/product/type/edit/update') }}/{{ $edit->id }}" method="POST" >
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="type_class_id">種類</label>
                                <select class="form-control" id="type_class_id" name="type_class_id">
                                    {{-- <select name="product_type_id" 這裡 name 傳的值是在 <option value='xxx' 抓 xxx 的值 --}}
                                    @foreach ($class as $item)
                                        <option
                                            value='{{ $item->id }}'
                                            @if ($item->id === $edit->type_class_id)
                                                selected
                                            @endif>
                                                {{ $item->type_class_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">種類名稱</label>
                                <input type="text" class="form-control" id="name" name="product_type" value="{{ $edit->product_type }}">
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                更新
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
