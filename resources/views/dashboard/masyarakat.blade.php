<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistem Lelang Online') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Barang yang dilelang") }}
                </div>
            </div>
        </div>
    </div>
    @if (sizeof($lelang_dibuka) == 0)
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Belum ada lelang yang dibuka
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="py-4">
        <div class="grid grid-cols-4 justify-between gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($lelang_dibuka as $l)
                <div class="w-full flex flex-col justify-between items-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3 text-center">
                    <img src="{{ asset($l->data_barang->foto) }}" alt="foto_barang" class="w-48 h-auto">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __($l->data_barang->nama_barang) }}
                    </div>
                    <x-primary-button class="w-full">
                        <x-nav-link :href="route('lelang.detail', ['barang' => $l->data_barang->id_barang])">
                            {{ __('Pesan') }}
                        </x-nav-link>
                    </x-primary-button>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
