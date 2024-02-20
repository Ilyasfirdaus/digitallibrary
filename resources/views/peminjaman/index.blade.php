<x-app-layout>

    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                {{ __('Peminjaman Buku') }}
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
                            Pinjam Buku
                           </button>
                           @endif

                           
                           @if (Auth::user()->role === "administrator" || Auth::user()->role === "petugas")
                           <a href="{{ route('pdf.index', ['download' => 'pdf']) }}" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mb-5">Download PDF</a>
                           @endif

    <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Peminjaman ID</th>
                                        <th scope="col" class="px-6 py-3">User</th>
                                        <th scope="col" class="px-6 py-3">Buku</th>
                                        <th scope="col" class="px-6 py-3">Tanggal Peminjaman</th>
                                        <th scope="col" class="px-6 py-3">Tanggal Pengembalian</th>
                                        <th scope="col" class="px-6 py-3">Status Peminjaman</th>
                                        @if (Auth::user()->role === "peminjam")
                                        <th scope="col" class="px-6 py-3">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjaman as $pinjam)
                                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $pinjam->peminjamanID }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $pinjam->users->namalengkap }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $pinjam->buku->judul }}
                                            </th>
                                            <th scope="row"class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $pinjam->tanggalpeminjaman }}
                                             </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $pinjam->tanggalpengembalian }}
                                            </th>
                                            <th scope="row"class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                <button type="button" class="py-1 px-2 rounded {{ $pinjam->statuspeminjaman == 0? 'bg-blue-500 text-white' : 'bg-red-500 text-white' }}">
                                                    {{ $pinjam->statuspeminjaman == 0? 'Pinjam' : 'Di Kembalikan' }}
                                                </button>
                                             </th>
                                            <td>
                                                @if (Auth::user()->role === "peminjam")
                                                <button data-modal-target="modalEdit{{ $pinjam->peminjamanID }}"
                                                    data-modal-toggle="modalEdit{{ $pinjam->peminjamanID }}"
                                                    type="button"
                                                    class="text-white bg-yellow-300 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                                                    Pengembalian Buku
                                                @endif
                                            </td>


                                              <!-- Modal Edit -->
                                        <div id="modalEdit{{ $pinjam->peminjamanID }}" tabindex="-1"
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
                                                            data-modal-toggle="modalEdit{{ $pinjam->peminjamanID }}">
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
                                                            action="{{ route('peminjaman.update', $pinjam->peminjamanID) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                                <div class="mb-5">
                                                                    <label for="id"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                                                         User</label>
                                                                    <input type="id" id="id"
                                                                        name="id"
                                                                        value="{{ $pinjam->users->namalengkap }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        required disabled>
                                                                </div>
                                                                <div class="mb-5">
                                                                    <label for="bukuID"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                                                        Buku</label>
                                                                    <input type="text" id="bukuID"
                                                                        name="bukuID"

                                                                        value="{{ $pinjam->buku->judul }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        required disabled>
                                                                </div>
                                                                <div class="mb-5">
                                                                    <label for="tanggalpeminjaman"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                                                        Tanggal Peminjaman</label>
                                                                    <input type="date" 
                                                                        name="tanggalpeminjaman"
                                                                        id="tanggalpeminjaman"
                                                                        value="{{ $pinjam->tanggalpeminjaman }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        required disabled>
                                                                </div>
                                                                <div class="mb-5">
                                                                    <label for="tanggalpengembalian"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                                                        Tanggal Pengembalian</label>
                                                                    <input type="date" id="tanggalpengembalian"
                                                                        name="tanggalpengembalian"
                                                                        value="{{ $pinjam->tanggalpengembalian }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                        required disabled>
                                                                </div>

                                                                <div class="mb-5">
                                                                    <input type="hidden" id="statuspeminjaman" name="statuspeminjaman" value="{{ old('statuspeminjaman', $pinjam->statuspeminjaman) == 1 ? '1' : '1' }}" min="1" max="1" readonly 
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required hidden>
                                                                </div>
                                                                </div>
                                                             
                                                            </div>
                                                            <button type="submit"
                                                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">

                                                                Kembalikan
                                                            </button>
                                                        </form>
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
                        Peminjaman Buku
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
                <form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="user" class="block mb-2 text-sm font-medium text-gray-900">User</label>
                            <select name="id" id="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option selected="">Pilih User</option>
                                <option value="{{ Auth::user()->id }}">{{ Auth::user()->namalengkap }}</option>
                            </select>
                        </div>
                     
                    <div class="mb-5">
                        <label for="tanggalpeminjaman"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                            Tanggal Peminjaman</label>
                        <input type="date" 
                            name="tanggalpeminjaman"
                            id="tanggalpeminjaman"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-5">
                        <label for="tanggalpengembalian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                            Tanggal Pengembalian</label>
                        <input type="date" id="tanggalpengembalian"
                            name="tanggalpengembalian"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div class="col-span-2">
                        <label for="bukuID" class="block mb-2 text-sm font-medium text-gray-900">Buku</label>
                        <select name="bukuID" id="bukuID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option selected="">Pilih Buku</option>
                            @foreach ($bukus as $buku)
                                <option value="{{ $buku->bukuID }}">{{ $buku->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <input type="hidden" id="statuspeminjaman" name="statuspeminjaman" value="{{ old('statuspeminjaman', $pinjam->statuspeminjaman) == 0 ? '0' : '0' }}" min="0" max="1" readonly 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required hidden>
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

