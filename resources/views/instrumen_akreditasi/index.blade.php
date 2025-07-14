@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Data Instrumen Akreditasi</h1>
<a href="{{ route('instrumen-akreditasi.create', ['penyelenggara_akreditasi_id' => $penyelenggaraId]) }}" class="btn btn-primary mb-3">+ Tambah Instrumen</a>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            {{-- <th>Nomor</th> --}}
            <th>Nama</th>
            <th>Penyelenggara</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data->sortBy('id')->values() as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            {{-- <td>{{ $item->nomor }}</td> --}}
            <td>{{ $item->nama }}</td>
            <td>{{ $item->penyelenggaraAkreditasi->nama_penyelenggara ?? '-' }}</td>
            <td>
                <a href="{{ route('kriteria.index') }}?instrumen_akreditasi_id={{ $item->id }}" class="btn btn-success btn-sm">
                    Tabel Kriteria
                </a>
                <a href="{{ route('instrumen-akreditasi.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('instrumen-akreditasi.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
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
