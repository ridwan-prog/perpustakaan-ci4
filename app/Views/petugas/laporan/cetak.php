<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 80px;
            height: 80px;
        }
        .header h4 {
            margin-top: 10px;
            font-weight: bold;
        }
        .header p {
            margin: 0;
            font-size: 14px;
        }
        .table {
            font-size: 14px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: gray;
        }
        .ttd-petugas {
            margin-top: 60px;
            text-align: right;
        }
        .ttd-petugas {
    margin-top: 60px;
    width: 250px;
    float: right;
    text-align: center;
    font-size: 14px;
}

.ttd-petugas .space {
    margin-top: 80px;
    margin-bottom: 5px;
}

    </style>
</head>
<body onload="window.print()">
    <div class="container mt-4">
        <!-- Header -->
        <div class="header">
            <img src="logo.png" alt="Logo Perpustakaan" onerror="this.style.display='none'">
            <h4>Perpustakaan Smansa 1</h4>
            <p>Jl. Lintas Sumatra. 123, Kota Bandar Lampung, Indonesia</p>
            <p>Email: perpustakaan@xyz.com | Telp: (021) 123-4567</p>
        </div>
        
        <!-- Judul Laporan -->
        <h5 class="text-center">Laporan Peminjaman Buku</h5>
        <p class="text-center">Periode: <?= date('d-m-Y', strtotime($tanggal_awal)) ?> s/d <?= date('d-m-Y', strtotime($tanggal_akhir)) ?></p>

        <!-- Tabel Laporan -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($peminjaman as $i => $row): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($row['nama_anggota']) ?></td>
                    <td><?= esc($row['judul_buku']) ?></td>
                    <td><?= esc($row['peminjaman_tanggal_mulai']) ?></td>
                    <td><?= esc($row['peminjaman_tanggal_sampai']) ?></td>
                    <td><?= esc($row['peminjaman_status']) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <!-- ttd -->
        <div class="ttd-petugas">
        <p>Bandar Lampung, <?= date('d-m-Y') ?></p>
        <p>Petugas Perpustakaan</p>
        <div class="space">_________</div>
        <p><strong><u><?= esc($nama_petugas) ?></u></strong></p>
    </div>



        <!-- Footer -->
        <div class="footer">
            <p>&copy; <?= date('Y') ?> Perpustakaan Kota Bandar Lampung. Semua Hak Dilindungi.</p>
        </div>
    </div>
</body>
</html>
