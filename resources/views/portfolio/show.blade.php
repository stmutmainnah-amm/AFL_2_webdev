@extends('layouts.main')
@section('title', $project->title)

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <a href="{{ route('portfolio.index') }}" class="text-sm text-gray-600">&larr; Back to portfolio</a>
    <h1 class="text-3xl font-bold mt-4">{{ $project->title }}</h1>
    <div class="mt-4">
        @if($project->cover_image)
            <img src="{{ asset($project->cover_image) }}" alt="" class="w-full rounded">
        @endif
        <p class="mt-4 text-gray-700">{!! nl2br(e($project->description)) !!}</p>

        <div class="mt-4">
            <h3 class="font-semibold">Skills</h3>
            <div class="flex flex-wrap gap-2 mt-2">
                @foreach($project->skills as $skill)
                    <span class="px-3 py-1 bg-gray-100 rounded">{{ $skill->name }} @if($skill->level) ({{ $skill->level }}) @endif</span>
                @endforeach
            </div>
        </div>

        @if($project->url)
        <div class="mt-4">
            <a href="{{ $project->url }}" target="_blank" class="text-[#ff9500] font-semibold">Visit project →</a>
        </div>
        @endif
    </div>
</div>
@endsection
