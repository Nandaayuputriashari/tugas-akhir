@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Penyusunan LED - Periode: {{ $periode->periode ?? '-' }}</h1>
{{-- <a href="{{ route('periode_akreditasi.index') }}" class="btn btn-secondary mb-3">Kembali ke Periode Akreditasi</a> --}}
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No Kriteria</th>
            <th>Kriteria</th>
            <th>Karyawan Pengisi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kriteriaList as $kriteria)
        <tr>
            <td>{{ $kriteria->no_kriteria }}</td>
            <td>{{ $kriteria->nama_kriteria }}</td>
            <td>
                @php
                    $pengisi = $kriteria->pengisiBorang->where('periode_akreditasi_id', $periode->id)->first();
                @endphp
                {{ ($pengisi && $pengisi->karyawan) ? $pengisi->karyawan->nama : '-' }}
            </td>
            <td>
                {{ $penyusunan[$kriteria->id]->status ?? '-' }}
            </td>
            <td>
                <a href="{{ route('penyusunan_led.input', ['kriteria_id' => $kriteria->id, 'periode_akreditasi_id' => $periode->id]) }}" class="btn btn-primary btn-sm">{{ isset($penyusunan[$kriteria->id]) ? 'Edit' : 'Input' }} LED</a>
            </td>
        </tr>
        @empty
        <tr><td colspan="3" class="text-center">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
