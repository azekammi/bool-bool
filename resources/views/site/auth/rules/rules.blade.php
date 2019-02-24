@extends('layouts.site')

@section('header')
    @include('site.header')
@endsection

@section('content')
    @include('site.auth.rules.content_rules')
@endsection

@section('footer')
    @include('site.footer')
@endsection