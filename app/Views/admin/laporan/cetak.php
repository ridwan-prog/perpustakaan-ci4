<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman <?= $tanggal_awal ?> s/d <?= $tanggal_akhir ?></title>
    <style>
        /* Reset default styles */
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px;
            color: #333;
        }

        h1, h3, p {
            text-align: center;
            margin: 0;
        }

        h1 {
            font-size: 1.8em;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #444;
        }

        p {
            font-size: 1em;
            margin-bottom: 20px;
            color: #666;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            font-size: 0.9em;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #999;
        }

        @media print {
            body {
                margin: 0;
            }
            h1, h3, p {
                color: #000;
            }
            table {
                box-shadow: none;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <h1>SMA Negeri 1 Terusan Nunyai</h1>
    <p>Jalan Raya Terusan Nunyai, Lampung Tengah</p>
    <h3>Laporan Peminjaman Buku</h3>
    <p>Periode: <?= $tanggal_awal ?> s/d <?= $tanggal_akhir ?></p>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Sampai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($laporan)): ?>
                <tr>
                    <td colspan="6" class="no-data">Data tidak ditemukan</td>
                </tr>
            <?php else: ?>
                <?php $no = 1; foreach ($laporan as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($row['nama_anggota']) ?></td>
                        <td><?= esc($row['judul_buku']) ?></td>
                        <td><?= esc($row['peminjaman_tanggal_mulai']) ?></td>
                        <td><?= esc($row['peminjaman_tanggal_sampai']) ?></td>
                        <td><?= esc($row['peminjaman_status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>