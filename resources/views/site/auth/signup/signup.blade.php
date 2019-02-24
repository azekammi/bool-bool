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
                @include('site.auth.signup.content_signup')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('site.footer')
@endsection