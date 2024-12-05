@extends('layouts.app')

@section('title','Kelompok Ternak - Smartfarm')

@section('content')
<div class="main-content">
    <h2 class="judul-daftar-kelompok">Daftar Kelompok Ternak</h2>
    <a href="{{ route('kelompok_ternak.halamanTambahKelompok') }}" class="btn-tambah-kelompok">Tambah Kelompok</a>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <table class="table-tambah-kelompok">
        <thead>
            <tr>
                <th>Nama Kelompok</th>
                <th>Lokasi</th>
                <th>Jumlah Ternak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelompokTernak as $kelompok)
            <tr>
                <td>{{ $kelompok->nama_kelompok }}</td>
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
@endsection
