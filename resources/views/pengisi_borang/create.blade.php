@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Tambah Pengisi Borang</h1>

<form method="POST" action="{{ route('pengisi-borang.store') }}">
    @csrf

    @if(isset($periode))
        <input type="hidden" name="periode_akreditasi_id" value="{{ $periode->id }}">
        <div class="form-group">
            <label>Program Studi</label>
            <input type="text" class="form-control" value="{{ $periode->programStudi->nama_prodi }}" readonly>
        </div>
        <div class="form-group">
            <label>Periode Akreditasi</label>
            <input type="text" class="form-control" value="{{ $periode->periode }}" readonly>
        </div>
    @else
        <div class="form-group">
            <label>Periode Akreditasi</label>
            <select name="periode_akreditasi_id" class="form-control" required>
                <option value="">-- Pilih Periode Akreditasi --</option>
                @foreach($periodeAkreditasi as $item)
                <option value="{{ $item->id }}" {{ old('periode_akreditasi_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->periode }} - {{ $item->programStudi->nama_prodi }}
                </option>
                @endforeach
            </select>
        </div>
    @endif

    <div class="form-group">
        <label>Karyawan</label>
        <select name="karyawan_id" class="form-control" required>
            <option value="">-- Pilih Karyawan --</option>
            @foreach($karyawan as $k)
            <option value="{{ $k->id }}" {{ old('karyawan_id') == $k->id ? 'selected' : '' }}>
                {{ $k->nama }} (NIDN: {{ $k->nidn }} / NITK: {{ $k->nitk }})
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Kriteria</label>
        <select name="kriteria_id" class="form-control" required>
            <option value="">-- Pilih Kriteria --</option>
            @foreach($kriteria as $k)
            <option value="{{ $k->id }}" {{ old('kriteria_id') == $k->id ? 'selected' : '' }}>
                {{ $k->no_kriteria ? $k->no_kriteria . ' - ' : '' }}{{ $k->nama_kriteria }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('pengisi-borang.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
