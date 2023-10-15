<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistem Lelang Online') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4 grid divide-y bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 dark:text-gray-100">
                        {{ __("Detail") }}
                    </div>
                </div>
                <div class="flex justify-start items-center p-6">
                    <img src="{{ asset($barang->foto) }}" alt="foto_barang" class="w-56 h-auto">
                    <div class="flex flex-col justify-between h-full px-16">
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Nama Barang : ") }}
                            {{ $barang->nama_barang }}
                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Tanggal : ") }}
                            {{ $barang->tgl }}
                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Harga Awal : ") }}
                            {{ $barang->harga_awal }}
                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Deskripsi : ") }}
                            {{ $barang->deskripsi_barang }}
                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Status : ") }}
                            {{ $lelang->status }}
                        </div>
                        <div class="text-gray-900 dark:text-gray-100">
                            {{ __("Pemenang : ") }}
                            {{ $lelang->status == 'ditutup' && !is_null($pemenang) ? $pemenang->name : "Belum ada" }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4 grid divide-y bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 dark:text-gray-100">
                        {{ __("Data-data Pelelang") }}
                        {{ $barang->nama_barang }}
                    </div>
                </div>
                <div class="flex justify-start items-center p-6">
                    <table class="w-full table table-lg table-auto rounded-lg bg-gray-800 dark:bg-white text-white dark:text-black">
                        <thead>
                            <tr">
                                <th class="border-r-2 border-b-2 border-black px-2">No. </th>
                                <th class="border-r-2 border-b-2 border-black px-2">Pelelang</th>
                                <th class="border-r-2 border-b-2 border-black px-2">No Telp</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Harga Penawaran</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Status</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Ubah Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $h)
                            <tr>
                                <td class="border-r-2 border-t-2 border-black px-2">{{ $loop->iteration }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2">hehe</td>
                                <td class="border-r-2 border-t-2 border-black px-2">hehe</td>
                                <td class="border-l-2 border-t-2 border-black px-2">{{ $history->penawaran_harga }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2">hehe</td>
                                <td class="border-l-2 border-t-2 border-black px-2">hehe</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
