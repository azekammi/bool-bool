@extends('layouts.site')

@section('header')
    @include('site.header')
@endsection

@section('content')
    <div class="container">
        @include('site.auth.how_it_works.content_how_it_works')
    </div>
@endsection

@section('footer')
    @include('site.footer')
@endsection