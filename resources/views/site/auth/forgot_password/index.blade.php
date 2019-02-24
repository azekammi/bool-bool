@extends('layouts.site')

@section('header')
    @include('site.header')
@endsection

@section('content')
    <div class="container">
        <div class="breadcrumbs">
            @include('site.breadcrumbs')
        </div>

        <div class="wrapper">
            <div class="main">
                @include('site.auth.forgot_password.content_index')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('site.footer')
@endsection