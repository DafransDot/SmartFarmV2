@extends('layouts.app')

@section('content')
<div class="main-content">
    <h1>Edit Hewan Ternak</h1>
    <form action="{{ route('hewan_ternak.editHewanTernak', $hewanTernak->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="jenis_sapi">Jenis Sapi:</label>
            <input type="text" name="jenis_sapi" id="jenis_sapi" value="{{ $hewanTernak->jenis_sapi }}" required>
        </div>
        <div>
            <label for="umur">Umur:</label>
            <input type="date" name="umur" id="umur" value="{{ $hewanTernak->umur }}" required>
        </div>
        <div>
            <label for="id_kelompok">Kelompok Ternak:</label>
            <select name="id_kelompok" id="id_kelompok">
                @foreach($kelompokTernak as $kelompok)
                    <option value="{{ $kelompok->id }}" {{ $kelompok->id == $hewanTernak->id_kelompok ? 'selected' : '' }}>
                        {{ $kelompok->nama_kelompok }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="Jantan" {{ $hewanTernak->jenis_kelamin == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                <option value="Betina" {{ $hewanTernak->jenis_kelamin == 'Betina' ? 'selected' : '' }}>Betina</option>
            </select>
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
