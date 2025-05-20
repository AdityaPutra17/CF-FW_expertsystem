<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Penyakit;

class AturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $aturans = Aturan::all();
        $gejalas = Gejala::all();
        $penyakits = Penyakit::all();
        
        return view('admin.aturan.index', compact('aturans', 'gejalas', 'penyakits'));
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
        //
        $request->validate([
            'gejala_id' => 'required',
            'penyakit_id' => 'required',
            'cf' => 'required|decimal:0,2',
        ]);

        Aturan::create($request->all());

        return redirect()->route('aturan.index')
            ->with('success', 'Aturan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aturan $aturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aturan $aturan)
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
            'gejala_id' => 'required',
            'penyakit_id' => 'required',
            'cf' => 'required|decimal:0,2'
        ]);

        $aturan = Aturan::find($id);

        if(!$aturan) {
            return redirect()->route('aturan.index')
                ->with('error', 'Aturan not found.');
        }

        $aturan->update($request->all());
        $aturan->save();

        return redirect()->route('aturan.index')
            ->with('success', 'Aturan updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $aturans = Aturan::find($id);
        $aturans->delete();

        return redirect()->route('aturan.index')
            ->with('success', 'Aturan deleted successfully.');
    }
}
