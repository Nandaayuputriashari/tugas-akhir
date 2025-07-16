@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Data Pengisi Borang</h1>

@if(request('periode_akreditasi_id'))
<a href="{{ route('pengisi-borang.create') }}?periode_akreditasi_id={{ request('periode_akreditasi_id') }}" class="btn btn-success mb-3">
    + Tambah Pengisi Borang
</a>
@else
<a href="{{ route('pengisi-borang.create') }}" class="btn btn-success mb-3">
    + Tambah Pengisi Borang
</a>

{{-- <a href="{{ route('pengisi-borang.export-word', $periode->id) }}" class="btn btn-sm btn-primary">
    <i class="fas fa-file-word"></i> Export ke Word
</a> --}}

@endif



@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Periode Akreditasi</th>
            <th>Program Studi</th>
            <th>Kriteria</th>
            <th>Nama Karyawan</th>
            <th>NIDN</th>
            <th>NITK</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $item)
        <tr>
            <td>{{ $item->periodeAkreditasi->periode ?? '-' }}</td>
            <td>{{ $item->periodeAkreditasi->programStudi->nama_prodi ?? '-' }}</td>
            <td>
                @if($item->kriteria)
                    [{{ $item->kriteria->no_kriteria }}] {{ $item->kriteria->nama_kriteria }}
                @else
                    -
                @endif
            </td>
            <td>{{ $item->karyawan->nama ?? '-' }}</td>
            <td>{{ $item->karyawan->nidn ?? '-' }}</td>
            <td>{{ $item->karyawan->nitk ?? '-' }}</td>
            <td>{{ $item->jabatan ?? '-' }}</td>
            <td>
                <a href="{{ route('pengisi-borang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pengisi-borang.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Belum ada data pengisi borang.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
