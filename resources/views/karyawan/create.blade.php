@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Tambah Karyawan</h1>

<form method="POST" action="{{ route('karyawan.store') }}">
    @csrf

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
    </div>

    <div class="form-group">
        <label>NIDN</label>
        <input type="text" name="nidn" value="{{ old('nidn', $karyawan->nidn ?? '') }}" class="form-control @error('nidn') is-invalid @enderror">
        @error('nidn')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>NITK</label>
        <input type="text" name="nitk" value="{{ old('nitk', $karyawan->nitk ?? '') }}" class="form-control @error('nitk') is-invalid @enderror">
        @error('nitk')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror   
     </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
