@extends('layouts.app')

@section('content')
<div class="main-content">
    <h2>Kesehatan Hewan</h2>
    <form action="{{ route('kesehatan_hewan.halamanDetailKesehatanHewan') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="cari">Masukan ID hewan Ternak:</label>
        <input type="text" id="cari" name="cari" class="form-control @error('cari') is-invalid @enderror" required>
        @error('cari')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form>
<table>
    <thead>
        <tr>
            <th>ID Hewan</th>
            <th>Nama Hewan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($hewanTernak as $hewan)
            <tr>
                <td>{{ $hewan->id }}</td>
                <td>{{ $hewan->id_kelompok }}</td>
                <td>
                    <a href="#">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Data tidak ditemukan</td>
            </tr>
        @endforelse
    </tbody>
</table>



</div>
@endsection
