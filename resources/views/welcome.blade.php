<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Perpustakaan Digital</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

       
    </head>
    <body class="antialiased">
        

<nav class="bg-white dark:bg-blue-800 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('storage/images/teras.png') }}" alt="Foto perusahaan" class="w-20 h-15 object-cover">
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <a href="{{ route('login') }}"type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</a>
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-blue-800 md:dark:bg-blue-800 dark:border-gray-700">
        <li>
          <a href="#home" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#buku" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Buku</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>

  <br>
  
       

     

<section id="home" class="bg-center bg-no-repeat bg-[url('storage/images/dashboard.jpg')] bg-gray-700 bg-blend-multiply">
  <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-60">
      <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Teras</h1>
      <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Sistem Perpustakaan Digital</p>
      <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Salam Literasi</p>

      <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
          <a href="{{ route('login') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
              Get started
              <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
              </svg>
          </a>
      </div>
  </div>
</section>
<br>

<form  method="GET" class="max-w-md mx-auto">   
  
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="text" name="search" value="{{ $search }}" id="default-search" class="block w-full p-4 ps-10 text-sm text-blue-900 border border-blue-500 rounded-lg bg-white-50 focus:ring-blue-500 focus:border-blue-900 dark:bg-white-700 dark:border-blue-700 dark:placeholder-white-400 dark:text-blue dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pencarian Buku" required />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>


<div id="buku" class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-white-800 dark:border-white-700">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      @foreach ($bukus as $buku)
        <div class="w-full bg-blue-800 border border-blue-600 rounded-lg shadow dark:bg-white-800 dark:border-white-700">
          <a href="#">
            <img src="{{ asset('storage/images/' . basename($buku->foto)) }}" alt="Foto Buku" class="h-48 w-full object-cover p-8 rounded-t-lg">
          </a>
          <div class="px-5 pb-5">
            <a href="#">
              <h5 class="text-xl font-semibold tracking-tight text-white-900 dark:text-white">{{ $buku->judul }}</h5>
            </a>
          </div>
          <div class="flex items-center justify-between">
            <span class="text-xl font-bold text-white-900 dark:text-white">{{ $buku->penulis }}</span>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  

<footer class="bg-white rounded-lg shadow dark:bg-white-900 ">
  <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
      <div class="sm:flex sm:items-center sm:justify-between">
        <img src="{{ asset('storage/images/rompscrop.png') }}" alt="Foto perusahaan" class="w-25 h-20 object-cover">
        <img src="{{ asset('storage/images/teras.png') }}" alt="Foto perusahaan" class="w-25 h-20 object-cover">
      </div>
      <span class="block text-sm text-blue-500 sm:text-center dark:text-blue-400">© 2024 . RompsCrop.</span>
  </div>
</footer>








           

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    </body>
</html>
