@extends('layouts.app')

@section('title','Hewan Ternak - Smartfarm')

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
    <!-- ini content -->
    <div class="container">
        <h1>Daftar Hewan Ternak</h1>

        @if($hewanTernaks->isEmpty())
            <p>Tidak ada data hewan ternak untuk kelompok yang dipilih.</p>
        @else
            <div class="row">
                @foreach ($hewanTernaks as $hewan)
                    <div class="col-md-4">
                        <a href="{{ route('hewan_ternak.halamanDetailHewanTernak', $hewan->id) }}" class="text-decoration-none text-dark">
                            <div class="card mb-4 shadow-sm card-hewan" data-status="{{ $hewan->status_penanganan }}">
                                <div class="card-body">
                                    <h5 class="card-title">Nomor Tag: {{ $hewan->nomor_tag }}</h5>
                                    <p class="card-text"><strong>Jenis Sapi:</strong> {{ $hewan->jenis_sapi }}</p>
                                    <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $hewan->jenis_kelamin }}</p>
                                    <p class="card-text"><strong>Status Penanganan:</strong> {{ $hewan->status_penanganan }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
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
