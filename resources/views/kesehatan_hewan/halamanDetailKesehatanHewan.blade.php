@extends('layouts.app')

@section('title','Kesehatan Ternak - Smartfarm')

@section('content')
<div class="main-content">
    <h2>Detail Kesehatan Hewan</h2>
    <table class="table table-bordered table-detail" >
        <tr>
            <th>Nomor Tag</th>
            <td>{{ $hewanTernak->nomor_tag }}</td>
        </tr>
        <tr>
            <th>Jenis Sapi</th>
            <td>{{ $hewanTernak->jenis_sapi }}</td>
        </tr>
        <tr>
            <th>Umur</th>
            <td>{{ \Carbon\Carbon::parse($hewanTernak->umur)->diffInDays(\Carbon\Carbon::now()) }} hari</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $hewanTernak->jenis_kelamin }}</td>
        </tr>
    </table>

    <form action="{{ route('kesehatan_hewan.simpanKesehatan', $hewanTernak->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="riwayat_cekkesehatan">Riwayat Cek Kesehatan:</label>
            <input type="date" name="riwayat_cekkesehatan" id="riwayat_cekkesehatan" class="form-control" max="{{ date('Y-m-d')}}"
                   value="{{ old('riwayat_cekkesehatan', $hewanTernak->riwayat_cekkesehatan) }}">
        </div>

        <div class="mb-3">
            <label for="riwayat_penanganan">Riwayat Penanganan:</label>
            <input type="date" name="riwayat_penanganan" id="riwayat_penanganan" class="form-control"  max="{{ date('Y-m-d')}}"
                   value="{{ old('riwayat_penanganan', $hewanTernak->riwayat_penanganan) }}">
        </div>

        <div class="mb-3">
            <label for="status_penanganan">Status Penanganan:</label>
            <select name="status_penanganan" id="status_penanganan" class="form-select">
                <option value="Sembuh" {{ old('status_penanganan', $hewanTernak->status_penanganan) == 'Sembuh' ? 'selected' : '' }}>Sembuh</option>
                <option value="Dalam Perawatan" {{ old('status_penanganan', $hewanTernak->status_penanganan) == 'Dalam Perawatan' ? 'selected' : '' }}>Dalam Perawatan</option>
                <option value="Belum Ditangani" {{ old('status_penanganan', $hewanTernak->status_penanganan) == 'Belum Ditangani' ? 'selected' : '' }}>Belum Ditangani</option>
                <option value="-" {{ old('status_penanganan', $hewanTernak->status_penanganan) == '-' ? 'selected' : '' }}>-</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="riwayat_penyakit">Riwayat Penyakit:</label>
            <input type="text" name="riwayat_penyakit" id="riwayat_penyakit" class="form-control"
                   value="{{ old('riwayat_penyakit', $hewanTernak->riwayat_penyakit) }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
