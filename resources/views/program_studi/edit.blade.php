@extends('layouts.app')
@section('content')
<h1 class="h4 mb-4 text-gray-800">Edit Program Studi</h1>

<form method="POST" action="{{ route('program-studi.update', $programStudi) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama_prodi" class="form-control" value="{{ old('nama_prodi', $programStudi->nama) }}" required>
    </div>

    <div class="form-group">
        <label>Jenjang</label>
        <select name="jenjang" class="form-control" required>
            <option value="">-- Pilih Jenjang --</option>
            @foreach(['D3', 'D4', 'S1', 'S2', 'S3'] as $j)
                <option value="{{ $j }}" {{ old('jenjang', $programStudi->jenjang) == $j ? 'selected' : '' }}>{{ $j }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>UPPS</label>
        <input type="text" name="upps" class="form-control" value="{{ old('upps', $programStudi->upps) }}" required>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required>{{ old('alamat', $programStudi->alamat) }}</textarea>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $programStudi->email) }}" required>
    </div>

    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telp" class="form-control" value="{{ old('telp', $programStudi->telp) }}" required>
    </div>

    <div class="form-group">
        <label>SK Pembukaan</label>
        <input type="text" name="sk_pembukaan" class="form-control" value="{{ old('sk_pembukaan', $programStudi->sk_pembukaan) }}" required>
    </div>

    <div class="form-group">
        <label>Tanggal SK</label>
        <input type="date" name="tgl_sk" class="form-control" value="{{ old('tgl_sk', $programStudi->tgl_sk) }}" required>
    </div>

    <div class="form-group">
        <label>Tahun Pembukaan</label>
        <input type="text" name="thn_pembukaan" class="form-control" value="{{ old('thn_pembukaan', $programStudi->thn_pembukaan) }}" required>
    </div>

    <div class="form-group">
        <label>Peringkat Terbaru</label>
        <select name="peringkat_terbaru" class="form-control" required>
            <option value="">-- Pilih Peringkat --</option>
            @foreach(['Unggul', 'Baik Sekali', 'Baik', 'C'] as $peringkat)
                <option value="{{ $peringkat }}" {{ old('peringkat_terbaru', $programStudi->peringkat_terbaru) == $peringkat ? 'selected' : '' }}>{{ $peringkat }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>SK BAN-PT</label>
        <input type="text" name="sk_ban_pt" class="form-control" value="{{ old('sk_ban_pt', $programStudi->sk_ban_pt) }}" required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('program-studi.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
