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
                        {{ __("Data ") }}
                        {{ request()->level }}
                    </div>
                    <x-secondary-button>
                        <x-nav-link :href="route('user.create', ['level' => request()->level])">
                            {{ __("+ Tambah ") }}
                            {{ request()->level }}
                        </x-nav-link>
                    </x-secondary-button>
                </div>
                <div class="flex justify-center items-center py-6 px-3">
                    <table class="w-full table-auto rounded-lg p-3 bg-gray-800 dark:bg-white text-white dark:text-black">
                        <thead>
                            <tr">
                                <th class="border-r-2 border-b-2 border-black px-2">No. </th>
                                <th class="border-r-2 border-b-2 border-black px-2">Nama</th>
                                <th class="border-r-2 border-b-2 border-black px-2">Telp</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Email</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Password</th>
                                <th class="border-l-2 border-b-2 border-black px-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                            <tr>
                                <td class="border-r-2 border-t-2 border-black px-2">{{ $loop->iteration }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2">{{ $u->name }}</td>
                                <td class="border-r-2 border-t-2 border-black px-2">{{ $u->telp }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2">{{ $u->email }}</td>
                                <td class="border-l-2 border-t-2 border-black px-2">Tidak ditampilkan</td>
                                <td class="border-l-2 border-t-2 border-black px-2">
                                    <form action="{{ route('user.edit', ['level' => request()->level, 'id_user' => $u->id]) }}" method="get">
                                        <button class="rounded-md bg-yellow-400 my-1 p-2 hover:bg-yellow-800">
                                            Edit
                                        </button>
                                    </form>
                                    <form action="{{ route('user.destroy', ['level' => request()->level, 'id_user' => $u->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-md bg-red-400 my-1 p-2 hover:bg-red-800">
                                            Delete
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
