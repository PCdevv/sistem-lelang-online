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
                        {{ __("Edit Barang") }}
                    </div>
                    <x-secondary-button>
                        <x-nav-link :href="route('user.index', ['level' => request()->level])">
                            {{ __("X") }}
                        </x-nav-link>
                    </x-secondary-button>
                </div>
                <div class="py-6 px-3">
                    <form method="POST" action="{{ route('user.update',['level' => request()->level, 'id_user' => $user->id]) }}">
                        @csrf
                        @method('PATCH')
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                
                        <!-- Telp -->
                        <div class="mt-4">
                            <x-input-label for="telp" :value="__('No. Telp')" />
                            <x-text-input id="telp" class="block mt-1 w-full" type="number" name="telp" :value="old('telp', $user->telp)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('telp')" class="mt-2" />
                        </div>
                
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
