@extends('layout.main')
@section('title', $page->title)
@section('content')
    <div class="rts-section-gap">
        <div class="container">
            {!! $page->description !!}
        </div>
    </div>

@endsection
