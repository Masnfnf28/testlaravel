<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        try {
            $album = Album::paginate(6);
            return view('page.album.index')->with([
                'album' => $album,
            ]);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'type_album' => $request->input('type_album'),
                'deskripsi' => $request->input('deskripsi'),
                'harga_album' => $request->input('harga_album'),
            ];
            album::create($data);

            return redirect()
                ->route('album.index')
                ->with('message_insert', 'Data Album Sudah ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);
        return view('page.album.show', compact('album'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = [
                'type_album' => $request->input('type_album'),
                'deskripsi' => $request->input('deskripsi'),
                'harga_album' => $request->input('harga_album'),
            ];


            $datas = album::findOrFail($id);
            $datas->update($data);
            return redirect()
                ->route('album.index')
                ->with('message_insert', 'Data Album Sudah ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = album::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Customer Sudah dihapus');

            return redirect()
                ->route('tenda.index')
                ->with('message_insert', 'Data Album Sudah ditambahkan');
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " .
                addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
    }
}
