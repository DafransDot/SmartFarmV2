@extends('layouts.app')

@section('title','Kelompok Ternak - Smartfarm')

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
    <h2 class="judul-daftar-kelompok">Daftar Kelompok Ternak</h2>
    <a href="{{ route('kelompok_ternak.halamanTambahKelompok') }}" class="btn-tambah-kelompok">Tambah Kelompok</a>

    
    <table class="table-tambah-kelompok">
        <thead>
            <tr>
                <th>Nama Kelompok</th>
                <th>Nama Ketua</th>
                <th>Lokasi</th>
                <th>Jumlah Ternak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelompokTernak as $kelompok)
            <tr>
                <td>{{ $kelompok->nama_kelompok }}</td>
                <td>{{ $kelompok->nama_ketua }}</td>
                <td>{{ $kelompok->lokasi }}</td>
                <td>{{ $kelompok->jumlah_ternak }}</td>
                <td>
                    <a href="{{ route('kelompok_ternak.halamanEditKelompok', $kelompok->id) }}">Edit</a>
                    <form action="{{ route('kelompok_ternak.hapusKelompok', $kelompok->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
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
