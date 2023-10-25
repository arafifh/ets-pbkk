<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }

        .data-table {
            margin-top: 40px;
        }

        .data-table table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
        }

        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .data-table th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .input-group-append input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }

        .input-group-append input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="data-table">
        <h2>Data</h2>
        <form method="get" action="{{ route('search-pasien') }}">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Pasien">
                <div class="input-group-append">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
        <form method="get" action="{{ route('search-dokter') }}">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Dokter">
                <div class="input-group-append">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Kondisi Kesehatan</th>
                    <th>Suhu Tubuh</th>
                    <th>File Resep</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($data as $d)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ App\Models\Pasien::find($d->pasien_id)->name }}</td>
                    <td>{{ App\Models\Dokter::find($d->dokter_id)->name }}</td>
                    <td>{{ $d->kondisi_kesehatan }}</td>
                    <td>{{ $d->suhu_tubuh }}</td>
                    <td>{{ $d->resep_file }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>