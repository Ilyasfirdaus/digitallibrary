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
                {{ __('Data Kategori Buku') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <button data-modal-target="modalTambah" data-modal-toggle="modalTambah" type="button"
                                class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mb-5">
                                <svg class="w-4 h-4 text-white mr-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                                Tambah
                            </button>
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Buku
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoribuku as $kategoribuku)
                                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $kategoribuku->kategoribukuID }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $kategoribuku->buku->judul }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $kategoribuku->kategori->namakategori }}
                                            </th>
                                            <td class="px-6 py-4">
                                                <button data-modal-target="modalEdit{{ $kategoribuku->kategoribukuID }}"
                                                    data-modal-toggle="modalEdit{{ $kategoribuku->kategoribukuID }}"
                                                    type="button"
                                                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                                                    <svg class="w-4 h-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 18">
                                                        <path
                                                            d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                                        <path
                                                            d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                                    </svg>
                                                    
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
                                                                            <form action="{{ route('kategoribuku.destroy', $kategoribuku->kategoribukuID) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                                                            Ya
                                                                        </button>
                                                                    </form>
                                    
                    
                                                                    <button data-modal-hide="popup-modal" type="button"
                                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 me-2 mb-2  hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div id="modalEdit{{ $kategoribuku->kategoribukuID }}" tabindex="-1"
                                            aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative p-4 bg-white rounded-lg shadow">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                        <h3 class="text-lg font-semibold text-gray-900">
                                                            Ubah Data
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                            data-modal-toggle="modalEdit{{ $kategoribuku->kategoribukuID }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5">
                                                        <form
                                                            action="{{ route('kategoribuku.update', $kategoribuku->kategoribukuID) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                                <div class="col-span-2">
                                                                    <label for="bukuID"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Buku</label>
                                                                    <select name="bukuID" id="bukuID"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                                        <option selected="">Pilih Buku</option>
                                                                        @foreach ($bukus as $b)
                                                                            @if ($b->bukuID == $kategoribuku->bukuID)
                                                                                <option value="{{ $b->bukuID }}"
                                                                                    selected>{{ $b->judul }}
                                                                                </option>
                                                                            @else
                                                                                <option value="{{ $b->bukuID }}">
                                                                                    {{ $b->judul }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="kategoriID"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                                                                    <select name="kategoriID" id="kategoriID"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                                        <option selected="">Pilih Kategori</option>
                                                                        @foreach ($kategori as $k)
                                                                            @if  ($k->kategoriID == $kategoribuku->kategoriID)
                                                                                <option value="{{ $k->kategoriID }}"
                                                                                    selected>{{ $k->namakategori }}
                                                                                </option>
                                                                            @else
                                                                                <option value="{{ $k->kategoriID }}">
                                                                                    {{ $k->namakategori }}
                                                                                </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <button type="submit"
                                                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                                                    viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                Simpan
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Tambah -->
        <div id="modalTambah" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-lg font-semibold text-gray-900">
                            tambah Data
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-toggle="modalTambah">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('kategoribuku.store') }}" method="POST" enctype="multipart/form-data"
                        class="p-4 md:p-5">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="bukuID"
                                    class="block mb-2 text-sm font-medium text-gray-900">Buku</label>
                                <select name="bukuID" id="bukuID"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option selected="">Pilih Buku</option>
                                    @foreach ($bukus as $buku)
                                        <option value="{{ $buku->bukuID }}">{{ $buku->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="kategoriID"
                                    class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                                <select name="kategoriID" id="kategoriID"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option selected="">Pilih Kategori</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->kategoriID }}">{{ $k->namakategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    </body>
</x-app-layout>
