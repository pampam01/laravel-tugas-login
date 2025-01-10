<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Mahasiswa</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
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

<body>

    <div class="container mt-6">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <center>
                    <h2>{{ $judul }}</h2>
                </center>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>NIM Mahasiswa</td>
                            <td>Nama Mahasiswa</td>
                            <td>Email</td>
                            <td>Jurusan</td>
                            <td>Nomor HP</td>
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

                <h5>Mengetahui</h5>
                <div class="">
                    <canvas id="signature-canvas"
                        style="border: 1px solid #000; width: 20%; height: 20%; display: block;"></canvas>
                    <button id="clear-signature" class="btn btn-secondary my-4">Bersihkan</button>
                    <button id="save-signature" class="btn btn-primary my-4">Simpan Tanda Tangan</button>
                </div>
                <h5>Admin</h5>

                <a href="{{ route('laporan.export.pdf') }}" class="btn btn-primary">Export to PDF</a>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script>
        // Inisialisasi Signature Pad
        const canvas = document.getElementById('signature-canvas');
        const signaturePad = new SignaturePad(canvas);

        // Tombol untuk menghapus tanda tangan
        document.getElementById('clear-signature').addEventListener('click', function() {
            signaturePad.clear();
        });

        // Tombol untuk menyimpan tanda tangan
        document.getElementById('save-signature').addEventListener('click', function() {
            if (signaturePad.isEmpty()) {
                alert("Tanda tangan kosong!");
                return;
            }

            const signatureData = signaturePad.toDataURL('image/png');

            // Kirim tanda tangan ke server
            fetch("{{ route('signature.save') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        signature: signatureData
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Tanda tangan berhasil disimpan!");
                    } else {
                        alert("Gagal menyimpan tanda tangan.");
                    }
                })
                .catch(error => {
                    console.error("Terjadi kesalahan:", error);
                });
        });
    </script>
</body>

</html>
