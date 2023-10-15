<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistem Lelang Online') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-3/5 mx-auto sm:px-6 lg:px-8">
            <div class="grid divide-y bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-gray-900 dark:text-gray-100">
                        {{ __("Tambah Barang") }}
                    </div>
                </div>
                <div class="py-6 px-3">
                    <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
                        @csrf
                
                        <!-- Nama Barang -->
                        <div>
                            <x-input-label for="nama_barang" :value="__('Nama Barang')" />
                            <x-text-input id="nama_barang" class="block mt-1 w-full" type="text" name="nama_barang" :value="old('nama_barang')" required autofocus autocomplete="nama_barang" />
                            <x-input-error :messages="$errors->get('nama_barang')" class="mt-2" />
                        </div>

                        <!-- Deskripsi -->
                        <div class="mt-4">
                            <x-input-label for="deskripsi_barang" :value="__('Deskripsi Barang')" />
                            <textarea id="deskripsi_barang" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="deskripsi_barang" :value="old('deskripsi_barang')" required autofocus autocomplete="deskripsi_barang" cols="30" rows="10"></textarea>
                            <x-input-error :messages="$errors->get('deskripsi_barang')" class="mt-2" />
                        </div>
                
                        <!-- Harga Awal -->
                        <div class="mt-4">
                            <x-input-label for="harga_awal" :value="__('Harga Awal')" />
                            <x-text-input id="harga_awal" class="block mt-1 w-full" type="number" name="harga_awal" :value="old('harga_awal')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('harga_awal')" class="mt-2" />
                        </div>
                
                        <!-- Foto -->
                        <div class="mt-4">
                            <x-input-label for="foto" :value="__('Foto Barang')" />
                            <input id="foto"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="file" accept="image/*" name="foto" :value="old('foto')" required autocomplete="foto" />
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Konfirmasi') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
