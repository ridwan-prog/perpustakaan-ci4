<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<h3>Data Petugas</h3>
<a href="<?= base_url('admin/petugas/create') ?>" class="btn btn-success mb-2">+ Tambah Petugas</a>
<table class="table table-bordered">
    <tr>
        <th>No</th><th>Nama</th><th>Username</th><th>Aksi</th>
    </tr>
    <?php foreach($petugas as $key => $p): ?>
    <tr>
        <td><?= $key+1 ?></td>
        <td><?= $p['nama'] ?></td>
        <td><?= $p['username'] ?></td>
        <td>
            <a href="<?= base_url('admin/petugas/edit/'.$p['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= base_url('admin/petugas/delete/'.$p['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach ?>
</table>

<?= $this->endSection() ?>
