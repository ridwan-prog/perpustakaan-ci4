<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Data Peminjaman</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Id Peminjaman</th>
                        <th>Buku</th>
                        <th>Anggota</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peminjaman as $key => $p): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= esc($p['peminjaman_id']) ?></td>
                       <td><?= esc($p['judul_buku']) ?></td>
                        <td><?= esc($p['nama_anggota']) ?></td>
                        <td><?= esc($p['peminjaman_tanggal_mulai']) ?></td>
                        <td><?= esc($p['peminjaman_tanggal_sampai']) ?></td>
                        <td>
                            <span class="badge 
                                <?= $p['peminjaman_status'] === 'Selesai' ? 'bg-success' : 'bg-warning' ?>">
                                <?= esc($p['peminjaman_status']) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>