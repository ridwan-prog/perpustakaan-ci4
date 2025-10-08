<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<h3>Tambah Petugas</h3>
<form action="<?= base_url('admin/petugas/store') ?>" method="post">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>
