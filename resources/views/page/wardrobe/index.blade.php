<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Wardrobe Management') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="relative w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search Wardrobe..."
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
                        <i class="fas fa-plus-circle mr-2"></i> FORM INPUT WARDROBE
                    </div>
                    <div class="p-6">
                        <form method="POST" action="{{ route('wardrobe.store') }}" class="space-y-4">
                            @csrf
                            <div>
                                <label for="type_wardrobe"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Type Wardrobe <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="type_wardrobe" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                    placeholder="Masukkan Type Wardrobe">
                            </div>

                            <div>
                                <label for="deskripsi"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Deskripsi <span class="text-red-500">*</span>
                                </label>
                                <textarea type="text" name="deskripsi" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                    placeholder="Deskripsi"></textarea>
                            </div>

                            <div>
                                <label for="harga_wardrobe"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Harga Wardrobe <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="harga_wardrobe" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                    placeholder="Masukkan Harga Wardrobe">
                            </div>

                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-[1.01] shadow-md">
                                    <i class="fas fa-save mr-2"></i> Simpan Wardrobe
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
                            <i class="fas fa-campground mr-2"></i> DATA WARDROBE
                        </div>
                        <div class="text-sm font-normal">
                            Total: {{ $wardrobe->total() }} Wardrobe
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs text-center font-medium uppercase tracking-wider rounded-tl-lg">
                                        No</th>
                                    <th class="px-6 py-3 text-left text-xs text-center font-medium uppercase tracking-wider">Type Wardrobe</th>
                                    <th class="px-6 py-3 text-left text-xs text-center font-medium uppercase tracking-wider">deskripsi
                                        </th>
                                    <th class="px-6 py-3 text-left text-xs text-center font-medium uppercase tracking-wider">Harga
                                        Wardrobe</th>
                                    <th
                                        class="px-6 py-3 text-right text-xs text-center font-medium uppercase tracking-wider rounded-tr-lg">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @php $no = 1; @endphp
                                @foreach ($wardrobe as $w)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm  text-center font-medium text-gray-900 dark:text-white">
                                            {{ ($wardrobe->currentPage() - 1) * $wardrobe->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900 dark:text-white">
                                            {{ $w->type_wardrobe }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900 dark:text-white">
                                            {{ $w->deskripsi }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900 dark:text-white">
                                            Rp {{ number_format($w->harga_wardrobe, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-center text-sm font-medium">
                                            <div class="flex justify-end space-x-2">
                                                <button onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                    data-id="{{ $w->id }}" 
                                                    data-type_wardrobe="{{ $w->type_wardrobe }}"
                                                    data-deskripsi="{{ $w->deskripsi }}"
                                                    data-harga_wardrobe="{{ $w->harga_wardrobe }}"
                                                    class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 p-2 rounded-full hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors duration-200">
                                                    <i class="fas fa-edit text-lg"></i>
                                                </button>
                                                <button
                                                    onclick="return wardrobeDelete('{{ $w->id }}','{{ $w->type_wardrobe }}')"
                                                    class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors duration-200">
                                                    <i class="fas fa-trash-alt text-lg"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div
                        class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 rounded-b-lg">
                        {{ $wardrobe->links() }}
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
                        <i class="fas fa-edit mr-2"></i> Update Wardrobe
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
                            <label for="type_wardrobe"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Type Wardrobe
                            </label>
                            <input type="text" id="type_wardrobe" name="type_wardrobe"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="Type Wardrobe">
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
                            <label for="harga_wardrobe"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Harga Wardrobe
                            </label>
                            <input type="number" id="harga_wardrobe" name="harga_wardrobe"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="Harga Wardrobe">
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
        const type_wardrobe = button.dataset.type_wardrobe;
        const deskripsi = button.dataset.deskripsi;
        const harga_wardrobe = button.dataset.harga_wardrobe;
        let url = "{{ route('wardrobe.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `Update ${type_wardrobe}`;

        document.getElementById('type_wardrobe').value = type_wardrobe;
        document.getElementById('deskripsi').value = deskripsi;
        document.getElementById('harga_wardrobe').value = harga_wardrobe;

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

    const wardrobeDelete = async (id, type_wardrobe) => {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            html: `Anda akan menghapus wardrobe <strong>${type_wardrobe}</strong>. Tindakan ini tidak dapat dibatalkan.`,
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
                    await axios.post(`/wardrobe/${id}`, {
                        '_method': 'DELETE',
                        '_token': document.querySelector('meta[name="csrf-token"]').content
                    });

                    Swal.fire(
                        'Terhapus!',
                        'Data Wardrobe telah dihapus.',
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
