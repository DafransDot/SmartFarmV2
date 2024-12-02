@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="container">
        <h2>Tambah Kelompok Ternak</h2>

        <form action="{{ route('kelompok_ternak.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_kelompok">Nama Kelompok:</label>
                <input type="text" id="nama_kelompok" name="nama_kelompok" class="form-control @error('nama_kelompok') is-invalid @enderror" required>
                @error('nama_kelompok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" required>
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_ternak">Jumlah Ternak:</label>
                <input type="number" id="jumlah_ternak" name="jumlah_ternak" class="form-control @error('jumlah_ternak') is-invalid @enderror" required>
                @error('jumlah_ternak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="foto">Foto Kelompok Ternak (Opsional):</label>
                <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

