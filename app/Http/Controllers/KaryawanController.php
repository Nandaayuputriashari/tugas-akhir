<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Karyawan::query();
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($sub) use ($q) {
                $sub->where('nama', 'like', "%$q%")
                    ->orWhere('nidn', 'like', "%$q%")
                    ->orWhere('nitk', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%")
                    ->orWhere('alamat', 'like', "%$q%") ;
            });
        }
        $karyawans = $query->latest()->get();
        return view('karyawan.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required|string|max:255',
        'nidn' => 'nullable|string|unique:karyawans,nidn',
        'nitk' => 'nullable|string|unique:karyawans,nitk',
        'alamat' => 'nullable|string',
        'email' => 'nullable|email',
    ]);

    Karyawan::create($request->all());

    return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
         $request->validate([
        'nama' => 'required|string|max:255',
        'nidn' => 'nullable|string|unique:karyawans,nidn,' . $karyawan->id,
        'nitk' => 'nullable|string|unique:karyawans,nitk,' . $karyawan->id,
        'alamat' => 'nullable|string',
        'email' => 'nullable|email',
    ]);

    $karyawan->update($request->all());

    return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
