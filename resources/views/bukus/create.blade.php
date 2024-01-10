<x-app-layout>
   
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    </head>
    
    <body>

<h1 class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">Tambah Buku</h1>

@if ($errors->any())
<div>
    <strong>Error:</strong>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif    

<form action="{{ route('bukus.store') }}" method="POST" class="mt-6">
    @csrf

    <div class="mb-4">
        <label for="judul" class="block text-gray-700 font-medium mb-2">Judul</label>
        <input type="text" name="judul" id="judul" required class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>

    <div class="mb-4">
        <label for="penulis" class="block text-gray-700 font-medium mb-2">Penulis</label>
        <input type="text" name="penulis" id="penulis" required class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>

    <div class="mb-4">
        <label for="penerbit" class="block text-gray-700 font-medium mb-2">Penerbit</label>
        <input type="text" name="penerbit" id="penerbit" required class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>

    <div class="mb-4">
        <label for="tahun_terbit" class="block text-gray-700 font-medium mb-2">Tahun Terbit</label>
        <input type="number" name="tahun_terbit" id="tahun_terbit" required class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
</form>


        
    
  
    
    
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    
    </body>
    </x-app-layout>
    
