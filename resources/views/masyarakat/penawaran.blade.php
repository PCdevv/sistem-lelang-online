<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistem Lelang Online') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 grid divide-y overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Data yang sudah dilelang") }}
                </div>
                <div class="flex justify-center items-center py-6 px-3">
                    <table class="w-full table table-lg table-auto rounded-lg bg-gray-800 dark:bg-white text-white dark:text-black">
                        <thead>
                            <tr">
                                <th class="border-r-2 border-b-2 border-black px-2">No. </th>
                                <th class="border-r-2 border-b-2 border-black px-2">Nama Barang</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Harga Penawaran</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-r-2 border-t-2 border-black px-2"> hehe</td>
                                <td class="border-r-2 border-t-2 border-black px-2"> hehe</td>
                                <td class="border-l-2 border-t-2 border-black px-2"> hehe</td>
                                <td class="border-l-2 border-t-2 border-black px-2"> hehe</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>