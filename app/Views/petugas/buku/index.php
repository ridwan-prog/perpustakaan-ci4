<?= $this->extend('layouts/petugas_layout') ?>
<?= $this->section('content') ?>
<h3>Kelola Buku</h3>
<a href="<?= base_url('petugas/buku/create') ?>" class="btn btn-primary mb-2">Tambah Buku</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Tahun</th>
            <th>Penulis</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($buku as $b): ?>
        <tr>
            <td><?= esc($b['judul']) ?></td>
            <td><?= esc($b['tahun']) ?></td>
            <td><?= esc($b['penulis']) ?></td>
            <td><?= esc($b['status']) ?></td>
            <td>
                <a href="<?= base_url('petugas/buku/edit/'.$b['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= base_url('petugas/buku/delete/'.$b['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>
