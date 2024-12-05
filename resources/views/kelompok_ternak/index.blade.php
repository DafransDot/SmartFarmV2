@extends('layouts.app')

@section('title','Kelompok Ternak - Smartfarm')

@section('content')
<div class="main-content py-4">
    <div class="container">
        <h1 class="mb-4 text-center">Daftar Kelompok Ternak</h1>

        <!-- Grid Responsif Bootstrap -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @forelse ($kelompokTernak as $kelompok)
                <div class="col">
                    <div class="card h-100 text-center border-0 shadow">
                        <button 
                            onclick="location.href='{{ route('hewan_ternak.index', ['kelompok_id' => $kelompok->id]) }}'" 
                            class="btn btn-link p-0 kelompok-button">
                            <!-- Gambar Kelompok -->
                            <img 
                                src="{{ $kelompok->foto ? asset('storage/' . $kelompok->foto) : asset('storage/default-placeholder.png') }}" 
                                alt="{{ $kelompok->nama_kelompok }}" 
                                class="img-fluid rounded-circle kelompok-img"
                            >
                            <div class="card-body">
                                <!-- Nama Kelompok -->
                                <h5 class="card-title">{{ $kelompok->nama_kelompok }}</h5>
                            </div>
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Belum ada kelompok ternak yang tersedia.</p>
                </div>
            @endforelse
        </div>

        <!-- Tombol Tambah Kelompok -->
        <div class="button-tbh-kelompok">
            <a href="{{ route('kelompok_ternak.halamanDaftarKelompok') }}" class="btn btn-success rounded-circle shadow-lg">
                <i class="bi bi-plus-lg"></i> <!-- Ikon Bootstrap -->
            </a>
        </div>
    </div>
</div>
@endsection
