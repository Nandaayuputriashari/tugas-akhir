<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\InstrumenAkreditasi;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$request->filled('instrumen_akreditasi_id')) {
            return redirect()->route('instrumen-akreditasi.index')->with('error', 'Pilih instrumen akreditasi terlebih dahulu.');
        }
        $query = Kriteria::with('parent');
        if ($request->filled('instrumen_akreditasi_id')) {
            $query->where('instrumen_akreditasi_id', $request->instrumen_akreditasi_id);
        }
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($sub) use ($q) {
                $sub->where('no_kriteria', 'like', "%$q%")
                    ->orWhere('nama_kriteria', 'like', "%$q%")
                    ->orWhere('deskripsi_kriteria', 'like', "%$q%")
                    ->orWhereHas('parent', function($p) use ($q) {
                        $p->where('nama_kriteria', 'like', "%$q%") ;
                    });
            });
        }
        $data = $query->orderByRaw('LENGTH(no_kriteria), no_kriteria')->get();
        $instrumen_akreditasi_id = $request->instrumen_akreditasi_id;
        return view('kriteria.index', compact('data', 'instrumen_akreditasi_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $parentOptions = Kriteria::all();
        $instrumen_akreditasi_id=$request->instrumen_akreditasi_id;
        //$instrumenOptions = InstrumenAkreditasi::all();
       // echo $instrumen_akreditasi_id;
        return view('kriteria.create', compact('parentOptions', 'instrumen_akreditasi_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
    'no_kriteria' => 'required|string',
    'nama_kriteria' => 'required|string',
    'deskripsi_kriteria' => 'nullable|string',
    'parent_kriteria' => 'nullable|exists:kriterias,id',
    'instrumen_akreditasi_id' => 'required|exists:instrumen_akreditasis,id',
]);
//echo $request->instrumen_akreditasi_id;
        $kriteria = Kriteria::create($request->all());
        return redirect()->route('kriteria.index', ['instrumen_akreditasi_id' => $kriteria->instrumen_akreditasi_id])->with('success', 'Kriteria berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        $parentOptions = Kriteria::where('id', '!=', $kriteria->id)->get();
        $instrumenOptions = \App\Models\InstrumenAkreditasi::all();
        return view('kriteria.edit', compact('kriteria', 'parentOptions', 'instrumenOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'no_kriteria' => 'required|string',
            'nama_kriteria' => 'required|string',
            'deskripsi_kriteria' => 'nullable|string',
            'parent_kriteria' => 'nullable|exists:kriterias,id',
            'instrumen_akreditasi_id' => 'required|exists:instrumen_akreditasis,id',

        ]);

        $kriteria->update($request->all());
        return redirect()->route('kriteria.index', ['instrumen_akreditasi_id' => $kriteria->instrumen_akreditasi_id])->with('success', 'Kriteria berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
