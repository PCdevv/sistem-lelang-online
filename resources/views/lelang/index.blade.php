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
                        {{ __("Data Lelang") }}
                    </div>
                    {{-- <x-secondary-button href>
                        <x-nav-link :href="route('lelang.create')">
                            {{ __("+ Tambah Data") }}
                        </x-nav-link>
                    </x-secondary-button> --}}
                </div>
                <div class="flex justify-center items-center py-6 px-3">
                    <table class="w-full table-auto rounded-lg p-3 bg-gray-800 dark:bg-white text-white dark:text-black">
                        <thead>
                            <tr">
                                <th class="border-r-2 border-b-2 border-black px-2">No. </th>
                                <th class="border-r-2 border-b-2 border-black px-2">Nama Barang</th>
                                <th class="border-r-2 border-b-2 border-black px-2">Harga Awal</th>
                                <th class="border-r-2 border-b-2 border-black px-2">Harga Akhir</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Pemenang</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Foto</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Status</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lelangs as $l)
                            <tr>
                                <td class="border-r-2 border-t-2 border-black px-2"> {{ $loop->iteration }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2"> {{ $l->data_barang->nama_barang }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2">{{ $l->data_barang->harga_awal }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2"> {{ $l->harga_akhir }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2">
                                    {{ $l->status == 'ditutup' && !is_null($l->id_masyarakat) ? $l->data_masyarakat->name : "Belum ada" }}
                                </td>
                                <td class="border-l-2 border-t-2 border-black px-2">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset($l->data_barang->foto) }}" alt="foto_barang" class="w-48 h-auto">
                                    </div>
                                </td>
                                <td class="border-l-2 border-t-2 border-black px-2">
                                    {{ $l->status == '0' ? "tunda" : $l->status }}
                                </td>
                                <td class="border-l-2 border-t-2 border-black px-2">
                                    @if ($l->status == 'ditutup' || $l->status == '0')
                                    <form action="{{ route('lelang.buka', ['lelang' => $l->id_lelang]) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button class="rounded-md bg-green-400 my-1 p-2 hover:bg-green-800">
                                            Buka
                                        </button>
                                    </form>
                                    @endif
                                    @if ($l->status == 'dibuka')
                                    <form action="{{ route('lelang.tutup', ['lelang' => $l->id_lelang]) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button class="rounded-md bg-orange-400 my-1 p-2 hover:bg-orange-800">
                                            Tutup
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{ route('lelang.show', ['lelang' => $l->id_lelang]) }}" method="get">
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
