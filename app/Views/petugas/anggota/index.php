<?= $this->extend('layouts/petugas_layout') ?>
<?= $this->section('content') ?>
<h3>Daftar Anggota</h3>
<a href="<?= base_url('petugas/anggota/create') ?>" class="btn btn-primary mb-2">Tambah Anggota</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th><th>Nama</th><th>NIK</th><th>Alamat</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($anggota as $key => $a): ?>
        <tr>
            <td><?= $key+1 ?></td>
            <td><?= esc($a['nama']) ?></td>
            <td><?= esc($a['nik']) ?></td>
            <td><?= esc($a['alamat']) ?></td>
            <td>
                <a href="<?= base_url('petugas/anggota/edit/'.$a['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= base_url('petugas/anggota/delete/'.$a['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>
