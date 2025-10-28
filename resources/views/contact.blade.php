@extends('layouts.main')
@section('title', 'Contact')

@section('content')
<h2 class="text-3xl font-bold mb-10 text-[#ff9500]">Contact Me</h2>

<div class="text-center space-y-6">

  <p class="text-gray-300 max-w-xl mx-auto leading-relaxed">
    Let’s connect! You can reach me through any of the platforms below.
  </p>

  <div class="flex justify-center gap-10 text-4xl mt-8">
    {{-- GitHub --}}
    <a href="https://github.com/stmutmainnah-amm" target="_blank"
       class="hover:text-[#ff9500] transition-transform transform hover:scale-125 duration-300">
       <i class="fab fa-github"></i>
    </a>

    {{-- LinkedIn --}}
    <a href="https://www.linkedin.com/in/stwww-stmutmainnah/" target="_blank"
       class="hover:text-[#ff9500] transition-transform transform hover:scale-125 duration-300">
       <i class="fab fa-linkedin"></i>
    </a>

    {{-- Instagram --}}
    <a href="hhttps://www.instagram.com/siti_mutmainnahhh?igsh=MWNwNXJuYnp2OG8yag%3D%3D&utm_source=qr" target="_blank"
       class="hover:text-[#ff9500] transition-transform transform hover:scale-125 duration-300">
       <i class="fab fa-instagram"></i>
    </a>

    {{-- WhatsApp --}}
    <a href="https://wa.me/62875490110" target="_blank"
       class="hover:text-[#ff9500] transition-transform transform hover:scale-125 duration-300">
       <i class="fab fa-whatsapp"></i>
    </a>

    {{-- Telegram --}}
    <a href="https://t.me/sheihan" target="_blank"
       class="hover:text-[#ff9500] transition-transform transform hover:scale-125 duration-300">
       <i class="fab fa-telegram"></i>
    </a>
  </div>

{{-- FontAwesome --}}
<script src="https://kit.fontawesome.com/a2e0e6b4a5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
@endsection