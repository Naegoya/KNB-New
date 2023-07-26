<?php

namespace App\Http\Controllers;

use App\Models\FotoProgresan;
use Illuminate\Http\Request;

class FotoProgresanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foto_progresan = FotoProgresan::get();

        return view('foto_progresan.index', ['data' => $foto_progresan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        return view('foto_progresan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {
        $image = '';
        if ($request->file('image')) {
            $image = $request->file('image')->store('images', 'public');
        }

        FotoProgresan::create([
            'id_photo' => $request->input('id_photo'),
            'foto_progresan' => $image,
            'tanggal_update' => $request->input('tanggal_update'),
            'waktu_update' => $request->input('waktu_update'),
        ]);
    
        return redirect()->route('foto_progresan');
    }

    /**
     * Display the specified resource.
     */
    public function show(FotoProgresan $fotoProgresan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $foto_progresan = FotoProgresan::find($id);

        return view('foto_progresan.form', ['foto_progresan' => $foto_progresan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $image = '';
        if ($request->file('image')) {
            $image = $request->file('image')->store('images', 'public');
        }
        FotoProgresan::find($id)->update([
            'id_photo' => $request->input('id_photo'),
            'foto_progresan' => $image,
            'tanggal_update' => $request->input('tanggal_update'),
            'waktu_update' => $request->input('waktu_update'),
        ]);
        
        return redirect()->route('foto_progresan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus($id)
    {
        //try {
        $foto_progresan = FotoProgresan::find($id);

        // cek apakah kereta memiliki relasi dengan gerbong
        // if ($jenis_pencuci->transaksi()->exists()) {
        //     throw new GlobalException("Tidak dapat menghapus jenis pencuci yang masih memiliki transaksi terkait.");
        // }

        $foto_progresan->delete();

        return redirect()->route('foto_progresan')->with('success', 'Data berhasil dihapus');
        // } catch (FFIException $e) {
        //     return redirect()->back()->withErrors([$e->getMessage()]);
        // }
    }
    public function destroy(FotoProgresan $fotoProgresan)
    {
        //
    }
}
