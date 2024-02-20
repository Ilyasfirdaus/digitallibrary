{{-- resources/views/bukus/index.blade.php --}}
<x-app-layout>

    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    </head>

    <body>

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

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pengguna') }}
        </h2>
    </x-slot>

    

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <a href="{{ route('pdf.index', ['download' => 'pdf']) }}" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mb-5">Download PDF</a>


                 <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                     <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                  <th scope="col" class="px-6 py-3">ID</th>
                                  <th scope="col" class="px-6 py-3">Username</th>
                                  <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                                  <th scope="col" class="px-6 py-3">Alamat</th>
                                  <th scope="col" class="px-6 py-3">Email</th>
                                  <th></th>
                                </tr>
                            </thead>
                        <tbody>
                         @foreach ($users as $user)
                               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <th scope="row"
                                   class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                   {{ $user->id }}
                                  </th>
                                  <td class="px-6 py-4">
                                   {{ $user->name }}
                                  </td>
                                  <td class="px-6 py-4">
                                   {{ $user->namalengkap }}
                                  </td>
                                  <td class="px-6 py-4">
                                   {{ $user->alamat }}
                                  </td>
                                  <td class="px-6 py-4">
                                   {{ $user->email }}
                                  </td>
                                  <td>

                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                                    <svg class="w-4 h-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                    </svg>
                                    </button>

                                    <div id="popup-modal" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3
                                                    class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Apakah Anda Yakin Untuk Menghapus Data ini</h3>
                                                <form
                                                    action="{{ route('kategori.destroy', $user->id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                                        Ya
                                                    </button>
                                                </form>

                                                <button data-modal-hide="popup-modal" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
