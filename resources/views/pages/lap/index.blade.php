<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .center-line {
            text-align: center;
        }

        .center-line hr {
            height: 2px;
            border-width: 0;
            color: gray;
            background-color: gray;
            width: 80px;
            margin: 0 auto;
            /* Mengatur margin untuk membuat garis horizontal berada di tengah */
        }

        .bg-primary {
            background-color: #0099ff;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 relative">
        <div class="wave-container absolute inset-x-0 top-0 z-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#0099ff" fill-opacity="1"
                    d="M0,256L48,234.7C96,213,192,171,288,165.3C384,160,480,192,576,192C672,192,768,160,864,144C960,128,1056,128,1152,144C1248,160,1344,192,1392,208L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
                </path>
            </svg>
        </div>
        <header class="relative z-10 mb-36">
            <nav class="border-gray-200">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                        {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                        --}}
                        <div class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                            <span class="block">Sirespon</span>
                            <span class="text-sm block">Laporan Cepat Tanggap</span>
                        </div>
                    </a>
                    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get
                            started</button>
                        <button data-collapse-toggle="navbar-cta" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="navbar-cta" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                        id="navbar-cta">
                        <ul
                            class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:border-gray-700">
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-black-700 md:dark:text-black"
                                    aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 d:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Page Content -->
        <main class="relative z-10">
            <div class="header mb-16">
                <div class="judul text-center">
                    <p class="text-5xl font-black antialiased tracking-wide">Layanan Laporan Cepat</p>
                    <br>
                    <p>Sampaikan laporan Anda langsung kepada Staff Sekolah</p>
                    <div class="center-line mt-4">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="isi mb-4">
                <div class="container mx-auto flex items-center justify-center">
                    <div class="block max-w-2xl w-full p-6 bg-white border border-gray-200 shadow-2xl">
                        <h5
                            class="mb-5 text-2xl font-extrabold antialiased tracking-tight text-gray-900 dark:text-white bg-primary p-2">
                            Sampaikan
                            Laporan anda</h5>
                        {{-- <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p> --}}
                        <form class="" action="{{ route('laporan.store') }}" method="POST">
                            @csrf
                            <div class="">
                                <div class="klasifikasi mb-5">
                                    <p class="mb-1">Pilih Klasifikasi Anda</p>
                                    <div class="grid max-w-2xl grid-cols-2 gap-2 rounded outline outline-blue-400">
                                        <div>
                                            <input type="radio" name="id_klasifikasi" id="pengaduan" value="pengaduan"
                                                class="peer hidden" checked />
                                            <label for="pengaduan"
                                                class="block cursor-pointer select-none rounded p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Pengaduan</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="id_klasifikasi" id="laporan" value="laporan"
                                                class="peer hidden" />
                                            <label for="laporan"
                                                class="block cursor-pointer select-none rounded p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Laporan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="max-w-2xl mx-auto">
                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="text" name="judul" id="judul"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " required />
                                        <label for="judul"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                            Judul</label>
                                    </div>
                                    <textarea id="message" rows="4" name="desc"
                                        class="block p-2.5 w-full text-sm mb-3 text-gray-900 rounded border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Deskripsi Laporan..."></textarea>
                                    <div class="grid md:grid-cols-2 md:gap-6">
                                        <div class="relative z-0 w-full mb-5 group">
                                            <select id="lokasi"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option>Pilih Lokasi</option>
                                            </select>
                                        </div>
                                        {{-- <div class="relative z-0 w-full mb-5 group">
                                            <input type="text" name="floating_last_name" id="floating_last_name"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required />
                                            <label for="floating_last_name"
                                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                                                name</label>
                                        </div> --}}
                                        <div class="relative z-0 w-full mb-5 group">
                                            <input datepicker type="text"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Select date">
                                        </div>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <select id="lokasi" name="lokasi"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option>Asal Pelapor</option>
                                        </select>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <select id="id_kategori" name="id_kategori"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option>Kategori Laporan</option>
                                        </select>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <select id="id_tujuan_laporan" name="id_tujuan_laporan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option>Ditujukan Kepada</option>
                                        </select>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="mr-2 border">
                                            <input
                                                class="block max-w-sm border text-sm border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none "
                                                aria-describedby="lampiran" id="lampiran" type="file">
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <input id="status_pengirim" type="checkbox" name="status_pengirim"
                                                    value="anonim"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="status_pengirim"
                                                    class="ms-2 text-base font-medium">Anonim</label>
                                            </div>
                                            <div>
                                                <input id="status" type="checkbox" name="status" value="publik"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="status" class="ms-2 text-base font-medium">Publik</label>
                                            </div>
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>

</html>