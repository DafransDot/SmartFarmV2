@extends('layouts.app')

@section('title', 'Kesehatan Ternak - Smartfarm')

@section('content')
<div class="main-content">
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

    <!-- Form Cari -->
    <h1 class="text-center mb-4">Kesehatan Hewan</h1>
    <form action="{{ route('kesehatan_hewan.halamanDetailKesehatanHewan') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="cari" class="form-label">Masukkan Nomor Tag Hewan Ternak:</label>
            <input type="text" id="cari" name="cari" class="form-control @error('cari') is-invalid @enderror" required style="text-transform: uppercase;">
            @error('cari')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success px-4">Cari</button>
        </div>
    </form>
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
