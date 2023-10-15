<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistem Lelang Online') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="flex justify-between gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex w-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-blue-300 w-2 h-full"></div>
                <div class="text-sm p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-blue-300">
                        {{ __("JUMLAH PETUGAS") }}
                    </div>
                    <div class="text-lg">
                        {{ $jumlah_petugas }}
                    </div>
                </div>
            </div>
            <div class="flex w-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-green-300 w-2 h-full"></div>
                <div class="text-sm p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-green-300">
                        {{ __("JUMLAH BARANG") }}
                    </div>
                    <div class="text-lg">
                        {{ $jumlah_barang }}
                    </div>
                </div>
            </div>
            <div class="flex w-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-zinc-300 w-2 h-full"></div>
                <div class="text-sm p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-zinc-300">
                        {{ __("JUMLAH LELANG") }}
                    </div>
                    <div class="text-lg">
                        {{ $jumlah_lelang }}
                    </div>
                </div>
            </div>
            <div class="flex w-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-yellow-300 w-2 h-full"></div>
                <div class="text-sm p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-yellow-300">
                        {{ __("JUMLAH PENAWAR") }}
                    </div>
                    <div class="text-lg">
                        {{ $jumlah_penawar }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 grid divide-y overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Data Penawaran") }}
                </div>
                <div class="flex justify-center items-center py-6 px-3">
                    <table class="w-full table table-lg table-auto rounded-lg bg-gray-800 dark:bg-white text-white dark:text-black">
                        <thead>
                            <tr">
                                <th class="border-r-2 border-b-2 border-black px-2">No. </th>
                                <th class="border-r-2 border-b-2 border-black px-2">Nama Barang</th>
                                <th class="border-r-2 border-b-2 border-black px-2">Penawar</th>
                                <th class="border-l-2 border-b-2 border-black px-2">No. Telp</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Harga Penawaran</th>
                                {{-- <th class="border-l-2 border-b-2 border-black px-2">Status</th> --}}
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
                                {{-- <td class="border-l-2 border-t-2 border-black px-2"></td> --}}
                            <tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
