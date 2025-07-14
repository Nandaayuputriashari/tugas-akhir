@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Data Penyelenggara Akreditasi</h1>
<a href="{{ route('penyelenggara-akreditasi.create') }}" class="btn btn-primary mb-3">+ Tambah Penyelenggara</a>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Penyelenggara</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_penyelenggara }}</td>
            <td>
                <a href="{{ route('instrumen-akreditasi.index', ['penyelenggara_akreditasi_id' => $item->id]) }}" class="btn btn-info btn-sm">Tambah Instrumen</a>
                <a href="{{ route('penyelenggara-akreditasi.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('penyelenggara-akreditasi.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="3" class="text-center">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
