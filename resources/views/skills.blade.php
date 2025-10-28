@extends('layouts.main')
@section('title', 'Skills')

@section('content')
<h2 class="text-3xl font-bold mb-10 text-[#ff9500]">My Skills</h2>

<div class="max-w-3xl mx-auto space-y-6">

  {{-- HTML --}}
  <div>
    <div class="flex justify-between mb-1">
      <span>HTML</span>
      <span class="text-[#ff9500] font-semibold">95%</span>
    </div>
    <div class="w-full bg-[#222] rounded-full h-3">
      <div class="bg-[#ff9500] h-3 rounded-full transition-all duration-700" style="width:95%"></div>
    </div>
  </div>

  {{-- CSS --}}
  <div>
    <div class="flex justify-between mb-1">
      <span>CSS</span>
      <span class="text-[#ff9500] font-semibold">90%</span>
    </div>
    <div class="w-full bg-[#222] rounded-full h-3">
      <div class="bg-[#ff9500] h-3 rounded-full transition-all duration-700" style="width:90%"></div>
    </div>
  </div>

  {{-- Laravel --}}
  <div>
    <div class="flex justify-between mb-1">
      <span>Laravel</span>
      <span class="text-[#ff9500] font-semibold">85%</span>
    </div>
    <div class="w-full bg-[#222] rounded-full h-3">
      <div class="bg-[#ff9500] h-3 rounded-full transition-all duration-700" style="width:85%"></div>
    </div>
  </div>

  {{-- Database --}}
  <div>
    <div class="flex justify-between mb-1">
      <span>Database (MySQL / Firebase)</span>
      <span class="text-[#ff9500] font-semibold">80%</span>
    </div>
    <div class="w-full bg-[#222] rounded-full h-3">
      <div class="bg-[#ff9500] h-3 rounded-full transition-all duration-700" style="width:80%"></div>
    </div>
  </div>

  {{-- Ubuntu --}}
  <div>
    <div class="flex justify-between mb-1">
      <span>Ubuntu & Server Management</span>
      <span class="text-[#ff9500] font-semibold">75%</span>
    </div>
    <div class="w-full bg-[#222] rounded-full h-3">
      <div class="bg-[#ff9500] h-3 rounded-full transition-all duration-700" style="width:75%"></div>
    </div>
  </div>

  {{-- Flutter & Dart --}}
  <div>
    <div class="flex justify-between mb-1">
      <span>Flutter & Dart</span>
      <span class="text-[#ff9500] font-semibold">70%</span>
    </div>
    <div class="w-full bg-[#222] rounded-full h-3">
      <div class="bg-[#ff9500] h-3 rounded-full transition-all duration-700" style="width:70%"></div>
    </div>
  </div>

  {{-- Python --}}
  <div>
    <div class="flex justify-between mb-1">
      <span>Python</span>
      <span class="text-[#ff9500] font-semibold">95%</span>
    </div>
    <div class="w-full bg-[#222] rounded-full h-3">
      <div class="bg-[#ff9500] h-3 rounded-full transition-all duration-700" style="width:95%"></div>
    </div>
  </div>

</div>

{{-- Optional: animasi bar bergerak naik dari 0 --}}
<script>
  document.querySelectorAll('[style]').forEach(bar => {
    let width = bar.style.width;
    bar.style.width = "0%";
    setTimeout(() => { bar.style.width = width; }, 300);
  });
</script>
@endsection