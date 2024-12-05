@extends('layouts.app')

@section('content')
<div class="main-content">
    <h2>Kesehatan Hewan</h2>
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
