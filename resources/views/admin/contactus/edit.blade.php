@extends('layouts.app')
@section('page-title','contactus')
@section('css')

@endsection
@section('content')
<section class="mb-4 container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/contactus') }}">聯絡我們</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/contactus/edit') }}/{{ $edit->id }}">查看</a></li>
        </ol>
    </nav>
    <!--Section heading-->
    <h2 class="h1-responsive my-4">查看</h2>
    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" action="/admin/contactus/update/{{ $edit->id }}" method="POST">
                @csrf
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control" value="{{ $edit->name }}" readonly>
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="email" id="email" name="email" class="form-control" value="{{ $edit->email }}" readonly>
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control" value="{{ $edit->subject }}" readonly>
                            <label for="subject" class="">Subject</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="content" rows="2" class="form-control md-textarea" readonly>{{ $edit->content }}</textarea>
                            <label for="message">Your message</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->
                @can('admin')
                    <div class="text-center text-md-left">
                        <button class="btn btn-primary" type="submit">Create_Contactus</button>
                    </div>
                @endcan

            </form>
            <div class="status"></div>
        </div>
        <!--Grid column-->
    </div>
</section>
@endsection
@section('js')

@endsection
