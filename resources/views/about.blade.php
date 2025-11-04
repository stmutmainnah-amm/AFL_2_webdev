@extends('layouts.main')
@section('title', 'Home')

@section('content')
<div class="flex flex-col md:flex-row items-center justify-between">
  <div class="max-w-lg">
    <h2 class="text-4xl font-semibold">Hello,</h2>
    <h1 class="text-5xl font-bold mb-4">I Am <span class="text-[#ff9500]">St mutmainnah</span></h1>
    <p class="text-gray-400 mb-6">
      Robotic & Automation | Machine Learning | Entrepreneur
      <br>I'm Siti mutmainnah - an Artificial Intelligence student at Universitas Ciputra Makassar. I'm higly enthusiastic about technology innovation and web platfrom development, aiming to create digital solutions that improve people's lives.I am currently expanding my knowledge and skills in technology through various projects and academic learning at the university.
    </p>
    <a href="skills" class="bg-[#ff9500] text-black font-semibold px-6 py-3 rounded-md hover:bg-[#ffb347] transition">Let's Talk →</a>
  </div>

@include('partials.avatar')
</div> 
@endsection