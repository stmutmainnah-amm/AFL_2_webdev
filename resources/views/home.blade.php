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
  <a href="/skills"
     class="relative block w-72 h-72 rounded-full border-4 border-[#ff9500] overflow-hidden 
            shadow-[0_0_25px_#ff9500] hover:scale-110 transition-all duration-300 mx-auto">
    
    <img src="{{ asset('img/mutma.jpg') }}" 
         alt="Mutmainnah"
         class="absolute inset-0 w-full h-full object-cover object-center">
  </a>
</div>
@endsection