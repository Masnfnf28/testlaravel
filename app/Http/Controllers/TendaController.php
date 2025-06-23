<?php

namespace App\Http\Controllers;

use App\Models\Tenda;
use Illuminate\Http\Request;

class TendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tenda = Tenda::paginate(5);
            return view('page.tenda.index')->with([
                'tenda' => $tenda,
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
                'uk_tenda' => $request->input('uk_tenda'),
                'harga_tenda' => $request->input('harga_tenda'),
            ];
            Tenda::create($data);

            return redirect()
                ->route('tenda.index')
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
    public function show(string $id)
    {
        //
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
                'uk_tenda' => $request->input('uk_tenda'),
                'harga_tenda' => $request->input('harga_tenda'),
            ];


            $datas = Tenda::findOrFail($id);
            $datas->update($data);
            return redirect()
                ->route('tenda.index')
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
            $data = Tenda::findOrFail($id);
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
