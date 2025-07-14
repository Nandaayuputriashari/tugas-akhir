<?php

namespace App\Http\Controllers;

use App\Models\PenyusunanLED;
use App\Models\PeriodeAkreditasi;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PenyusunanLEDController extends Controller
{
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
