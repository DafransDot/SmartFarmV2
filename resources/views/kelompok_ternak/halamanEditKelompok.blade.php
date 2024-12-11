@extends('layouts.app')

@section('title','Edit Kelompok Ternak - Smartfarm')

@section('content')
<div class="main-content">
    <div class="container">
        <h2>Edit Kelompok Ternak</h2>

        <form action="{{ route('kelompok_ternak.editKelompok', $kelompokTernak->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_kelompok">Nama Kelompok:</label>
                <input type="text" id="nama_kelompok" name="nama_kelompok" class="form-control @error('nama_kelompok') is-invalid @enderror" value="{{ $kelompokTernak->nama_kelompok }}" required>
                @error('nama_kelompok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
           
            <div class="form-group">
                <label for="nama_ketua">Nama Ketua:</label>
                <input type="text" id="nama_ketua" name="nama_ketua" class="form-control @error('nama_ketua') is-invalid @enderror" value="{{ $kelompokTernak->nama_ketua }}" required>
                @error('nama_ketua')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ $kelompokTernak->lokasi }}" required>
                @error('lokasi')
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
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
