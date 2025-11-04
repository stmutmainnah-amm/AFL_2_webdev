@extends('layouts.main')
@section('title', 'Projects')

@section('content')
<h2 class="text-3xl font-bold mb-6 text-[#ff9500] text-center">My Projects</h2>

<div class="grid md:grid-cols-3 gap-8">
  @forelse($projects ?? collect() as $project)
        <div class="bg-[#222] p-5 rounded-xl shadow-lg hover:scale-105 transition">
          <h3 class="text-xl font-semibold mt-0 text-white">
            <a href="{{ $project->url ?? '#' }}" target="_blank" class="text-white hover:underline">{{ $project->title ?? 'Untitled Project' }}</a>
          </h3>
          <p class="text-xs text-gray-400">Author: {{ $project->user->name ?? '—' }}</p>
          <p class="text-gray-400 mt-2">{{ $project->description ?? '' }}</p>
          <div class="mt-3 flex items-center justify-between">
            <p class="text-sm text-gray-500">Comments: <span class="font-medium">{{ $project->comments_count ?? 0 }}</span></p>
            <p class="text-xs text-gray-400">Tech: {{ is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : ($project->tech_stack ?? '') }}</p>
          </div>
        </div>
  @empty
    <div class="col-span-3 text-center text-gray-500">No projects found.</div>
  @endforelse
</div>
@endsection