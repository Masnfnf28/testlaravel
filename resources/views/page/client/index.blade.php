<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CLIENT') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex flex-col lg:flex-row">
                <!-- FORM INPUT CLIENT -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg w-full lg:w-1/3 p-4">
                    <div class="bg-gray-100 mb-4 p-3 rounded-xl font-bold">
                        FORM INPUT CLIENT
                    </div>
                    <form method="POST" action="{{ route('client.store') }}">
                        @csrf
                        <x-input-field name="pengantinpria" label="Nama Pengantin Pria" required />
                        <x-input-field name="pengantinwanita" label="Nama Pengantin Wanita" required />
                        <x-textarea-field name="alamat" label="Alamat" required />
                        <x-input-field name="notelp" label="No Telepon" type="number" required />

                        <x-button type="submit" class="bg-blue-700 hover:bg-blue-800">Submit</x-button>
                    </form>
                </div>

                <!-- TABEL DATA CLIENT -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg w-full p-4">
                    <div class="bg-gray-100 mb-4 p-3 rounded-xl font-bold text-center">
                        DATA CLIENT
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-gray-700 dark:text-gray-300 text-center">
                            <thead class="text-xs bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th>NO</th>
                                    <th>PENGANTIN PRIA</th>
                                    <th>PENGANTIN WANITA</th>
                                    <th>ALAMAT</th>
                                    <th>NO TELEPON</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $index => $client)
                                    <tr class="border-b dark:border-gray-600">
                                        <td>{{ ($clients->currentPage() - 1) * $clients->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $client->pengantinpria }}</td>
                                        <td>{{ $client->pengantinwanita }}</td>
                                        <td>{{ $client->alamat }}</td>
                                        <td>{{ $client->notelp }}</td>
                                        <td>
                                            <button onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                data-id="{{ $client->id }}"
                                                data-pengantinpria="{{ $client->pengantinpria }}"
                                                data-pengantinwanita="{{ $client->pengantinwanita }}"
                                                data-alamat="{{ $client->alamat }}"
                                                data-notelp="{{ $client->notelp }}"
                                                class="bg-amber-400 text-white p-2 rounded hover:bg-amber-500">
                                                Edit
                                            </button>
                                            <button
                                                onclick="clientDelete('{{ $client->id }}', '{{ $client->pengantinpria }}', '{{ $client->pengantinwanita }}')"
                                                class="bg-red-500 text-white p-2 rounded hover:bg-red-600">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT CLIENT -->
    <div id="sourceModal" class="fixed inset-0 hidden items-center justify-center z-50">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="relative w-full md:w-1/2 bg-white rounded-lg shadow p-6 mx-auto z-50">
            <h3 class="text-lg font-semibold mb-4" id="title_source">Edit Client</h3>
            <form method="POST" id="formSourceModal">
                @csrf
                @method('PUT')
                <x-input-field id="pengantinpria" name="pengantinpria" label="Nama Pengantin Pria" required />
                <x-input-field id="pengantinwanita" name="pengantinwanita" label="Nama Pengantin Wanita" required />
                <x-input-field id="alamat" name="alamat" label="Alamat" required />
                <x-input-field id="notelp" name="notelp" label="No Telepon" type="number" required />
                <div class="flex justify-end space-x-3 mt-4">
                    <button type="submit" id="formSourceButton"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    const editSourceModal = (button) => {
        const id = button.dataset.id;
        const url = `{{ url('client') }}/${id}`;
        const form = document.getElementById('formSourceModal');

        form.setAttribute('action', url);
        document.getElementById('pengantinpria').value = button.dataset.pengantinpria;
        document.getElementById('pengantinwanita').value = button.dataset.pengantinwanita;
        document.getElementById('alamat').value = button.dataset.alamat;
        document.getElementById('notelp').value = button.dataset.notelp;
        document.getElementById('sourceModal').classList.remove('hidden');
    };

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        document.getElementById(modalTarget).classList.add('hidden');
    };

    const clientDelete = async (id, pria, wanita) => {
        if (confirm(`Hapus client ${pria} & ${wanita}?`)) {
            await axios.post(`/client/${id}`, {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                }).then(() => location.reload())
                .catch(() => alert('Gagal menghapus'));
        }
    }
</script>
