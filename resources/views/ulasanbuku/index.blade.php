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
                {{ __('Data Ulasan Buku') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            @if (Auth::user()->role === "peminjam")
                            <button data-modal-target="modalTambah" data-modal-toggle="modalTambah" type="button"
                                class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mb-5">
                                <svg class="w-4 h-4 text-white mr-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                                Beri Ulasan
                            </button>
                            @endif
                


                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Ulasan ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            User
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Buku
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Ulasan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Rating
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ulasanbuku as $ulasan)
                                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $ulasan->ulasanID }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $ulasan->users->namalengkap }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $ulasan->buku->judul }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $ulasan->ulasan }}
                                            </th>
                                            <th scope="row"class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                               {{ $ulasan->rating }}
                                            </th>
                                           
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div id="modalEdit{{ $ulasan->ulasanID }}" tabindex="-1"
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
                                                            data-modal-toggle="modalEdit{{ $ulasan->ulasanID }}">
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
                                                            action="{{ route('ulasanbuku.update', $ulasan->ulasanID) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                                <div class="col-span-2">
                                                                    <label for="id"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Buku</label>
                                                                    <select name="id" id="id"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                                        <option selected="">Pilih Buku</option>
                                                                        @foreach ($users as $user)
                                                                            @if ($user->id == $ulasan->id)
                                                                                <option value="{{ $user->id }}"
                                                                                    selected>{{ $user->namalengkap }}
                                                                                </option>
                                                                            @else
                                                                                <option value="{{ $user->id }}">
                                                                                    {{ $user->namalengkap }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-span-2">
                                                                    <label for="bukuID"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                                                                    <select name="bukuID" id="bukuID"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                                        <option selected="">Pilih Kategori</option>
                                                                        @foreach ($bukus as $b)
                                                                            @if  ($b->bukuID == $ulasan->bukuID)
                                                                                <option value="{{ $b->bukuID }}"
                                                                                    selected>{{ $b->judul }}
                                                                                </option>
                                                                            @else
                                                                                <option value="{{ $b->bukuID }}">
                                                                                    {{ $b->judul }}
                                                                                </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-5">
                                                                    <label for="ulasan"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nama
                                                                        Ulasan</label>
                                                                    <input type="ulasan" 
                                                                        name="ulasan"
                                                                        value="{{ $ulasan->ulasan }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        required>
                                                                </div>
                                                                <div class="mb-5">
                                                                    <label for="rating"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nama
                                                                        Rating</label>
                                                                    <input type="rating" id="rating"
                                                                        name="rating"
                                                                        value="{{ $ulasan->rating }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        required>
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
                                                Ulasan Buku
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
                                        <form action="{{ route('ulasanbuku.store') }}" method="POST" enctype="multipart/form-data"
                                            class="p-4 md:p-5">
                                            @csrf
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">
                                                    <label for="user" class="block mb-2 text-sm font-medium text-gray-900">User</label>
                                                    <select name="user_id" id="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                        <option selected="">Pilih User</option>
                                                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->namalengkap }}</option>
                                                    </select>
                                                </div>
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
                                            <div class="mb-5">
                                                <label for="ulasan"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                                    Ulasan</label>
                                                <input type="" 
                                                    name="ulasan"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required>
                                            </div>
                                            <div class="mb-5">
                                                <label for="rating"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                                    Rating</label>
                                                <input type="rating" id="rating"
                                                    name="rating"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required>
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
