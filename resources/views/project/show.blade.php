@extends('layout.main')
@section('title', $project->title)
@section('parent_title', __('front/project.txt1'))
@section('parent_url', route('project.index'))
@section('content')
    @include('layout.breadcrumb')
    <div class="rts-project-details-area rts-section-gap">
        <div class="container">
            <div class="big-bg-porduct-details">
                <img src="{{ $project->getFirstMediaUrl('cover') }}" alt="{{ $project->title }}">
                @if (count($project->feature) > 0)
                    <div class="project-info">
                        <div class="info-head">
                            <h5 class="title">@lang('front/project.txt4')</h5>
                        </div>
                        <div class="info-body">
                            <div class="single-info">
                                <div class="info-details">
                                    <table>
                                        @foreach ($project->feature as $key => $value)
                                            <tr>
                                                <th>{{ $key }} : </th>
                                                <td>{{ $value }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <p class="disc">
                {!! $project->description !!}
            </p>
        </div>
    </div>
@endsection
