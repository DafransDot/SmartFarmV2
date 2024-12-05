@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="h5 mb-0">Tambah Hewan Ternak</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('hewan_ternak.tambahHewanTernak') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="jenis_sapi" class="form-label">Jenis Sapi:</label>
                    <input type="text" name="jenis_sapi" id="jenis_sapi" class="form-control" placeholder="Masukkan jenis sapi" required>
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label">Tanggal Lahir:</label>
                    <input type="date" name="umur" id="umur" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="id_kelompok" class="form-label">Kelompok Ternak:</label>
                    <select name="id_kelompok" id="id_kelompok" class="form-select">
                        <option value="" disabled selected>Pilih Kelompok</option>
                        @foreach($kelompokTernak as $kelompok)
                            <option value="{{ $kelompok->id }}">{{ $kelompok->nama_kelompok }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Jantan">Jantan</option>
                        <option value="Betina">Betina</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
