@extends('layouts.main')
@section('title','Portfolio')

@section('content')
<div class="max-w-5xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Portfolio</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($projects as $project)
            <a href="{{ route('portfolio.show', $project->slug) }}" class="block border rounded-lg p-4 hover:shadow">
                <div class="flex items-start gap-4">
                    <div class="w-24 h-24 bg-gray-100 flex-shrink-0 overflow-hidden rounded">
                        @if($project->cover_image)
                            <img src="{{ asset($project->cover_image) }}" alt="" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">No image</div>
                        @endif
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold">{{ $project->title }}</h2>
                        <p class="text-sm text-gray-500">{{ Str::limit($project->description, 120) }}</p>
                        <div class="mt-2 flex flex-wrap gap-2">
                            @foreach($project->skills->take(4) as $skill)
                                <span class="text-xs px-2 py-1 bg-gray-100 rounded">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
