<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hewan Ternak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #343a40;
            margin-bottom: 30px;
            font-weight: bold;
            text-align: center;
        }

        h2 {
            margin-top: 20px;
            color: #495057;
        }

        table th {
            background-color: #f1f1f1;
            color: #343a40;
            text-align: center;
        }

        table td {
            text-align: center;
            vertical-align: middle;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }

        .table-container {
            overflow-x: auto;
        }

        .group-heading {
            margin-top: 30px;
        }

    </style>
</head>
<body>
<div class="container my-5">
    <h1>Laporan Hewan Ternak</h1>

    @foreach($kelompokTernaks as $kelompok)
        <div class="group-heading">
            <h2>Nama Kelompok: {{ $kelompok->nama_kelompok }}</h2>
            <p><strong>Nama Ketua:</strong> {{ $kelompok->nama_ketua }}</p>
            <p><strong>Jumlah Hewan Ternak:</strong> {{ $kelompok->hewanTernak->count() }}</p>
            <p><strong>Alamat:</strong> {{ $kelompok->lokasi }}</p>

            <h3>Daftar Hewan Ternak:</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nomor Tag</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>Jenis Sapi</th>
                            <th>Berat Badan</th>
                            <th>Status Hewan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelompok->hewanTernak as $hewan)
                        <tr>
                            <td>{{ $hewan->nomor_tag }}</td>
                            <td>{{ $hewan->kategori_umur }}</td>
                            <td>{{ $hewan->jenis_kelamin }}</td>
                            <td>{{ $hewan->jenis_sapi }}</td>
                            <td>{{ $hewan->berat_badan }} kg</td>
                            <td>{{ $hewan->status_pengurangan ?? 'Aktif' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
    @endforeach

    <div class="footer">
        <p>Terima kasih telah menggunakan Smartfarm. Semua data adalah milik peternak yang terdaftar.</p>
    </div>
</div>
</body>
</html>
