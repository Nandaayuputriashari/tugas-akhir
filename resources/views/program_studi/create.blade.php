@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Tambah Program Studi</h1>

<form method="POST" action="{{ route('program-studi.store') }}">
    @csrf

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama_prodi" class="form-control" value="{{ old('nama') }}" required>
    </div>

    <div class="form-group">
        <label>Jenjang</label>
        <select name="jenjang" class="form-control" required>
            <option value="">-- Pilih Jenjang --</option>
            @foreach(['D3', 'D4', 'S1', 'S2', 'S3'] as $j)
                <option value="{{ $j }}" {{ old('jenjang') == $j ? 'selected' : '' }}>{{ $j }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>UPPS</label>
        <input type="text" name="upps" class="form-control" value="{{ old('upps') }}" required>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telp" class="form-control" value="{{ old('telp') }}" required>
    </div>

    <div class="form-group">
        <label>SK Pembukaan</label>
        <input type="text" name="sk_pembukaan" class="form-control" value="{{ old('sk_pembukaan') }}" required>
    </div>

    <div class="form-group">
        <label>Tanggal SK</label>
        <input type="date" name="tgl_sk" class="form-control" value="{{ old('tgl_sk') }}" required>
    </div>

    <div class="form-group">
        <label>Tahun Pembukaan</label>
        <input type="text" name="thn_pembukaan" class="form-control" value="{{ old('thn_pembukaan') }}" required>
    </div>

    <div class="form-group">
        <label>Peringkat Terbaru</label>
        <select name="peringkat_terbaru" class="form-control" required>
            <option value="">-- Pilih Peringkat --</option>
            @foreach(['Unggul', 'Baik Sekali', 'Baik', 'C'] as $peringkat)
                <option value="{{ $peringkat }}" {{ old('peringkat_terbaru') == $peringkat ? 'selected' : '' }}>{{ $peringkat }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>SK BAN-PT</label>
        <input type="text" name="sk_ban_pt" class="form-control" value="{{ old('sk_ban_pt') }}" required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('program-studi.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
