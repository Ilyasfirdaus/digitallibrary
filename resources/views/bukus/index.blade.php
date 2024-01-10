{{-- resources/views/bukus/index.blade.php --}}
<x-app-layout>
   
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    

<h1 class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">Data Buku</h1>




  
<a type="button" href="bukus/create" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"> 
    Tambah
</a>

<div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Judul</th>
                    <th scope="col" class="px-6 py-3">Penulis</th>
                    <th scope="col" class="px-6 py-3">Penerbit</th>
                    <th scope="col" class="px-6 py-3">Tahun Terbit</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukus as $buku)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $buku->bukuID }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $buku->judul }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $buku->penulis }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $buku->penerbit }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $buku->tahun_terbit }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('bukus.edit', $buku->bukuID) }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> 
                           Ubah
                        </a>
                        <form action="{{ route('bukus.destroy', $buku->bukuID) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                               Hapus
                            </button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  
      
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>
</x-app-layout>

