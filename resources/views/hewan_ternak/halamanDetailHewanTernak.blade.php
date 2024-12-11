@extends('layouts.app')

@section('title','Hewan Ternak - Smartfarm')

@section('content')
<div class="main-content">
    <div class="container">
        <h1>Detail Hewan Ternak</h1>
        <table class="table table-bordered">
            
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
            <tr>
                <th>id kelompok</th>
                <td>{{ $hewanTernak->id_kelompok }}</td>
            </tr>
            <tr>
                <th>Berat badan</th>
                <td>{{ $hewanTernak->berat_badan }}</td>
            </tr>
            <tr>
                <th>Jumlah Anak</th>
                <td>{{ $hewanTernak->jumlah_anak }}</td>
            </tr>
            <tr>
                <th>Status Melahirkan</th>
                <td>{{ $hewanTernak->status_melahirkan }}</td>
            </tr>

            <tr>
                <th>Riwayat Pemeriksaan Kesehatan</th>
                <td>{{ $hewanTernak->riwayat_cekkesehatan ? \Carbon\Carbon::parse($hewanTernak->riwayat_cekkesehatan)->format('d-m-Y') : 'Tidak ada data' }}</td>
            </tr>
            <tr>
                <th>Riwayat Penanganan</th>
                <td>{{ $hewanTernak->riwayat_penanganan ? \Carbon\Carbon::parse($hewanTernak->riwayat_penanganan)->format('d-m-Y') : 'Tidak ada data' }}</td>
            </tr>
            <tr>
                <th>Status Penanganan</th>
                <td>{{ $hewanTernak->status_penanganan ?? 'Tidak ada data' }}</td>
            </tr>
            <tr>
                <th>Riwayat Penyakit</th>
                <td>{{ $hewanTernak->riwayat_penyakit ?? 'Tidak ada data' }}</td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="{{ route('hewan_ternak.halamanEditHewanTernak', $hewanTernak->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('hewan_ternak.hapusHewanTernak', $hewanTernak->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
