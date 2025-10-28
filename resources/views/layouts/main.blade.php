<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | St mutmainnah Portfolio</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-[#1a1a1d] text-white font-[Poppins]">
  <nav class="flex justify-between items-center py-6 px-10 bg-[#222] border-b border-[#ff9500]">
    <h1 class="text-2xl font-bold text-[#ff9500]">Portfolio<span class="text-white"></span></h1>
    <div class="space-x-8">
      <a href="/" class="hover:text-[#ff9500]">Home</a>
      <a href="/about" class="hover:text-[#ff9500]">About</a>
      <a href="/projects" class="hover:text-[#ff9500]">Projects</a>
      <a href="/skills" class="hover:text-[#ff9500]">Skills</a>
      <a href="/contact" class="hover:text-[#ff9500]">Contact</a>
    </div>
  </nav>
  <main class="p-10">
    @yield('content')
  </main>
  <footer class="text-center py-4 border-t border-[#ff9500] text-gray-400 text-sm">
    © {{ date('Y') }} St_Mutmainnah Portfolio
  </footer>
</body>
</html>