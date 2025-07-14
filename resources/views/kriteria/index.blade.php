@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Data Kriteria</h1>

<a href="{{ route('kriteria.create', ['instrumen_akreditasi_id' => $instrumen_akreditasi_id]) }}" class="btn btn-primary mb-3">+ Tambah Kriteria</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="GET" action="" class="mb-3 d-flex justify-content-end">
    <div class="input-group" style="max-width:350px;">
        <input type="text" name="q" class="form-control" placeholder="Cari kriteria, deskripsi, induk..." value="{{ request('q') }}">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No Kriteria</th>
            <th>Nama Kriteria</th>
            <th>Deskripsi</th>
            <th>Induk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $k)
        <tr>
            <td>{{ $k->no_kriteria }}</td>
            <td>{{ $k->nama_kriteria }}</td>
            <td>{{ $k->deskripsi_kriteria }}</td>
            <td>{{ $k->parent?->nama_kriteria ?? '-' }}</td>
            <td>
                <a href="{{ route('kriteria.edit', $k) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('kriteria.destroy', $k) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
