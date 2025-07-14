@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Edit Periode Akreditasi</h1>

<form method="POST" action="{{ route('periode-akreditasi.update', $periodeAkreditasi) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Program Studi</label>
        <select name="program_studi_id" class="form-control" required>
            <option value="">-- Pilih Program Studi --</option>
            @foreach($programStudi as $prodi)
                <option value="{{ $prodi->id }}" {{ old('program_studi_id', $periodeAkreditasi->program_studi_id) == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->nama_prodi }}
                </option>
            @endforeach
        </select>
    </div>
    

    <div class="form-group">
        <label>Periode</label>
        <input type="text" name="periode" class="form-control" value="{{ old('periode', $periodeAkreditasi->periode) }}" required>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            @foreach(['Proses', 'Terverifikasi', 'Selesai'] as $status)
                <option value="{{ $status }}" {{ old('status', $periodeAkreditasi->status) == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Penyelenggara Akreditasi</label>
        <select name="penyelenggara_akreditasi_id" class="form-control" required>
            <option value="">-- Pilih Penyelenggara --</option>
            @foreach($penyelenggara as $p)
                <option value="{{ $p->id }}" {{ old('penyelenggara_akreditasi_id', $periodeAkreditasi->penyelenggara_akreditasi_id) == $p->id ? 'selected' : '' }}>
                    {{ $p->nama_penyelenggara }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Instrumen Akreditasi</label>
        <select name="instrumen_akreditasi_id" class="form-control" required>
            <option value="">-- Pilih Instrumen --</option>
            @foreach($instrumenAkreditasi as $instrumen)
                <option value="{{ $instrumen->id }}" {{ old('instrumen_akreditasi_id', $periodeAkreditasi->instrumen_akreditasi_id) == $instrumen->id ? 'selected' : '' }}>
                    {{ $instrumen->nama_instrumen }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('periode-akreditasi.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
