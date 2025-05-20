<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakits = Penyakit::all();
    
        $lastPenyakit = Penyakit::orderBy('id', 'desc')->first();
        $lastId = $lastPenyakit ? (int) substr($lastPenyakit->kode, 1) : 0;
        
        $newId = $lastId + 1;
    
        return view('admin.penyakit.index', compact('penyakits', 'newId'));
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
        // Validasi input dari form
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'solusi' => 'required'
        ]);
    
        // Mendapatkan kode penyakit terakhir
        $lastPenyakit = Penyakit::orderBy('id', 'desc')->first();
        $lastId = $lastPenyakit ? (int) substr($lastPenyakit->kode, 1) : 0; // Ambil ID terakhir dari kode (P01, P02, dst.)
    
        $newId = $lastId + 1; // Menambahkan ID untuk penyakit baru
        $newKode = 'P' . $newId; // Membuat kode penyakit baru
    
        // Menyimpan penyakit baru
        $penyakit = new Penyakit();
        $penyakit->kode = $newKode;  // Assign kode otomatis
        $penyakit->nama = $request->nama;
        $penyakit->deskripsi = $request->deskripsi;
        $penyakit->solusi = $request->solusi;
        $penyakit->save();
    
        // Redirect ke halaman daftar penyakit dengan pesan sukses
        return redirect()->route('penyakit.index')
            ->with('success', 'Penyakit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyakit $penyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'solusi' => 'required'
        ]);

        $penyakit = Penyakit::find($id);

        if (!$penyakit) {
            return redirect()->route('penyakit.index')
                ->with('error', 'Penyakit not found.');
        }

        $penyakit->update($request->all());

        return redirect()->route('penyakit.index')
            ->with('success', 'Penyakit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $penyakit = Penyakit::find($id);
        $penyakit->delete();

        return redirect()->route('penyakit.index')
            ->with('success', 'Penyakit deleted successfully.');
    }
}
