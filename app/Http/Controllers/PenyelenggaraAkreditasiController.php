<?php

namespace App\Http\Controllers;

use App\Models\PenyelenggaraAkreditasi;
use Illuminate\Http\Request;

class PenyelenggaraAkreditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PenyelenggaraAkreditasi::latest()->get();
        return view('penyelenggara_akreditasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyelenggara_akreditasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penyelenggara' => 'required|string|max:255',
        ]);
        PenyelenggaraAkreditasi::create($request->all());
        return redirect()->route('penyelenggara-akreditasi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenyelenggaraAkreditasi $penyelenggaraAkreditasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenyelenggaraAkreditasi $penyelenggaraAkreditasi)
    {
        return view('penyelenggara_akreditasi.edit', compact('penyelenggaraAkreditasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenyelenggaraAkreditasi $penyelenggaraAkreditasi)
    {
        $request->validate([
            'nama_penyelenggara' => 'required|string|max:255',
        ]);
        $penyelenggaraAkreditasi->update($request->all());
        return redirect()->route('penyelenggara-akreditasi.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenyelenggaraAkreditasi $penyelenggaraAkreditasi)
    {
        $penyelenggaraAkreditasi->delete();
        return redirect()->route('penyelenggara-akreditasi.index')->with('success', 'Data berhasil dihapus!');
    }
}
