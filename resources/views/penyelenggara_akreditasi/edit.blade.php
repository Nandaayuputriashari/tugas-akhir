@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Edit Penyelenggara Akreditasi</h1>
<form method="POST" action="{{ route('penyelenggara-akreditasi.update', $penyelenggaraAkreditasi->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama Penyelenggara</label>
        <input type="text" name="nama_penyelenggara" class="form-control" value="{{ old('nama_penyelenggara', $penyelenggaraAkreditasi->nama_penyelenggara) }}" required>
        @error('nama_penyelenggara')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('penyelenggara-akreditasi.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
