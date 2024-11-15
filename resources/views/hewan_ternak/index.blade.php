@extends('layouts.app')

@section('content')
    <h1>Daftar Hewan Ternak</h1>
    <a href="{{ route('hewan_ternak.create') }}">Tambah Hewan Ternak</a>
    <ul>
        @foreach ($hewan_ternak as $hewan)
            <li>{{ $hewan->nomor_id }} - {{ $hewan->jenis }}</li>
        @endforeach
    </ul>
@endsection
