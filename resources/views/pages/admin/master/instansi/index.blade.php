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
    <div class="grid grid-cols-1 md:grid-cols-5 md:gap-5">
        <div class="flex flex-col bg-gray-200 col-span-3 dark:bg-gray-800 p-8 rounded-lg mb-4 text-white">
            <div class="flex justify-between items-center mb-8">
                <p class="font-black text-2xl">Add Instansi</p>
            </div>
            <form action="{{ route('admin.instansi.store')}}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-4">
                    <div class="w-full">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Instansi</label>
                        <input type="text" name="nama" id="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nama Instansi" required="">
                    </div>
                    <div class="w-full">
                        <label for="pemimpin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pemimpin</label>
                        <input type="text" name="pemimpin" id="pemimpin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nama" required="">
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
        <div class="block bg-gray-200 dark:bg-gray-800 col-span-2 p-8 rounded-lg mb-4 text-white">
            <div class="flex justify-between items-center mb-8">
                <p class="font-black text-2xl">List Instansi</p>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Instansi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pemimpin
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Status
                            </th> --}}
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!isset($instansi) || count($instansi) === 0)
                        <tr>
                            <td colspan="4">
                                <p class="font-black text-white text-center py-4 text-xl">Data Tidak ada</p>
                            </td>
                        </tr>
                        @else
                        @foreach ($instansi as $data)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->id}}
                            </th>
                            <td class="px-6 py-4 font-medium text-white">
                                {{$data->nama}}
                            </td>
                            <td class="px-6 py-4">
                                {{$data->pemimpin}}
                            </td>
                            {{-- <td class="px-6 py-4">
                                <span class="bg-red-700 px-2 rounded text-red-200 font-semibold">Bahaya</span> --}}
                            <td class="px-6 py-4">
                                <form action="{{route('admin.instansi.destroy', $data->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>