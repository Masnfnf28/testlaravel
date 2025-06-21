<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
            {{ __('CLIENT') }}
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-5">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/3 p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        FORM INPUT CLIENT
                    </div>
                    <div>
                        <form class="max-w-sm mx-auto" method="POST" action="{{ route('client.store') }}">
                            @csrf
                            <div class="mb-5">
                                <label for="pengantinpria"
                                    class="block mb-2 text-sm font-medium text-black-900 dark:text-white">Nama
                                    Pengantin Pria</label>
                                <input type="text" name="pengantinpria"
                                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Masukkan Nama Pengantin Pria" />
                            </div>
                            <div class="mb-5">
                                <label for="pengantinwanita"
                                    class="block mb-2 text-sm font-medium text-black-900 dark:text-white">Nama
                                    Pengantin Wanita</label>
                                <input type="text" name="pengantinwanita"
                                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Masukkan Nama Pengantin Wanita" />
                            </div>
                            <div class="mb-5">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-black-900 dark:text-white">Alamat</label>
                                <textarea type="text" name="alamat"
                                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Alamat"> </textarea>
                            </div>
                            <div class="mb-5">
                                <label for="notelp"
                                    class="block mb-2 text-sm font-medium text-black-900 dark:text-white">No Telp
                                </label>
                                <input type="number" name="notelp"
                                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Masukkan No Telepon" />
                            </div>
                            <div class="mb-5">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-black-900 dark:text-white">Email
                                </label>
                                <input type="email" name="email"
                                    class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Masukkan Email" />
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold text-center">
                        DATA CLIENT
                    </div>
                    <div>
                        <div class="relative rounded-xl overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-black-500 dark:text-black-400">
                                <thead
                                    class="text-xs text-black-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-black-400 text-center">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            PENGANTIN PRIA
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            PENGANTIN WANITA
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            ALAMAT
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            NO TELEPON
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($clients as $index => $client)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-4"
                                            align="center">
                                            <th scope="row"
                                                class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ ($clients->currentPage() - 1) * $clients->perPage() + $loop->iteration }}
                                            </th>
                                            <td class="px-5 py-3">
                                                {{ $client->pengantinpria }}
                                            </td>
                                            <td class="px-5 py-3">
                                                {{ $client->pengantinwanita }}
                                            </td>
                                            <td class="px-5 py-3">
                                                {{ $client->alamat }}
                                            </td>
                                            <td class="px-5 py-3">
                                                {{ $client->notelp }}
                                            </td>
                                            <td class="px-5 py-3">
                                                <button type="button"
                                                    class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                                    onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                    data-id="{{ $client->id }}"
                                                    data-pengantinpria="{{ $client->pengantinpria }}"
                                                    data-pengantinwanita="{{ $client->pengantinwanita }}"
                                                    data-alamat="{{ $client->alamat }}"
                                                    data-notelp="{{ $client->notelp }}">
                                                    <i class="fi fi-sr-file-edit"></i>
                                                </button>
                                                <button
                                                    class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                    onclick="return clientDelete('{{ $client->id }}','{{ $client->pengantinpria }}','{{ $client->pengantinwanita }}')">
                                                    <i class="fi fi-sr-delete-document"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $clients->Links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Client
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal" action="{{ route('client.update', $client->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengantin
                                Pria</label>
                            <input type="text" id="pengantinpria" name="pengantinpria"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama disini...">
                        </div>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengantin
                                Wanita</label>
                            <input type="text" id="pengantinwanita" name="pengantinwanita"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama disini...">
                        </div>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                            <input type="text" id="alamat" name="alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Alamat disini...">
                        </div>
                        <div class="">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">No
                                Telepon</label>
                            <input type="text" id="notelp" name="notelp"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan No Telepon disini...">
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
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
        const pengantinpria = button.dataset.pengantinpria;
        const pengantinwanita = button.dataset.pengantinwanita;
        const notelp = button.dataset.notelp;
        const alamat = button.dataset.alamat;

        let url = "{{ route('client.update', ':id') }}".replace(':id', id);
        console.log(url);

        const form = document.getElementById('formSourceModal');
        form.action = `/client/${id}`; // Ganti clientId dengan ID sebenarnya


        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `Update Konsumen ${pengantinpria}`;
        document.getElementById('pengantinpria').value = pengantinpria;
        document.getElementById('pengantinwanita').value = pengantinwanita;
        document.getElementById('notelp').value = notelp;
        document.getElementById('alamat').value = alamat;

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }
</script>
