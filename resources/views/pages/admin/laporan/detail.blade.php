<x-app-layout>
    <x-slot name="header">
        <h2 class="font-se  bold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-col min-h-full bg-gray-200 dark:bg-gray-800 p-8 rounded-lg mb-4">
        <div class="flex justify-between items-center border-b pb-3 mb-3 border-b-gray-400">
            <p class="font-black text-white text-xl ">Detail Laporan</p>
            <p class="bg-red-700 text-red-200 p-2 rounded-lg text-sm ">Bahaya</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4">
            <div class="kiri col-span-3 text-white ">
                <p class="font-black text-3xl mb-4">Satwa Liar Tertembak</p>
                <div class="flex items-center group text-gray-300 mb-2">
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 19">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.013 7.962a3.519 3.519 0 0 0-4.975 0l-3.554 3.554a3.518 3.518 0 0 0 4.975 4.975l.461-.46m-.461-4.515a3.518 3.518 0 0 0 4.975 0l3.553-3.554a3.518 3.518 0 0 0-4.974-4.975L10.3 3.7" />
                    </svg>
                    <span class="ms-2">Kategori</span>
                </div>
                <div class="flex items-center group text-gray-300 mb-2">
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M17 16h-1V2a1 1 0 1 0 0-2H2a1 1 0 0 0 0 2v14H1a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM5 4a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4Zm0 5V8a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1Zm6 7H7v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm2-7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1Zm0-4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1Z" />
                    </svg>
                    <span class="ms-2">Instansi</span>
                </div>
                <div class="flex items-center group text-gray-300 mb-2">
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="m19.822 7.431-4.846-7A1 1 0 0 0 14.153 0H1a1 1 0 0 0-.822 1.569L4.63 8 .178 14.431A1 1 0 0 0 1 16h13.153a1.001 1.001 0 0 0 .823-.431l4.846-7a1 1 0 0 0 0-1.138Z" />
                    </svg>
                    <span class="ms-2">Kepada</span>
                </div>
                <div class="">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias alias asperiores numquam
                        culpa, dicta error, libero ipsam non cum quo enim fuga omnis quos rerum accusantium laborum
                        quibusdam est deleniti!</p>
                </div>
            </div>
            <div class="kanan">
                <img class="h-auto max-w-full"
                    src="https://static.vecteezy.com/system/resources/thumbnails/010/886/263/small/404-error-page-free-download-free-vector.jpg"
                    alt="image description">
            </div>
        </div>
    </div>
</x-app-layout>