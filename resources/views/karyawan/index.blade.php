@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Data Karyawan</h1>

<a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">+ Tambah Karyawan</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="GET" action="" class="mb-3 d-flex justify-content-end">
    <div class="input-group" style="max-width:350px;">
        <input type="text" name="q" class="form-control" placeholder="Cari nama, NIDN, NITK, email..." value="{{ request('q') }}">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIDN</th>
            <th>NITK</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($karyawans as $karyawan)
        <tr>
            <td>{{ $karyawan->nama }}</td>
            <td>{{ $karyawan->nidn ?? '-' }}</td>
            <td>{{ $karyawan->nitk ?? '-' }}</td>
            <td>{{ $karyawan->email }}</td>
            <td>{{ $karyawan->alamat ?? '-' }}</td>
            <td>
                <a href="{{ route('karyawan.edit', $karyawan) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('karyawan.destroy', $karyawan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
