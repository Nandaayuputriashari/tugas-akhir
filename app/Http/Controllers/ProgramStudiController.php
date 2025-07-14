<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProgramStudi::all();
        return view('program_studi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('program_studi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'jenjang' => 'required|string',
            'upps' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'telp' => 'required|string',
            'sk_pembukaan' => 'required|string',
            'tgl_sk' => 'required|date',
            'thn_pembukaan' => 'required|numeric|digits:4',
            'peringkat_terbaru' => 'required|string',
            'sk_ban_pt' => 'required|string',
        ]);

        ProgramStudi::create($request->all());

        return redirect()->route('program-studi.index')->with('success', 'Program Studi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramStudi $programStudi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramStudi $programStudi)
    {
        return view('program_studi.edit', compact('programStudi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramStudi $programStudi)
    {
        $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'jenjang' => 'required|string',
            'upps' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'telp' => 'required|string',
            'sk_pembukaan' => 'required|string',
            'tgl_sk' => 'required|date',
            'thn_pembukaan' => 'required|numeric|digits:4',
            'peringkat_terbaru' => 'required|string',
            'sk_ban_pt' => 'required|string',
        ]);

        $programStudi->update($request->all());

        return redirect()->route('program-studi.index')->with('success', 'Program Studi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramStudi $programStudi)
    {
        $programStudi->delete();
        return redirect()->route('program-studi.index')->with('success', 'Program Studi berhasil dihapus.');
    }
}
