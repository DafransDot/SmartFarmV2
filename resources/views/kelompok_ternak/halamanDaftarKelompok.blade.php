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
    <a href="{{ route('kelompok_ternak.halamanTambahKelompok') }}" class="btn-tambah-kelompok" style="background-color: blue; color: white">Tambah Kelompok</a>


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
                     <a href="{{ route('kelompok_ternak.halamanEditKelompok', $kelompok->id) }}" class="btn" style="background-color: blue; color: white; padding: 5px 15px; font-size: 14px; text-decoration: none; border-radius: 3px; border: 1px solid #ccc;">
                     Edit
                    </a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $kelompok->id }}">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Konfirmasi Hapus -->
    @foreach ($kelompokTernak as $kelompok)
    <div class="modal fade" id="deleteModal{{ $kelompok->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $kelompok->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $kelompok->id }}">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus kelompok ternak <strong>{{ $kelompok->nama_kelompok }}</strong>?</p>
                    <form action="{{ route('kelompok_ternak.hapusKelompok', $kelompok->id) }}" method="POST" id="deleteForm{{ $kelompok->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteForm{{ $kelompok->id }}').submit();">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
