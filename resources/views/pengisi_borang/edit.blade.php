@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Edit Pengisi Borang</h1>

<form method="POST" action="{{ route('pengisi-borang.update', $pengisiBorang->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Periode Akreditasi</label>
        <select name="periode_akreditasi_id" class="form-control" required>
            @foreach($periodeAkreditasi as $item)
            <option value="{{ $item->id }}" {{ $pengisiBorang->periode_akreditasi_id == $item->id ? 'selected' : '' }}>
                {{ $item->periode }} - {{ $item->programStudi->nama_prodi }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Karyawan</label>
        <select name="karyawan_id" class="form-control" required>
            @foreach($karyawan as $k)
            <option value="{{ $k->id }}" {{ $pengisiBorang->karyawan_id == $k->id ? 'selected' : '' }}>
                {{ $k->nama }} ({{ $k->nidn }} / {{ $k->nitk }})
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Kriteria</label>
        <select name="kriteria_id" class="form-control" required>
            @foreach($kriteria as $k)
            <option value="{{ $k->id }}" {{ $pengisiBorang->kriteria_id == $k->id ? 'selected' : '' }}>
                {{ $k->nama_kriteria }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{ $pengisiBorang->jabatan }}" required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('pengisi-borang.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
