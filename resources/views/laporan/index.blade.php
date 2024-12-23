@extends('layouts.app')

@section('title', 'Laporan Ternak - Smartfarm')

@section('content')
<div class="main-content">
    <h1 class="text-center mb-4">Laporan Hewan Ternak</h1>

    <!-- Menampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
@endsection
