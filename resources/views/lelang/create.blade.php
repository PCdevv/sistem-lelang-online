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
                        {{ __("Buka Lelang") }}
                    </div>
                </div>
                <div class="py-6 px-3">
                    <form method="POST" action="{{ route('lelang.store') }}" enctype="multipart/form-data">
                        @csrf
                
                        <!-- Nama Barang -->
                        <div>
                            <x-input-label for="id_barang" :value="__('Nama Barang')" />
                            <select id="id_barang" type="text" name="id_barang" :value="old('id_barang')" required autofocus autocomplete="id_barang" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-700 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                            
                                <option value="">-- Pilih Barang --</option>
                                @foreach ($barangs as $b)
                                    <option value="{{ $b->id_barang }}">{{ $b->nama_barang }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('nama_barang')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Buka') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
