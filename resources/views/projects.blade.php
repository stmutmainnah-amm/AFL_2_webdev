@extends('layouts.main')
@section('title', 'Projects')

@section('content')
<h2 class="text-3xl font-bold mb-6 text-[#ff9500] text-center">My Projects</h2>

<div class="grid md:grid-cols-3 gap-8">
  {{-- Project 1 --}}
  <div class="bg-[#222] p-5 rounded-xl shadow-lg hover:scale-105 transition">
    <h3 class="text-xl font-semibold">
      <a href="https://github.com/stmutmainnah-amm/web-static-webpro" 
         target="_blank" 
         class="text-[#ff9500] hover:underline flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" class="w-5 h-5">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54...z"/>
        </svg>
        Web Static Webpro
      </a>
    </h3>
    <p class="text-gray-400 mt-2">Membuat project penjualan menggunakan HTML & CSS dasar.</p>
    <a href="https://github.com/stmutmainnah-amm/web-static-webpro" 
       target="_blank"
       class="inline-block mt-3 text-sm text-[#ff9500] hover:text-white transition">
       🔗 View on GitHub
    </a>
  </div>

  {{-- Project 2 --}}
  <div class="bg-[#222] p-5 rounded-xl shadow-lg hover:scale-105 transition">
    <h3 class="text-xl font-semibold">
      <a href="https://github.com/stmutmainnah-amm/pratikum_crud_webdev" 
         target="_blank" 
         class="text-[#ff9500] hover:underline flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" class="w-5 h-5">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54...z"/>
        </svg>
        CRUD Database
      </a>
    </h3>
    <p class="text-gray-400 mt-2">Aplikasi CRUD sederhana untuk data mahasiswa (Create, Read, Update, Delete).</p>
    <a href="https://github.com/stmutmainnah-amm/pratikum_crud_webdev" 
       target="_blank"
       class="inline-block mt-3 text-sm text-[#ff9500] hover:text-white transition">
       🔗 View on GitHub
    </a>
  </div>

  {{-- Project 3 --}}
  <div class="bg-[#222] p-5 rounded-xl shadow-lg hover:scale-105 transition">
    <h3 class="text-xl font-semibold">
      <a href="https://github.com/stmutmainnah-amm/web-profile-tailwindcss" 
         target="_blank" 
         class="text-[#ff9500] hover:underline flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" class="w-5 h-5">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54...z"/>
        </svg>
        Profile TailwindCSS
      </a>
    </h3>
    <p class="text-gray-400 mt-2">Desain profil pribadi modern dengan TailwindCSS responsive.</p>
    <a href="https://github.com/stmutmainnah-amm/web-profile-tailwindcss" 
       target="_blank"
       class="inline-block mt-3 text-sm text-[#ff9500] hover:text-white transition">
       🔗 View on GitHub
    </a>
  </div>
</div>
@endsection