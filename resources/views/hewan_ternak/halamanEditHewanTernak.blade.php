@extends('layouts.app')

@section('title','Edit Hewan Ternak - Smartfarm')

@section('content')
<div class="main-content">
    <!-- ini formulir -->
    <h1>Edit Hewan Ternak</h1>
    <form action="{{ route('hewan_ternak.editHewanTernak', $hewanTernak->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nomor_tag" class="form-label">Nomor Tag:</label>
            <input type="text" name="nomor_tag" id="nomor_tag" class="form-control" value="{{ $hewanTernak->nomor_tag }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_sapi" class="form-label">Jenis Sapi:</label>
            <input type="text" name="jenis_sapi" id="jenis_sapi" class="form-control" value="{{ $hewanTernak->jenis_sapi }}" required>
        </div>

        <div class="mb-3">
            <label for="umur" class="form-label">Umur:</label>
            <input type="date" name="umur" id="umur" class="form-control" value="{{ $hewanTernak->umur }}"  max="{{ date('Y-m-d') }}"  required>
        </div>

        <div class="mb-3">
            <label for="berat_badan" class="form-label">Berat Badan (kg):</label>
            <input type="number" name="berat_badan" id="berat_badan" class="form-control" value="{{ $hewanTernak->berat_badan }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                <option value="Jantan" {{ $hewanTernak->jenis_kelamin == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                <option value="Betina" {{ $hewanTernak->jenis_kelamin == 'Betina' ? 'selected' : '' }}>Betina</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah_anak" class="form-label">Jumlah Anak:</label>
            <input type="number" name="jumlah_anak" id="jumlah_anak" class="form-control" value="{{ $hewanTernak->jumlah_anak }}" required>
        </div>

        <div class="mb-3">
            <label for="status_kelahiran" class="form-label">Status Kelahiran:</label>
            <select name="status_kelahiran" id="status_kelahiran" class="form-select">
                <option value="Kawin Alami" {{ $hewanTernak->status_kelahiran == 'Kawin Alami' ? 'selected' : '' }}>Kawin Alami</option>
                <option value="Kawin Suntik" {{ $hewanTernak->status_kelahiran == 'Kawin Suntik' ? 'selected' : '' }}>Kawin Suntik</option>
                <option value="Pembelian" {{ $hewanTernak->status_kelahiran == 'Pembelian' ? 'selected' : '' }}>Pembelian</option>
                <option value="Penambahan Lain" {{ $hewanTernak->status_kelahiran == 'Penambahan Lain' ? 'selected' : '' }}>Penambahan Lain</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_kelompok" class="form-label">Kelompok Ternak:</label>
            <select name="id_kelompok" id="id_kelompok" class="form-select">
                @foreach($kelompokTernak as $kelompok)
                    <option value="{{ $kelompok->id }}" {{ $kelompok->id == $hewanTernak->id_kelompok ? 'selected' : '' }}>
                        {{ $kelompok->nama_kelompok }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="riwayat_cekkesehatan" class="form-label">Riwayat Cek Kesehatan:</label>
            <input type="date" name="riwayat_cekkesehatan" id="riwayat_cekkesehatan" class="form-control" value="{{ $hewanTernak->riwayat_cekkesehatan }} "  max="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label for="riwayat_penanganan" class="form-label">Riwayat Penanganan:</label>
            <input type="date" name="riwayat_penanganan" id="riwayat_penanganan" class="form-control" value="{{ $hewanTernak->riwayat_penanganan }}"  max="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label for="status_penanganan" class="form-label">Status Penanganan:</label>
            <select name="status_penanganan" id="status_penanganan" class="form-select">
                <option value="Sembuh" {{ $hewanTernak->status_penanganan == 'Sembuh' ? 'selected' : '' }}>Sembuh</option>
                <option value="Dalam Perawatan" {{ $hewanTernak->status_penanganan == 'Dalam Perawatan' ? 'selected' : '' }}>Dalam Perawatan</option>
                <option value="Belum Ditangani" {{ $hewanTernak->status_penanganan == 'Belum Ditangani' ? 'selected' : '' }}>Belum Ditangani</option>
                <option value="-" {{ $hewanTernak->status_penanganan == '-' ? 'selected' : '' }}>-</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit:</label>
            <input type="text" name="riwayat_penyakit" id="riwayat_penyakit" class="form-control" value="{{ $hewanTernak->riwayat_penyakit }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
