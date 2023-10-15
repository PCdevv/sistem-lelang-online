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
                        {{ __("Data Barang") }}
                    </div>
                    <x-secondary-button href>
                        <x-nav-link :href="route('barang.create')">
                            {{ __("+ Tambah Data") }}
                        </x-nav-link>
                    </x-secondary-button>
                </div>
                <div class="flex justify-center items-center py-6 px-3">
                    <table class="w-full table-auto rounded-lg p-3 bg-gray-800 dark:bg-white text-white dark:text-black">
                        <thead>
                            <tr">
                                <th class="border-r-2 border-b-2 border-black px-2">No. </th>
                                <th class="border-r-2 border-b-2 border-black px-2">Nama Barang</th>
                                <th class="border-r-2 border-b-2 border-black px-2">Tanggal</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Foto</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Harga Awal</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $b)
                            <tr>
                                <td class="border-r-2 border-t-2 border-black px-2"> {{ $loop->iteration }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2"> {{ $b->nama_barang }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2"> {{ $b->tgl }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset($b->foto) }}" alt="foto_barang" class="w-48 h-auto">
                                    </div>
                                </td>
                                <td class="border-l-2 border-t-2 border-black px-2"> {{ $b->harga_awal }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2">
                                    <form action="{{ route('barang.edit', ['barang' => $b->id_barang]) }}" method="get">
                                        <button class="rounded-md bg-yellow-400 my-1 p-2 hover:bg-yellow-800">
                                            Edit
                                        </button>
                                    </form>
                                    <form action="{{ route('barang.show', ['barang' => $b->id_barang]) }}" method="get">
                                        <button class="rounded-md bg-blue-400 my-1 p-2 hover:bg-blue-800">
                                            Show
                                        </button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
