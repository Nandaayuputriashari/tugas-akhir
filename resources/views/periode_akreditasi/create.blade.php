@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Tambah Periode Akreditasi</h1>

<form method="POST" action="{{ route('periode-akreditasi.store') }}">
    @csrf

    <div class="form-group">
        <label>Program Studi</label>
        <select name="program_studi_id" class="form-control" required>
            <option value="">-- Pilih Program Studi --</option>
            @foreach($programStudi as $prodi)
                <option value="{{ $prodi->id }}" {{ old('program_studi_id') == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->nama_prodi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Periode Akreditasi</label>
        <input type="text" name="periode" class="form-control" value="{{ old('periode') }}" required placeholder="Masukkan Periode Akreditasi">
    </div>

    <div class="form-group">
        <label>Penyelenggara Akreditasi</label>
        <select name="penyelenggara_akreditasi_id" class="form-control" required>
            <option value="">-- Pilih Penyelenggara --</option>
            @foreach($penyelenggara as $p)
                <option value="{{ $p->id }}" {{ old('penyelenggara_akreditasi_id') == $p->id ? 'selected' : '' }}>
                    {{ $p->nama_penyelenggara }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Instrumen Akreditasi</label>
        <select name="instrumen_akreditasi_id" class="form-control" id="instrumen_akreditasi_id" required>
            <option value="">-- Pilih Instrumen --</option>
            @foreach($instrumen as $i)
                <option value="{{ $i->id }}" data-penyelenggara="{{ $i->penyelenggara_akreditasi_id }}" {{ old('instrumen_akreditasi_id') == $i->id ? 'selected' : '' }}>
                    {{ $i->nomor }} - {{ $i->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            @foreach(['Proses', 'Terverifikasi', 'Selesai'] as $status)
                <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('periode-akreditasi.index') }}" class="btn btn-secondary">Kembali</a>
</form>

<script>
    // Filter instrumen sesuai penyelenggara yang dipilih
    document.addEventListener('DOMContentLoaded', function() {
        const penyelenggaraSelect = document.querySelector('select[name=penyelenggara_akreditasi_id]');
        const instrumenSelect = document.getElementById('instrumen_akreditasi_id');
        function filterInstrumen() {
            const penyelenggaraId = penyelenggaraSelect.value;
            Array.from(instrumenSelect.options).forEach(opt => {
                if (!opt.value) return opt.style.display = '';
                opt.style.display = (opt.getAttribute('data-penyelenggara') === penyelenggaraId) ? '' : 'none';
            });
            instrumenSelect.value = '';
        }
        penyelenggaraSelect.addEventListener('change', filterInstrumen);
        // Trigger filter on page load if value exists
        if (penyelenggaraSelect.value) filterInstrumen();
    });
</script>
@endsection
