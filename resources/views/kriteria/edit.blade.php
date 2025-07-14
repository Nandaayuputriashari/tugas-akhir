@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Edit Kriteria</h1>

<form method="POST" action="{{ route('kriteria.update', $kriteria) }}">
    @csrf @method('PUT')

    <div class="form-group">
        <label>No Kriteria</label>
        <input type="text" name="no_kriteria" class="form-control" value="{{ old('no_kriteria', $kriteria->no_kriteria) }}" required>
    </div>

    <div class="form-group">
        <label>Nama Kriteria</label>
        <input type="text" name="nama_kriteria" class="form-control" value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}" required>
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi_kriteria" class="form-control">{{ old('deskripsi_kriteria', $kriteria->deskripsi_kriteria) }}</textarea>
    </div>


    <div class="form-group">
        <label>Instrumen Akreditasi <span class="text-danger">*</span></label>
        <select name="instrumen_akreditasi_id" class="form-control" required>
            <option value="">-- Pilih Instrumen --</option>
            @foreach($instrumenOptions as $ins)
                <option value="{{ $ins->id }}" {{ old('instrumen_akreditasi_id', $kriteria->instrumen_akreditasi_id) == $ins->id ? 'selected' : '' }}>
                    {{ $ins->nama_instrumen ?? 'Instrumen #' . $ins->id }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Induk Kriteria (Opsional)</label>
        <select name="parent_kriteria" class="form-control">
            <option value="">-- Tidak Ada --</option>
            @foreach($parentOptions as $item)
                <option value="{{ $item->id }}" {{ old('parent_kriteria', $kriteria->parent_kriteria) == $item->id ? 'selected' : '' }}>
                    {{ $item->nama_kriteria }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
