<?= $this->extend('layouts/petugas_layout') ?>
<?= $this->section('content') ?>

<h3>Kelola Peminjaman</h3>
<a href="<?= base_url('petugas/peminjaman/tambah') ?>" class="btn btn-primary mb-3">Tambah Peminjaman</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Buku</th>
            <th>Anggota</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Sampai</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($peminjaman as $i => $row): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $row['judul'] ?? '-' ?></td>
            <td><?= $row['nama'] ?? '-' ?></td>
            <td><?= $row['peminjaman_tanggal_mulai'] ?></td>
            <td><?= $row['peminjaman_tanggal_sampai'] ?></td>
            <td><?= $row['peminjaman_status'] ?></td>
            <td>
                <?php if ($row['peminjaman_status'] == 'dipinjam'): ?>
                <a href="<?= base_url('petugas/peminjaman/selesai/' . $row['peminjaman_id']) ?>" class="btn btn-success btn-sm">Selesai</a>
                <?php endif ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>
