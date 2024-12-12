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
                <th>Status Kelahiran</th>
                <td>{{ $hewanTernak->status_kelahiran}}</td>
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
            <!-- Button untuk memunculkan modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                Nonaktifkan
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel">Nonaktifkan Hewan Ternak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('hewan_ternak.hapusHewanTernak', $hewanTernak->id) }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <p>Nomor Tag: {{ $hewanTernak->nomor_tag }}</p>
                    <div class="form-group">
                        <label for="status_pengurangan">Pilih alasan pengurangan:</label>
                        <select name="status_pengurangan" id="status_pengurangan" class="form-control" required>
                            <option value="Kematian">Kematian</option>
                            <option value="Pemotongan">Pemotongan</option>
                            <option value="Penjualan">Penjualan</option>
                            <option value="Pengurangan Lain">Pengurangan Lain</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
