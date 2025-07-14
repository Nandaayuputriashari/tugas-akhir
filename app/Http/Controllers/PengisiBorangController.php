<?php

namespace App\Http\Controllers;

use App\Models\PengisiBorang;
use App\Models\PeriodeAkreditasi;
use App\Models\Karyawan;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class PengisiBorangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PengisiBorang::with([
        'periodeAkreditasi.programStudi', // relasi berjenjang
        'karyawan',
        'kriteria'
    ]);

    if ($request->has('periode_akreditasi_id')) {
        $query->where('periode_akreditasi_id', $request->periode_akreditasi_id);
    }

    $data = $query->get();

    return view('pengisi_borang.index', compact('data'));    
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Jika ada periode_akreditasi_id, ambil data periode dan prodi terkait saja
        if ($request->has('periode_akreditasi_id')) {
            $periode = PeriodeAkreditasi::with('programStudi')->findOrFail($request->periode_akreditasi_id);
            $karyawan = Karyawan::all();
            $kriteria = Kriteria::where('instrumen_akreditasi_id', $periode->instrumen_akreditasi_id)->get();
        
            return view('pengisi_borang.create', [
                'periode' => $periode,
                'karyawan' => $karyawan,
                'kriteria' => $kriteria,
            ]);
        } 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'periode_akreditasi_id' => 'required|exists:periode_akreditasis,id',
            'karyawan_id' => 'required|exists:karyawans,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'jabatan' => 'required|string|max:255',
        ]);

        PengisiBorang::create($request->all());

        // Redirect ke tabel pengisi borang dengan filter periode_akreditasi_id
        return redirect()->route('pengisi-borang.index', ['periode_akreditasi_id' => $request->periode_akreditasi_id])
            ->with('success', 'Pengisi Borang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengisiBorang $pengisiBorang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengisiBorang = PengisiBorang::findOrFail($id);
    $periodeAkreditasi = PeriodeAkreditasi::with('programStudi')->get();
    $karyawan = Karyawan::all();
    $kriteria = Kriteria::all();
    return view('pengisi_borang.edit', compact('pengisiBorang', 'periodeAkreditasi', 'karyawan', 'kriteria'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengisiBorang $pengisiBorang)
    {
        $request->validate([
            'periode_akreditasi_id' => 'required|exists:periode_akreditasis,id',
            'karyawan_id' => 'required|exists:karyawans,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'jabatan' => 'required|string|max:255',
        ]);

        $pengisiBorang->update($request->all());

        return redirect()->route('pengisi-borang.index')->with('success', 'Pengisi Borang berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengisiBorang $pengisiBorang)
    {
        $pengisiBorang->delete();
        return redirect()->route('pengisi-borang.index')->with('success', 'Pengisi Borang berhasil dihapus.');

    }


}

