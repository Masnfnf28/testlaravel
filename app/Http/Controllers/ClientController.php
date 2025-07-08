<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Tampilkan daftar client.
     */
    public function index()
    {
        try {
            $clients = Client::paginate(6);
            return view('page.client.index', compact('clients'));
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Tampilkan form tambah client (tidak digunakan).
     */
    public function create()
    {
        //
    }

    /**
     * Simpan data client baru.
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'pengantinpria' => $request->input('pengantinpria'),
                'pengantinwanita' => $request->input('pengantinwanita'),
                'alamat' => $request->input('alamat'),
                'notelp' => $request->input('notelp'),
            ];

            Client::create($data);

            return redirect()
                ->route('client.index')
                ->with('message_insert', 'Data client berhasil ditambahkan.');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Tampilkan detail client (tidak digunakan).
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Tampilkan form edit client (tidak digunakan).
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update data client.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = [
                'pengantinpria' => $request->input('pengantinpria'),
                'pengantinwanita' => $request->input('pengantinwanita'),
                'alamat' => $request->input('alamat'),
                'notelp' => $request->input('notelp'),
            ];

            $client = Client::findOrFail($id);
            $client->update($data);

            return back()->with('message_update', 'Data client berhasil diperbarui.');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Hapus data client.
     */
    public function destroy(string $id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();

            return back()->with('message_delete', 'Data client berhasil dihapus.');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
