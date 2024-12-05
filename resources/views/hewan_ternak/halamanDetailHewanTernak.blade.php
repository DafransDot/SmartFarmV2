@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="container">
        <h1>Detail Hewan Ternak</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $hewanTernak->id }}</td>
            </tr>
            <tr>
                <th>Jenis Sapi</th>
                <td>{{ $hewanTernak->jenis_sapi }}</td>
            </tr>
            <tr>
                <th>Umur</th>
                <td>{{ \Carbon\Carbon::parse($hewanTernak->umur)->diffInDays(\Carbon\Carbon::now()) }} hari</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $hewanTernak->jenis_kelamin }}</td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="{{ route('hewan_ternak.halamanEditHewanTernak', $hewanTernak->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('hewan_ternak.hapusHewanTernak', $hewanTernak->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
