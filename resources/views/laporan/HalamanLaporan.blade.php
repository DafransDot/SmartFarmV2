@extends('layouts.app')

@section('title', 'Laporan Ternak - Smartfarm')

@section('content')
<div class="main-content">
    <h1 class="text-center mb-4">Laporan Hewan Ternak</h1>

    <!-- Notifikasi -->
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

        <!-- Notifikasi Error -->
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


    <form action="{{ route('laporan.buatLaporan') }}" method="POST" class="laporan">
        @csrf
        <div class="mb-3">
            <label for="periode" class="form-label">Pilih Periode:</label>
            <select name="periode" id="periode" class="form-select">
                <option value="6bulan">6 Bulan Terakhir</option>
                <option value="1tahun">1 Tahun Terakhir</option>
                <option value="2tahun">2 Tahun Terakhir</option>
                <option value="3tahun">3 Tahun Terakhir</option>
            </select>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn" style="background-color: #256525; color: white;">Unduh</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Menampilkan Toast jika session 'success' ada
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
