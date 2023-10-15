<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistem Lelang Online') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid divide-y bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 dark:text-gray-100">
                        {{ __("Laporan Penawaran Lelang") }}
                    </div>
                    <x-secondary-button href>
                        <x-nav-link :href="route('lelang.create')">
                            {{ __("Download EXCEL") }}
                        </x-nav-link>
                    </x-secondary-button>
                </div>
                <div class="flex justify-center items-center py-6 px-3">
                    <table class="w-full table-auto rounded-lg p-3 bg-gray-800 dark:bg-white text-white dark:text-black">
                        <thead>
                            <tr">
                                    <th class="border-r-2 border-b-2 border-black px-2">No. </th>
                                    <th class="border-r-2 border-b-2 border-black px-2">Nama Barang</th>
                                    <th class="border-r-2 border-b-2 border-black px-2">Penawar</th>
                                    <th class="border-l-2 border-b-2 border-black px-2">No. Telp</th>
                                    <th class="border-l-2 border-b-2 border-black px-2">Harga Penawaran</th>
                                    <th class="border-l-2 border-b-2 border-black px-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penawaran as $p)
                            <tr>
                                <td class="border-r-2 border-t-2 border-black px-2"> {{ $loop->iteration }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2"> {{ $p->data_barang->nama_barang }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2"> {{ $p->data_penawar->name }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2">{{ $p->data_penawar->telp }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2"> {{ $p->penawaran_harga }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2"></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
