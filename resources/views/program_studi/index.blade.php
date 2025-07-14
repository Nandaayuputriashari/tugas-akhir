@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Data Program Studi</h1>

<a href="{{ route('program-studi.create') }}" class="btn btn-primary mb-3">+ Tambah Program Studi</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Prodi</th>
            <th>Jenjang</th>
            <th>UPPS</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Peringkat Terbaru</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $prodi)
        <tr>
            <td>{{ $prodi->nama_prodi }}</td>
            <td>{{ $prodi->jenjang }}</td>
            <td>{{ $prodi->upps }}</td>
            <td>{{ $prodi->email }}</td>
            <td>{{ $prodi->telp }}</td>
            <td>{{ $prodi->peringkat_terbaru }}</td>
            <td>
                <a href="{{ route('program-studi.edit', $prodi) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('program-studi.destroy', $prodi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">Belum ada data.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
