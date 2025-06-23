<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Album Management') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="relative w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search Album..."
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Form Section -->
                <div
                    class="w-full lg:w-1/2 bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <div class="p-5 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold rounded-t-lg">
                        <i class="fas fa-plus-circle mr-2"></i> FORM INPUT ALBUM
                    </div>
                    <div class="p-6">
                        <form method="POST" action="{{ route('album.store') }}" class="space-y-4">
                            @csrf
                            <div>
                                <label for="type_album"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Type album <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="type_album" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                    placeholder="Masukkan Type album">
                            </div>

                            <div>
                                <label for="deskripsi"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Deskripsi <span class="text-red-500">*</span>
                                </label>
                                <textarea type="text" name="deskripsi" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                    placeholder="Deskripsi">
                                </textarea>
                            </div>

                            <div>
                                <label for="harga_album"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Harga album <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="harga_album" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                    placeholder="Masukkan Harga album">
                            </div>

                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-[1.01] shadow-md">
                                    <i class="fas fa-save mr-2"></i> Simpan album
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Data Table Section -->
                <div
                    class="w-full bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <div
                        class="p-5 bg-gradient-to-r from-purple-500 to-purple-600 text-white font-bold rounded-t-lg flex justify-between items-center">
                        <div>
                            <i class="fas fa-campground mr-2"></i> DATA ALBUM
                        </div>
                        <div class="text-sm font-normal">
                            Total: {{ $album->total() }} Album
                        </div>
                    </div>

                    <div class="overflow-x-auto p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($album as $a)
                            <div
                                class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $a->type_album }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">{{ $a->deskripsi }}</p>
                                <p class="text-md font-bold text-blue-600 dark:text-blue-400 mt-2">Rp
                                    {{ number_format($a->harga_album, 0, ',', '.') }}</p>
                                <div class="flex justify-end mt-4 space-x-2">
                                    <button onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                        data-id="{{ $a->id }}" data-type_album="{{ $a->type_album }}"
                                        data-deskripsi="{{ $a->deskripsi }}" data-harga_album="{{ $a->harga_album }}"
                                        class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 p-2 rounded-full hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors duration-200">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="return albumDelete('{{ $a->id }}','{{ $a->type_album }}')"
                                        class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors duration-200">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div
                        class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 rounded-b-lg">
                        {{ $album->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="fixed inset-0 z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-xl transform transition-all">
                <div
                    class="p-5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-t-xl flex justify-between items-center">
                    <h3 class="text-lg font-semibold" id="title_source">
                        <i class="fas fa-edit mr-2"></i> Update album
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-white hover:text-gray-200 focus:outline-none">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="p-6 space-y-4">
                        <div>
                            <label for="type_album"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Type album
                            </label>
                            <input type="text" id="type_album" name="type_album"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="Type album">
                        </div>

                        <div>
                            <label for="deskripsi"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Deskripsi
                            </label>
                            <input type="text" id="deskripsi" name="deskripsi"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="Deskripsi">
                        </div>

                        <div>
                            <label for="harga_album"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Harga album
                            </label>
                            <input type="number" id="harga_album" name="harga_album"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="Harga album">
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 rounded-b-xl flex justify-end space-x-3">
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-600 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors duration-200">
                            Batal
                        </button>
                        <button type="submit" id="formSourceButton"
                            class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-md">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const type_album = button.dataset.type_album;
        const deskripsi = button.dataset.deskripsi;
        const harga_album = button.dataset.harga_album;
        let url = "{{ route('album.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `Update ${type_album}`;

        document.getElementById('type_album').value = type_album;
        document.getElementById('deskripsi').value = deskripsi;
        document.getElementById('harga_album').value = harga_album;

        document.getElementById('formSourceButton').innerText = 'Simpan Perubahan';
        document.getElementById('formSourceModal').setAttribute('action', url);

        // Clear any existing hidden inputs
        document.querySelectorAll('#formSourceModal input[type="hidden"]').forEach(el => el.remove());

        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('name', '_token');
        csrfToken.setAttribute('value', document.querySelector('meta[name="csrf-token"]').content);
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const albumDelete = async (id, type_album) => {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            html: `Anda akan menghapus album <strong>${type_album}</strong>. Tindakan ini tidak dapat dibatalkan.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            backdrop: 'rgba(0,0,0,0.5)'
        }).then(async (result) => {
            if (result.isConfirmed) {
                try {
                    await axios.post(`/album/${id}`, {
                        '_method': 'DELETE',
                        '_token': document.querySelector('meta[name="csrf-token"]').content
                    });

                    Swal.fire(
                        'Terhapus!',
                        'Data album telah dihapus.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                } catch (error) {
                    Swal.fire(
                        'Error!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                    console.error(error);
                }
            }
        });
    }
</script>

<!-- Include SweetAlert if not already included -->
@if (!isset($noSweetAlert))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endif
