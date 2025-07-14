<?php

namespace App\Http\Controllers;

use App\Models\InstrumenAkreditasi;
use App\Models\PenyelenggaraAkreditasi;
use Illuminate\Http\Request;

class InstrumenAkreditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $penyelenggaraId = $request->penyelenggara_akreditasi_id;
        $data = InstrumenAkreditasi::with('penyelenggaraAkreditasi')
            ->when($penyelenggaraId, function($q) use ($penyelenggaraId) {
                $q->where('penyelenggara_akreditasi_id', $penyelenggaraId);
            })
            ->latest()->get();
        return view('instrumen_akreditasi.index', compact('data', 'penyelenggaraId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $penyelenggaraId = $request->penyelenggara_akreditasi_id;
        $penyelenggara = PenyelenggaraAkreditasi::findOrFail($penyelenggaraId);
        return view('instrumen_akreditasi.create', compact('penyelenggara'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required',
            'nama' => 'required',
            'penyelenggara_akreditasi_id' => 'required|exists:penyelenggara_akreditasis,id',
        ]);
        InstrumenAkreditasi::create($request->all());
        return redirect()->route('instrumen-akreditasi.index', ['penyelenggara_akreditasi_id' => $request->penyelenggara_akreditasi_id])->with('success', 'Instrumen berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(InstrumenAkreditasi $instrumenAkreditasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstrumenAkreditasi $instrumenAkreditasi)
    {
        $penyelenggara = $instrumenAkreditasi->penyelenggaraAkreditasi;
        return view('instrumen_akreditasi.edit', compact('instrumenAkreditasi', 'penyelenggara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstrumenAkreditasi $instrumenAkreditasi)
    {
        $request->validate([
            'nomor' => 'required',
            'nama' => 'required',
        ]);
        $instrumenAkreditasi->update($request->all());
        return redirect()->route('instrumen-akreditasi.index', ['penyelenggara_akreditasi_id' => $instrumenAkreditasi->penyelenggara_akreditasi_id])->with('success', 'Instrumen berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstrumenAkreditasi $instrumenAkreditasi)
    {
        $penyelenggaraId = $instrumenAkreditasi->penyelenggara_akreditasi_id;
        $instrumenAkreditasi->delete();
        return redirect()->route('instrumen-akreditasi.index', ['penyelenggara_akreditasi_id' => $penyelenggaraId])->with('success', 'Instrumen berhasil dihapus!');
    }
}
