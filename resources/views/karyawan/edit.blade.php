@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Edit Karyawan</h1>

<form method="POST" action="{{ route('karyawan.update', $karyawan) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $karyawan->nama) }}" required>
    </div>

    <div class="form-group">
        <label>NIDN</label>
        <input type="text" name="nidn" class="form-control" value="{{ old('nidn', $karyawan->nidn) }}">
    </div>

    <div class="form-group">
        <label>NITK</label>
        <input type="text" name="nitk" class="form-control" value="{{ old('nitk', $karyawan->nitk) }}">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $karyawan->email) }}" required>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control">{{ old('alamat', $karyawan->alamat) }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
