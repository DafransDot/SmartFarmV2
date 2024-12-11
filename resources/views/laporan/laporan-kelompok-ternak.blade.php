<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hewan Ternak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJf7c5l5RU01p9ldU2Utw8pbb2D0dSk8t1zQ" crossorigin="anonymous">
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

        .info-section {
            margin-bottom: 20px;
        }

        .info-section p {
            margin: 0;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <h1 class="text-center">Laporan Hewan Ternak</h1>

    <!-- Informasi Kelompok -->
    <div class="info-section">
        <p><strong>Kelompok:</strong> {{ $kelompok->nama_kelompok }}</p>
        <p><strong>Ketua:</strong> {{ $kelompok->nama_ketua }}</p>
        <p><strong>Lokasi:</strong> {{ $kelompok->lokasi }}</p>
        <p><strong>Jumlah Ternak:</strong> {{ $kelompok->jumlah_ternak }}</p>
    </div>

    <h2>Daftar Hewan Ternak:</h2>

    <!-- Tabel Daftar Hewan Ternak -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nomor Tag</th>
                    <th>Jenis Sapi</th>
                    <th>Umur</th>
                    <th>jenis kelamin</th>
                    <th>Berat Badan</th>
                    <th>Status Hewan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hewanTernak as $hewan)
                <tr>
                    <td>{{ $hewan->nomor_tag }}</td>
                    <td>{{ $hewan->jenis_sapi }}</td>
                    <td>{{ $hewan->kategori_umur }}</td>
                    <td>{{ $hewan->jenis_kelamin}}</td>
                    <td>{{ $hewan->berat_badan }} kg</td>
                    <td>{{ $hewan->status_hewan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Terima kasih telah menggunakan sistem manajemen ternak. Semua data adalah milik peternak yang terdaftar.</p>
    </div>
</div>
</body>
</html>