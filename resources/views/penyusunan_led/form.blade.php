@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Input Penyusunan LED</h1>

<form method="POST" action="{{ route('penyusunan_led.store') }}">
    @csrf
    <input type="hidden" name="kriteria_id" value="{{ $kriteria->id }}">
    <input type="hidden" name="periode_akreditasi_id" value="{{ $periode->id }}">

    <div class="form-group">
        <label>Nama Kriteria</label>
        <input type="text" class="form-control" value="{{ $kriteria->nama_kriteria }}" readonly>
    </div>
    <div class="form-group">
        <label>Periode Akreditasi</label>
        <input type="text" class="form-control" value="{{ $periode->periode }}" readonly>
    </div>
    <div class="form-group">
        <label>Content LED</label>
        <textarea name="isi" class="form-control" rows="6" required>{{ old('isi', $penyusunan->isi ?? '') }}</textarea>
        @error('isi')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('penyusunan_led.index', ['periode_akreditasi_id' => $periode->id]) }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
