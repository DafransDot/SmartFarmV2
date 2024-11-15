@extends('layouts.app')

@section('content')
<h2>Tambah Kelompok Ternak</h2>

<form action="{{ route('kelompok-ternak.store') }}" method="POST">
    @csrf
    <label>Nama Kelompok:</label>
    <input type="text" name="nama_kelompok" required>
    <label>Lokasi:</label>
    <input type="text" name="lokasi" required>
    <label>Jumlah Ternak:</label>
    <input type="number" name="jumlah_ternak" required>
    <button type="submit">Simpan</button>
</form>
@endsection
