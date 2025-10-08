<?php // File: app/Views/admin/dashboard.php ?>
<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Header Dashboard -->
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <h2 class="fw-bold">Dashboard Admin Perpustakaan</h2>
            <p class="text-muted">Selamat datang di sistem manajemen perpustakaan</p>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row mt-4">
        <div class="col-md-3">
    <div class="card border-primary">
        <div class="card-body text-center">
            <h5 class="card-title">Anggota Terdaftar</h5>
            <h3 class="text-primary fw-bold"><?= esc($jumlahAnggota) ?></h3>
            <p class="card-text">Jumlah anggota yang aktif.</p>
        </div>
    </div>
</div>
       <div class="col-md-3">
    <div class="card border-success">
        <div class="card-body text-center">
            <h5 class="card-title">Buku Tersedia</h5>
            <h3 class="text-success fw-bold"><?= esc($jumlahBukuTersedia) ?></h3>
            <p class="card-text">Jumlah buku yang tersedia.</p>
        </div>
    </div>
</div>

        <div class="col-md-3">
    <div class="card border-warning">
        <div class="card-body text-center">
            <h5 class="card-title">Pinjaman Aktif</h5>
            <h3 class="text-warning fw-bold"><?= esc($jumlahPinjamanAktif) ?></h3>
            <p class="card-text">Buku yang sedang dipinjam.</p>
        </div>
    </div>
</div>

       <div class="col-md-3">
    <div class="card border-danger">
        <div class="card-body text-center">
            <h5 class="card-title">Pengembalian Terlambat</h5>
            <h3 class="text-danger fw-bold"><?= esc($jumlahPengembalianTerlambat) ?></h3>
            <p class="card-text">Buku yang terlambat dikembalikan.</p>
        </div>
    </div>
</div>

    <!-- Grafik dan Tabel -->
    <div class="row mt-5">
        <!-- Grafik -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Grafik Peminjaman Bulanan</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartPeminjaman"></canvas>
                </div>
            </div>
        </div>

        <!-- Tabel Ringkasan -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5>Ringkasan Buku Populer</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Jumlah Dipinjam</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($bukuPopuler as $key => $buku): ?>
                        <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= esc($buku['judul']) ?></td>
                        <td><?= esc($buku['total_pinjam']) ?></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartPeminjaman').getContext('2d');
    const chartPeminjaman = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labels) ?>,
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: <?= json_encode($dataPeminjaman) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

<?= $this->endSection() ?>