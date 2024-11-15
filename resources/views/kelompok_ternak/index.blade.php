@extends('layouts.app')

@section('content')
<h2>Daftar Kelompok Ternak</h2>
<a href="{{ route('kelompok-ternak.create') }}">Tambah Kelompok</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
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
                <a href="{{ route('kelompok-ternak.edit', $kelompok->id) }}">Edit</a>
                <form action="{{ route('kelompok-ternak.destroy', $kelompok->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
