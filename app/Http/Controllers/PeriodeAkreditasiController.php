<?php

namespace App\Http\Controllers;

use App\Models\PeriodeAkreditasi;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Models\PenyelenggaraAkreditasi;
use App\Models\InstrumenAkreditasi;

class PeriodeAkreditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PeriodeAkreditasi::with('programStudi');
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($sub) use ($q) {
                $sub->whereHas('programStudi', function($ps) use ($q) {
                        $ps->where('nama_prodi', 'like', "%$q%")
                           ->orWhere('id', 'like', "%$q%") ;
                    })
                    ->orWhere('periode', 'like', "%$q%")
                    ->orWhere('status', 'like', "%$q%") ;
            });
        }
        $data = $query->latest()->get();
        return view('periode_akreditasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programStudi = ProgramStudi::all();
        $penyelenggara = PenyelenggaraAkreditasi::all();
        $instrumen = InstrumenAkreditasi::all();
        $periodeAkreditasi = PeriodeAkreditasi::with('programStudi')->get();
        return view('periode_akreditasi.create', compact('programStudi', 'penyelenggara', 'instrumen', 'periodeAkreditasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_studi_id' => 'required|exists:program_studis,id',
            'periode' => 'required|string',
            'status' => 'required|string',
        ]);

        PeriodeAkreditasi::create($request->all());

        return redirect()->route('periode-akreditasi.index')->with('success', 'Data periode akreditasi berhasil ditambahkan.');
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
    public function edit(PeriodeAkreditasi $periodeAkreditasi)
    {
        $programStudi = ProgramStudi::all();
        $penyelenggara = PenyelenggaraAkreditasi::all();
        return view('periode_akreditasi.edit', compact('periodeAkreditasi', 'programStudi', 'penyelenggara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeriodeAkreditasi $periodeAkreditasi)
    {
        $request->validate([
            'program_studi_id' => 'required|exists:program_studis,id',
            'periode' => 'required|string',
            'status' => 'required|string',
        ]);

        $periodeAkreditasi->update($request->all());

        return redirect()->route('periode-akreditasi.index')->with('success', 'Data periode akreditasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeriodeAkreditasi $periodeAkreditasi)
    {
        $periodeAkreditasi->delete();
        return redirect()->route('periode-akreditasi.index')->with('success', 'Data periode akreditasi berhasil dihapus.');
    }
}
