<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Mahasiswa</title>
    <style>
        /* Tambahkan style sederhana untuk PDF */
        body {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>{{ $judul }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>NIM Mahasiswa</th>
                <th>Nama Mahasiswa</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Nomor HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->nim }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->jurusan }}</td>
                    <td>{{ $a->nomor_hp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p style="text-align: center; margin-top: 30px;">Mengetahui</p>
    <p style="text-align: center;">Admin</p>
</body>

</html>
