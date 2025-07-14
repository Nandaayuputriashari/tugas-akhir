@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Periode Akreditasi</h1>

<a href="{{ route('periode-akreditasi.create') }}" class="btn btn-primary mb-3">+ Tambah Periode</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="GET" action="" class="mb-3 d-flex justify-content-end">
    <div class="input-group" style="max-width:350px;">
        <input type="text" name="q" class="form-control" placeholder="Cari prodi, periode, status..." value="{{ request('q') }}">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Penyelenggara</th>
            <th>Nama Program Studi</th>
            <th>Periode</th>
            <th>Instrumen</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $item)
        <tr>
            <td>{{ $item->penyelenggaraAkreditasi->nama_penyelenggara ?? '-' }}</td>
            <td>{{ $item->programStudi->nama_prodi ?? '-' }}</td>
            <td>{{ $item->periode }}</td>
            <td>{{ $item->instrumenAkreditasi->nama ?? '-' }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <a href="{{ route('pengisi-borang.index', ['periode_akreditasi_id' => $item->id]) }}" class="btn btn-info btn-sm">
                    Input Tim </a>
                <a href="{{ route('periode-akreditasi.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('penyusunan-led.index', ['periode_akreditasi_id' => $item->id]) }}" class="btn btn-success btn-sm">Lihat LED</a>
                <form action="{{ route('periode-akreditasi.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Belum ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
