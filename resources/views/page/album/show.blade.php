<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Album') }}
            </h2>
            <div>
                <a href="{{ route('album.index') }}"
                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-lg font-semibold mb-4">Informasi Album</div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type Album:</label>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $album->type_album }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi:</label>
                        <p class="text-gray-800 dark:text-white">{{ $album->deskripsi }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Album:</label>
                        <p class="text-gray-800 dark:text-white">Rp
                            {{ number_format($album->harga_album, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
