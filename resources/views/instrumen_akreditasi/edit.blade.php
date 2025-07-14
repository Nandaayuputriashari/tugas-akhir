@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Edit Instrumen Akreditasi</h1>
<form method="POST" action="{{ route('instrumen-akreditasi.update', $instrumenAkreditasi->id) }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="penyelenggara_akreditasi_id" value="{{ $penyelenggara->id }}">
    <div class="form-group">
        <label>Nomor</label>
        <input type="text" name="nomor" class="form-control" value="{{ old('nomor', $instrumenAkreditasi->nomor) }}" required>
        @error('nomor')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Nama Instrumen</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $instrumenAkreditasi->nama) }}" required>
        @error('nama')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('instrumen-akreditasi.index', ['penyelenggara_akreditasi_id' => $penyelenggara->id]) }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
