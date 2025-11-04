@extends('layouts.main')
@section('title', 'Home')

@section('content')
<div class="flex flex-col md:flex-row items-center justify-between py-16 px-6 md:px-12 bg-gray-900 text-white min-h-screen">

  {{-- Left Content --}}
  <div class="max-w-xl">
    <h1 class="text-3xl md:text-4xl font-semibold mb-2">Hello,</h1>
    <h2 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
      I Am <span class="text-[#ff9500]">St mutmainnah</span>
    </h2>

    <p class="text-gray-400 mb-8 text-lg leading-relaxed">
      Artificial Intelligence student at Universitas Ciputra Makassar
      <br>Focused on <span class="text-[#ff9500] font-medium">Robotic & Automation</span> & 
      <span class="text-[#ff9500] font-medium">Machine Learning</span>
    </p>

    <a href="/skills" 
       class="bg-[#ff9500] text-black font-semibold px-8 py-3 rounded-md 
              hover:bg-[#ffb347] hover:scale-105 transform transition duration-300 ease-in-out shadow-lg">
      Let's Talk →
    </a>
</div>
{{-- Right Image --}}
<div class="mt-12 md:mt-0 flex justify-center md:justify-end">
  @include('partials.avatar')
</div>
</div>

{{-- Latest projects preview on home --}}
@if(!empty($projects) && $projects->count())
<section class="bg-white py-12 px-6 md:px-12">
  <div class="max-w-5xl mx-auto">
    <h3 class="text-2xl font-bold mb-6">Latest Projects</h3>
    <div class="grid md:grid-cols-3 gap-6">
      @foreach($projects as $project)
        <div class="bg-[#222] p-5 rounded-xl shadow-lg hover:scale-105 transition">
            <h4 class="mt-0 font-semibold text-white text-lg">{{ $project->title }}</h4>
            <p class="text-xs text-gray-400">Author: {{ $project->user->name ?? '—' }}</p>
            <p class="text-sm text-gray-300 mt-2">{{ \Illuminate\Support\Str::limit($project->description, 120) }}</p>
            <div class="mt-3 flex items-center justify-between">
              <p class="text-xs text-gray-400">Tech: {{ is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : ($project->tech_stack ?? '') }}</p>
              <p class="text-xs text-gray-400">Comments: <span class="font-medium">{{ $project->comments_count ?? 0 }}</span></p>
            </div>
          @if(!empty($project->url))
            <a href="{{ $project->url }}" target="_blank" class="text-sm text-[#ff9500] mt-2 inline-block">Visit →</a>
          @endif
        </div>
      @endforeach
    </div>
    <div class="mt-6 text-center">
      <a href="/projects" class="text-[#ff9500] font-medium">View all projects →</a>
    </div>
  </div>
</section>
@endif
@endsection