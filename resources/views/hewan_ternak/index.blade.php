@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="container">
        <h1>Daftar Hewan Ternak</h1>

        @if($hewanTernaks->isEmpty())
            <p>Tidak ada data hewan ternak untuk kelompok yang dipilih.</p>
        @else
            <div class="row">
                @foreach ($hewanTernaks as $hewan)
                    <div class="col-md-4">
                        <a href="{{ route('hewan_ternak.halamanDetailHewanTernak', $hewan->id) }}" class="text-decoration-none text-dark">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">ID: {{ $hewan->id }}</h5>
                                    <p class="card-text"><strong>Jenis Sapi:</strong> {{ $hewan->jenis_sapi }}</p>
                                    <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $hewan->jenis_kelamin }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
