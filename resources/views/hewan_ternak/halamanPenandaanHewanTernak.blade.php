@extends('layouts.app')

@section('title','Penandaan Hewan Ternak - Smartfarm')

@section('content')
<div class="main-content">
    <!-- ini nontifikasi -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
        <div id="successToast" class="toast bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Berhasil</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
        <!-- Nontifikasi Error -->
        <div id="errorToast" class="toast bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Terjadi Kesalahan</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ini fomulir -->
    <div class="card shadow">
        <div class="card-header text-white">
            <h1 class="h5 mb-0">Tambah Hewan Ternak</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('hewan_ternak.tambahHewanTernak') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nomor_tag" class="form-label">Nomor Tag:</label>
                    <input type="text" name="nomor_tag" id="nomor_tag" class="form-control" placeholder="Masukkan nomor tag" required style="text-transform: uppercase;">
                </div>
                <div class="mb-3">
                    <label for="jenis_sapi" class="form-label">Jenis Sapi:</label>
                    <input type="text" name="jenis_sapi" id="jenis_sapi" class="form-control" placeholder="Masukkan jenis sapi" required style="text-transform: uppercase;">
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label">Tanggal Lahir:</label>
                    <input type="date" name="umur" id="umur" class="form-control" max="{{ date('Y-m-d') }}"  required>
                </div>
                <div class="mb-3">
                    <label for="berat_badan" class="form-label">Berat Badan (kg):</label>
                    <input type="number" name="berat_badan" id="berat_badan" class="form-control" placeholder="Masukkan berat badan" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Jantan">Jantan</option>
                        <option value="Betina">Betina</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_anak" class="form-label">Jumlah Anak:</label>
                    <input type="number" name="jumlah_anak" id="jumlah_anak" class="form-control" value="0" min="0">
                </div>
                <div class="mb-3">
                    <label for="status_melahirkan" class="form-label">Status Melahirkan:</label>
                    <select name="status_melahirkan" id="status_melahirkan" class="form-select">
                        <option value="Belum Pernah">Belum Pernah</option>
                        <option value="Pernah">Pernah</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_kelompok" class="form-label">Kelompok Ternak:</label>
                    <select name="id_kelompok" id="id_kelompok" class="form-select" required>
                        <option value="" disabled selected>Pilih Kelompok</option>
                        @foreach($kelompokTernak as $kelompok)
                            <option value="{{ $kelompok->id }}">{{ $kelompok->nama_kelompok }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
     document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            var toastEl = document.getElementById('successToast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        @elseif($errors->any())
            var toastEl = document.getElementById('errorToast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        @endif
    });
</script>
@endsection
