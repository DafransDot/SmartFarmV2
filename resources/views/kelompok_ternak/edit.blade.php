@extends('layouts.app')

@section('content')
<div class="main-content">
    <h2>Edit Kelompok Ternak</h2>

    <form action="{{ route('kelompok_ternak.update', $kelompokTernak->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama Kelompok:</label>
        <input type="text" name="nama_kelompok" value="{{ $kelompokTernak->nama_kelompok }}" required>
        <label>Lokasi:</label>
        <input type="text" name="lokasi" value="{{ $kelompokTernak->lokasi }}" required>
        <label>Jumlah Ternak:</label>
        <input type="number" name="jumlah_ternak" value="{{ $kelompokTernak->jumlah_ternak }}" required>
        <button type="submit">Update</button>
    </form>
</div>
@endsection
