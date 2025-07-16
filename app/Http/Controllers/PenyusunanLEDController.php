<?php

namespace App\Http\Controllers;

use App\Models\PenyusunanLED;
use App\Models\PeriodeAkreditasi;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PenyusunanLEDController extends Controller
{
    public function input(Request $request)
    {
        $kriteria = Kriteria::findOrFail($request->kriteria_id);
        $periode = PeriodeAkreditasi::findOrFail($request->periode_akreditasi_id);
        $penyusunan = PenyusunanLED::where('kriteria_id', $kriteria->id)
            ->where('periode_akreditasi_id', $periode->id)
            ->first();
        return view('penyusunan_led.form', compact('kriteria', 'periode', 'penyusunan'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $periodeId = $request->periode_akreditasi_id;
        $periode = PeriodeAkreditasi::findOrFail($periodeId);
        $instrumenId = $periode->instrumen_akreditasi_id;
        $kriteriaList = Kriteria::where('instrumen_akreditasi_id', $instrumenId)->get();
        // Ambil data penyusunan LED yang sudah ada
        $penyusunan = PenyusunanLED::where('periode_akreditasi_id', $periodeId)->get()->keyBy('kriteria_id');
        return view('penyusunan_led.index', compact('periode', 'kriteriaList', 'penyusunan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $kriteria = Kriteria::findOrFail($request->kriteria_id);
        $periode = PeriodeAkreditasi::findOrFail($request->periode_akreditasi_id);
        $penyusunan = null;
        return view('penyusunan_led.form', compact('kriteria', 'periode', 'penyusunan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'periode_akreditasi_id' => 'required|exists:periode_akreditasis,id',
            'isi' => 'required|string',
        ]);

        $penyusunan = PenyusunanLED::updateOrCreate(
            [
                'kriteria_id' => $validated['kriteria_id'],
                'periode_akreditasi_id' => $validated['periode_akreditasi_id'],
            ],
            [
                'isi' => $validated['isi'],
                'status' => 'Tersimpan',
            ]
        );

        return redirect()->route('penyusunan_led.index', ['periode_akreditasi_id' => $validated['periode_akreditasi_id']])
            ->with('success', 'LED berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenyusunanLED $penyusunanLED)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenyusunanLED $penyusunanLED)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenyusunanLED $penyusunanLED)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenyusunanLED $penyusunanLED)
    {
        //
    }
}
