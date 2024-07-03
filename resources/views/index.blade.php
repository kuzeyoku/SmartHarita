@extends('layout.main')
@section('content')
    @include('layout.slider')
    @include('layout.about')
    @include('layout.service')
    @include('layout.counter')
    @include('layout.project')
    @include('layout.brand')
    {{-- @include('layout.testimonial') --}}
    @include('layout.blog')
    @include('layout.map')
@endsection
