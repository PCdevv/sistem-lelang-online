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
                        {{ __("Laporan Lelang") }}
                    </div>
                    <x-secondary-button href>
                        <x-nav-link :href="route('export-excel')" id="download-excel">
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
                                <th class="border-r-2 border-b-2 border-black px-2">Harga Awal</th>
                                <th class="border-r-2 border-b-2 border-black px-2">Harga Akhir</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Pemenang</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Penginput</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Tanggal</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lelangs as $l)
                            <tr>
                                <td class="border-r-2 border-t-2 border-black px-2"> {{ $loop->iteration }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2"> {{ $l->data_barang->nama_barang }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2">{{ $l->data_barang->harga_awal }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2"> {{ $l->harga_akhir }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2">blm</td>
                                <td class="border-l-2 border-t-2 border-black px-2">John Doe</td>
                                <td class="border-l-2 border-t-2 border-black px-2">{{ $l->tgl_lelang }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2">
                                    {{ $l->status == '0' ? "tunda" : $l->status }}
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('download-excel').addEventListener('click', function() {
            // Handle the Excel download and then redirect
            window.location.href = "{{ route('laporan.lelang') }}";
        });
    </script>
</x-app-layout>
