<x-app-layout>
    <x-slot name="header">
        <h2 class="font-se  bold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="flex flex-col min-h-96 max-h-96 bg-gray-200 dark:bg-gray-800 p-8 rounded-lg mb-4">
        <p class="font-black text-center text-white mb-8 text-2xl">Recent Pelaporan</p>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex-1">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Judul
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Klasifikasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Level
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kepada
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-red-700 px-2 rounded text-red-200 font-semibold">Bahaya</span>

                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-yellow-700 px-2 rounded text-yellow-200 font-semibold">Belum</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">
                            White
                        </td>
                        <td class="px-6 py-4">
                            Laptop PC
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-red-700 px-2 rounded text-red-200 font-semibold">Bahaya</span>
                        </td>
                        <td class="px-6 py-4">
                            $1999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-green-700 px-2 rounded text-green-200 font-semibold">Status</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-5">
        <div
            class="flex flex-col min-h-96 max-h-96 bg-gray-200 col-span-2 dark:bg-gray-800 p-8 rounded-lg mb-4 text-white">
            <div class="flex justify-between items-center mb-8">
                <p class="font-black text-2xl">Recent Pelaporan</p>
                <a href="" class="text-blue-600">View All</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex-1">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Klasifikasi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Level
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kepada
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-red-700 px-2 rounded text-red-200 font-semibold">Bahaya</span>

                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-yellow-700 px-2 rounded text-yellow-200 font-semibold">Belum</span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                            </td>
                        </tr>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Microsoft Surface Pro
                            </th>
                            <td class="px-6 py-4">
                                White
                            </td>
                            <td class="px-6 py-4">
                                Laptop PC
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-red-700 px-2 rounded text-red-200 font-semibold">Bahaya</span>
                            </td>
                            <td class="px-6 py-4">
                                $1999
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-green-700 px-2 rounded text-green-200 font-semibold">Status</span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
        <div class="block bg-gray-200 dark:bg-gray-800 p-8 rounded-lg mb-4 text-white">
            <div class="flex justify-between mx-auto mb-8">
                <p class="font-black  text-2xl">Recent Instansi</p>
                <a href="" class="text-blue-600">View All</a>
            </div>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                <li class="pb-3 sm:pb-4">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Tata Usaha
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                Akmal Bariq Yonanda
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            NULL
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Tata Boga
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                Akmal Bariq Yonanda
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            NULL
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</x-app-layout>