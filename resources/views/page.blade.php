@extends('layout.main')
@section('title', $page->title)
@section('content')
    @include('layout.breadcrumb')
    <section class="about-section">
        <div class="auto-container">
            {!! $page->description !!}
        </div>
    </section>
@endsection
